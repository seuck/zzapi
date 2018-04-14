<?php
namespace App\Http\Controllers;

use Log;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IssueController extends Controller {

  private $selectedFields = [
    'id',
    'magazine_id',
    'editor_id',
    'sequence',
    'month',
    'year'
  ];

  public function index($idMagazine) {
    Log::info('['.$this->logAPIPrefix. '] IssueController:index:'.$idMagazine);

    $Issues  = Issue::where('magazine_id', $idMagazine)->select($this->selectedFields)->get();
    return response()->json($Issues);
  }

  public function getIssue($idMagazine, $idIssue) {
    Log::info('['.$this->logAPIPrefix. '] IssueController:getIssue:'.$idMagazine.':'.$idIssue);

    $Issue  = Issue::with([
      'magazine',
      'editor',
      'volumes.scanAuthors',
      'volumes.volumeType',
      'volumes.pages',
      'volumes.pages.scan',
      'volumes.pages.content',
      'volumes.pages.content'
    ])->where('magazine_id', $idMagazine)->select($this->selectedFields)->find($idIssue);
    return response()->json($Issue);
  }
}
?>