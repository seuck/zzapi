<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class System extends Model {

  protected $hidden = ['manufacturer_id'];

  public function version() {
    return $this->hasMany('App\Version');
  }

  public function manufacturer() {
    return $this->belongsTo('App\Manufacturer')->select(['id', 'name']);
  }
}
?>