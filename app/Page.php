<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Page extends Model {

  protected $hidden = ['volume_id', 'scan_id'];

  public function volume() {
    return $this->belongsTo('App\Volume');
  }

  public function scan() {
    return $this->belongsTo('App\Scan')->select('id', 'path');
  }
}
?>