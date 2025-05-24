<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_me extends Model
{
    protected $table = 'about_me';

    protected $fillable = [
        'name',
        'description',
        'profile_image',
        'profile_image_type',
    ];

    public function getImageAttribute($value){
        if(!$this->profile_image){
            return null;
        }
        return 'data:' .$this->profile_image_type .';base64,' .base64_encode($this->profile_image);
    }
}
