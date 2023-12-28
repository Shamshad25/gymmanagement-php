<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberModel extends Model
{
    use HasFactory;
    public function myTrainer(){
        return $this->hasOne(trainerModel::class,'id','Trainer_id');
    }
}
