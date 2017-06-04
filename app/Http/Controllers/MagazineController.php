<?php
  
namespace App\Http\Controllers;
  
use App\Magazine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class MagazineController extends Controller {
  
  private $selectedFields = ['id', 'name'];
  
  public function index() {
    $Magazines  = Magazine::select($this->selectedFields)->get();
    return response()->json($Magazines);
  }

  public function getMagazine($id) {
    $Magazine  = Magazine::with('issues')->select($this->selectedFields)->find($id);
    return response()->json($Magazine);
  }
}
?>