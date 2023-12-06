<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_Plans extends Model
{
    use HasFactory;
    protected $table='loan_plans';
    public static function getAllRecord(){
        return self::get();
    }

    public static function getSingle($id){
        return self::find($id);
    }
}
