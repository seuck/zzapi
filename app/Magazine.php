<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Magazine extends Model {

  public function issues() {
    return $this->hasMany('App\Issue')->select(['id', 'magazine_id', 'editor_id', 'sequence', 'month', 'year'])->orderBy('sequence', 'asc');
  }
}
?>