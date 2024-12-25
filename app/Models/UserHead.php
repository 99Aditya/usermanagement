<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHead extends Model
{
    use HasFactory;

    public function getPhoto()
    {
        if(isset($this->photo)){
            return asset('uploads/photos/'.$this->photo);
        }
        return null; 
    }
    public function users() {
        return $this->hasMany(User::class,'head_id','id');
    }

    public function state_name() {
        return $this->belongsTo(State::class,'state','id')->select('id','name');
    }
    public function city_name() {
        return $this->belongsTo(City::class,'city','id')->select('id','name');
    }
}
