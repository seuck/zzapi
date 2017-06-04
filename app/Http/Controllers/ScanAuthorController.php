<?php
  
namespace App\Http\Controllers;
  
use App\ScanAuthor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class ScanAuthorController extends Controller {
  
  public function index() {
    $ScanAuthors  = ScanAuthor::with('volumes')->withCount('volumes')->orderByDesc('volumes_count')->get();
    return response()->json($ScanAuthors);
  }
}
?>