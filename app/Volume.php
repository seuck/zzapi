<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Volume extends Model {

  protected $hidden = ['volume_type_id', 'pivot'];

  public function issue() {
    return $this->belongsTo('App\Issue');
  }

  public function volumeType() {
    return $this->belongsTo('App\VolumeType')->select('id', 'name');
  }

  public function scanAuthors() {
    return $this->belongsToMany('App\ScanAuthor', 'scan_authors_volumes')->select('id', 'name')->orderBy('name');
  }

  public function pages() {
    return $this->hasMany('App\Page')->select('id', 'label', 'sequence', 'volume_id', 'scan_id')->orderBy('sequence');
  }
}
?>