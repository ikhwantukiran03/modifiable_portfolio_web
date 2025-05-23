<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    protected $table = 'certificates';

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
