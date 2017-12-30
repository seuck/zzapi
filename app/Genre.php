<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Genre extends Model {

  protected $hidden = ['created_at', 'updated_at', 'pivot'];

  public function games() {
    return $this->belongsToMany('App\Game', 'games_genres')->select('id', 'name')->orderBy('name', 'asc');
  }
}
?>