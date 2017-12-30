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
}
?>