<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['name','permission_for'];
}
