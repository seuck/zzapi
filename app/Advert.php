<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Advert extends Model {

  protected $hidden = ['game_id', 'page_id'];

  public function game() {
    return $this->belongsTo('App\Game')->select('id');
  }

  public function page() {
    return $this->belongsTo('App\Page')->select(['id', 'volume_id', 'label', 'sequence', 'scan_id']);
  }
}
?>