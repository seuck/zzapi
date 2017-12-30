<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Trick extends Model {

  protected $hidden = ['version_id', 'trick_type_id', 'page_id'];

  public function version() {
    return $this->belongsTo('App\Version')->select('id');
  }

  public function trickType() {
    return $this->belongsTo('App\TrickType')->select(['id', 'name']);
  }

  public function page() {
    return $this->belongsTo('App\Page')->select(['id', 'volume_id', 'label', 'sequence', 'scan_id']);
  }
}
?>