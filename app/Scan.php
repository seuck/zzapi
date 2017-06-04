<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Scan extends Model {

  public function page() {
    return $this->hasOne('App\Page');
  }
}
?>