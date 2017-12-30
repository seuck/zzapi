<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Game extends Model {
  
  protected $hidden = ['publisher_id', 'setting_id', 'perspective_id'];

  public function publisher() {
    return $this->belongsTo('App\Publisher')->select(['id', 'name']);
  }

  public function setting() {
    return $this->belongsTo('App\Setting')->select(['id', 'name']);
  }

  public function perspective() {
    return $this->belongsTo('App\Perspective')->select(['id', 'name']);
  }

  public function versions() {
    return $this->hasMany('App\Version')->select(['id', 'year', 'game_id', 'system_id', 'media_id', 'developer_id'])->orderBy('year');
  }

  public function genres() {
    return $this->belongsToMany('App\Genre', 'games_genres')->select('id', 'name')->orderBy('name');
  }
}
?>