<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function createBy(){
        return $this->hasOne(Admin::class,"id","admin_id");
    }
    public function InCategory(){
        return $this->hasOne(Category::class,"id","category");
    }
}
