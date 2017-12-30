<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Media extends Model {

  public function version() {
    return $this->hasMany('App\Version');
  }
}
?>