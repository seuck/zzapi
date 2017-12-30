<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Manufacturer extends Model {

  public function system() {
    return $this->hasMany('App\System');
  }
}
?>