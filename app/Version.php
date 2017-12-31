<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Version extends Model {

  protected $hidden = ['game_id', 'system_id', 'media_id', 'developer_id'];

  public function game() {
    return $this->belongsTo('App\Game');
  }

  public function system() {
    return $this->belongsTo('App\System')->select('id', 'name', 'manufacturer_id');
  }

  public function media() {
    return $this->belongsTo('App\Media')->select('id', 'name', 'path');
  }

  public function developer() {
    return $this->belongsTo('App\Developer')->select('id', 'name');
  }

  public function tricks() {
    return $this->hasMany('App\Trick')->select('id', 'version_id', 'trick_type_id', 'volume_id', 'page_id');
  }

  public function reviews() {
    return $this->hasMany('App\Review')->select('id', 'version_id', 'volume_id', 'page_id', 'vote');
  }
}
?>