<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_me extends Model
{
    protected $table = 'about_me';

    protected $fillable = [
        'name',
        'description',
        'image',
        'profile_image_type',
    ];

    public function getImageAttribute($value){
        if($value){
            return null;
        }
        return 'data:' .$this->profile_image_type .';base64,' .base64_encode($this->image);
    }
}
