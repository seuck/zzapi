<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Developer extends Model {

  public function version() {
    return $this->hasMany('App\Version');
  }
}
?>