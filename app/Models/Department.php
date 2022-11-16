<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable = ['name'];
    public function position(){
        return $this->hasMany(Positions::class);
    }
    public function employee(){
        return $this->hasManyThrough(Positions::class,Employee::class,
                'department_id','position_id','id','id');
    }
}
