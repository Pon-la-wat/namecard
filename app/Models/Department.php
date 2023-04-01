<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'dept_id';
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'dept_code', 'dept_name', 'dept_name_en'
    ];

    // public function post()
    // {
    //     return $this->belongsTo('App\Post', 'foreign_key', 'other_key');
    // }
}