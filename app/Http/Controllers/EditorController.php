<?php
  
namespace App\Http\Controllers;
  
use App\Editor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class EditorController extends Controller {
  
  private $selectedFields = ['id', 'name'];
  
  public function index() {
    $Editors  = Editor::select($this->selectedFields)->get();
    return response()->json($Editors);
  }

  public function getEditor($id) {
    $Editor  = Editor::with('issues')->select($this->selectedFields)->find($id);
    return response()->json($Editor);
  }
}
?>