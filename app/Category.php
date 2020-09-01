<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function aposts(){
        return $this->hasMany('App\Apost');
    }
}
