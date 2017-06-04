<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Issue extends Model {
  
  protected $hidden = ['editor_id', 'magazine_id'];

  public function magazine() {
    return $this->belongsTo('App\Magazine')->select(['id', 'name']);
  }

  public function editor() {
    return $this->belongsTo('App\Editor')->select(['id', 'name']);
  }

  public function volumes() {
    return $this->hasMany('App\Volume')->select(['id', 'volume_type_id', 'issue_id', 'label', 'pages_number'])->orderBy('label', 'asc');
  }
}
?>