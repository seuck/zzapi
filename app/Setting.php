<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Setting extends Model {

  public function game() {
    return $this->hasMany('App\Game');
  }
}
?>