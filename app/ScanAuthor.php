<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class ScanAuthor extends Model {

  protected $hidden = ['created_at', 'updated_at'];

  public function volumes() {
    return $this->belongsToMany('App\Volume', 'scan_authors_volumes')->select('id', 'issue_id', 'label')->orderBy('label', 'asc');
  }
}
?>