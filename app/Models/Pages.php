<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Routing;
use App\Models\PageRelation;

class Pages extends Model{
    
  use HasFactory;

  protected $fillable = [
    'url',
  ];

  public function route(){
    return $this->hasOne(Routing::class , 'post_id');
  }

  public function cycles(){
    return $this->hasManyThrough(
      self::class,
      PageRelation::class,
      'parent_id',
      'id',
      'id',
      'page_id'
    );
  }

  public function writeIds($cycle){
    foreach($cycle->cycles as $tmp ){
      $rout = Routing::where('post_id', $tmp->id)->get();
      $tmp->setRelation('url', $rout);
      // $tmp->setRelation('cycles', $tmp);
      // $cycles->push($tmp);
      $this->writeIds($tmp);
    }
  }

  public function getChildrenAttribute(){
    // $cycles = collect();
    // $cycles->push($this->cycles);
    $this->writeIds($this);
    // return $cycles->first();
    return $this->cycles;
  }

}