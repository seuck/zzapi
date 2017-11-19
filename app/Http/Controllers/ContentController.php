<?php
  
namespace App\Http\Controllers;
  
use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class ContentController extends Controller {
  
  public function index() {
    $Content  = Content::with('volumes')->withCount('volumes')->orderByDesc('volumes_count')->get();
    return response()->json($Content);
  }

  public function createContent(Request $request){
    $content = Content::create($request->all());
    return response()->json($content);
  }
}
?>