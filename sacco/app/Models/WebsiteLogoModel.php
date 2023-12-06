<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteLogoModel extends Model
{
    use HasFactory;
    protected $table='logo';
    // logo
    public function getlogo(){
        if(!empty($this->logo) && file_exists('assets/upload/logo/' . $this->logo)){
            return url('assets/upload/logo/' . $this->logo);
        }
    }
}
