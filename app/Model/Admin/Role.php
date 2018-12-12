<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function permissions(){
        return $this->belongsToMany('App\Model\Admin\Permission');
    }

    public function users(){
        return $this->belongsToMany('App\Model\Admin\Admin');
    }
}
