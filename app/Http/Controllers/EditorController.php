<?php
  
namespace App\Http\Controllers;

use Log;
use App\Editor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class EditorController extends Controller {
  
  private $selectedFields = ['id', 'name'];
  
  public function index() {
    Log::info('['.$this->logAPIPrefix. '] EditorController:index');

    $Editors  = Editor::select($this->selectedFields)->get();
    return response()->json($Editors);
  }

  public function getEditor($id) {
    Log::info('['.$this->logAPIPrefix. '] EditorController:getEditor:'.$id);

    $Editor  = Editor::with('issues')->select($this->selectedFields)->find($id);
    return response()->json($Editor);
  }
}
?>