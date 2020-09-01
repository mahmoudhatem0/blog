<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    protected $fillable = [//this 
        'tag', 
    ];

    public function aposts(){
        return $this->belongsToMany('App\Apost');
    }

    
}
