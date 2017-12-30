<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class TrickType extends Model {

  public function trick() {
    return $this->hasMany('App\Trick');
  }
}
?>