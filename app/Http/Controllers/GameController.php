<?php
namespace App\Http\Controllers;
  
use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller {
  
  const DEFAULT_LIMIT = 15;
  const SAFE_LIMIT = 50;

  private $selectedFields = [
    'id',
    'name',
    'publisher_id',
    'setting_id',
    'perspective_id'
  ];

  public function index() {
    $Games  = Game::select($this->selectedFields)->get();
    return response()->json($Games);
  }

  public function getGame($idGame) {
    $Game  = Game::with([
      'genres',
      'publisher',
      'setting',
      'perspective',
      'adverts',
      'adverts.page',
      'adverts.page.scan',
      'versions',
      'versions.system',
      'versions.system.manufacturer',
      'versions.media',
      'versions.developer',
      'versions.tricks',
      'versions.tricks.trickType',
      'versions.tricks.page',
      'versions.tricks.page.scan',
      'versions.reviews',
      'versions.reviews.page',
      'versions.reviews.page.scan'
    ])->select($this->selectedFields)->find($idGame);
    return response()->json($Game);
  }

  public function findGames($gameName, $offset = 0, $limit = self::DEFAULT_LIMIT) {
    $totalGames = 0;
    $games = [];
    $response = [];
    
    if (strlen($gameName) >= 2) {
      $totalGames = Game::query($this->selectedFields)
        ->where('name', 'like', '%'.$gameName.'%')
        ->count();

      $ExactGames = Game::with(['publisher'])
      ->select($this->selectedFields)
      ->where('name', $gameName)
      ->get();

      $offset -= $ExactGames->count();
      if ($offset < 0) {
        $offset = 0;
      }

      if ($offset === 0) {
        $limit -= $ExactGames->count();
      }


      $SimilarGames = Game::with(['publisher'])
        ->select($this->selectedFields)
        ->where('name', 'like', '%'.$gameName.'%')
        ->where('name', '!=', $gameName)
        ->offset($offset)
        ->limit($limit)
        ->orderBy('name')
        ->get();

      if ($offset > 0) {
        $games = $SimilarGames;
      } else {
        $games = $ExactGames->concat($SimilarGames);
      }
    }

    $response['totalEntries'] = $totalGames;
    $response['games'] = $games;

    return response()->json($response);
  }

  public function findMoreGames($gameName) {
    return self::findGames($gameName, self::DEFAULT_LIMIT, self::SAFE_LIMIT);
  }
}
?>