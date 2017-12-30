<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Perspective extends Model {

  public function game() {
    return $this->hasMany('App\Game');
  }
}
?>