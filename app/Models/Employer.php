<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';

    public function blogs()
    {
        //بجيب الريليشن من هنا
        return $this->hasOne('App\Models\Blog');
    }
}
