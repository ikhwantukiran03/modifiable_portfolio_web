<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = [
        'name',
        'description',
        'file',
        'file_type',
    ];

    public function getFileAttribute($value){
        if($value){
            return null;
        }
        return 'data:' .$this->file_type .';base64,' .base64_encode($this->file);
    }
}
