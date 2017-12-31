<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class TrickType extends Model {

  public function tricks() {
    return $this->hasMany('App\Trick');
  }
}
?>