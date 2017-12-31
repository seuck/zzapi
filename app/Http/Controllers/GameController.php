<?php
namespace App\Http\Controllers;
  
use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller {
  
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
}
?>