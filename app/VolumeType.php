<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class VolumeType extends Model {

  public function volumeType() {
    return $this->hasMany('App\Volume');
  }
}
?>