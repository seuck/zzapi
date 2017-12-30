<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Review extends Model {

  protected $hidden = ['version_id', 'page_id'];

  public function version() {
    return $this->belongsTo('App\Version')->select('id');
  }

  public function page() {
    return $this->belongsTo('App\Page')->select(['id', 'volume_id', 'label', 'sequence', 'scan_id']);
  }
}
?>