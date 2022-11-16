<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Positions extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function employee(){
        return $this->hasMany(Employee::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }

}
