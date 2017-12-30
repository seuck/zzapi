<?php
  
namespace App\Http\Controllers;
  
use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class GameController extends Controller {
  
  private $selectedFields = ['id', 'name', 'publisher_id', 'setting_id', 'perspective_id'];
  
  public function index() {
    $Games  = Game::select($this->selectedFields)->get();
    return response()->json($Games);
  }

  public function getGame($idGame) {
    $Game  = Game::with(['genres', 'publisher', 'setting', 'perspective', 'versions', 'versions.system', 'versions.media', 'versions.developer', 'versions.system.manufacturer'])->select($this->selectedFields)->find($idGame);
    return response()->json($Game);
  }
}
?>