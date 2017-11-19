<?php namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Content extends Model {

  protected $hidden = ['page_id'];
  protected $fillable = ['page_id', 'content_type_id'];

  public function page() {
    return $this->belongsTo('App\Page')->select('id');
  }

  public function contentType() {
    return $this->belongsTo('App\ContentType')->select('id', 'name');
  }
}
?>