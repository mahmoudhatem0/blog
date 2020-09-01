<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apost extends Model
{
    use SoftDeletes;
   
    protected $fillable = [//this 
        'title', 'content', 'featrued','category_id','slug'
    ];

    protected $dates = ['deleted_at'];


    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Command');
    }

}
