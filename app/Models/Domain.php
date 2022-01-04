<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domain extends Model
{
    use HasFactory;
    protected $table="domain";
    protected $fillable = ['id','domain_name'];

    public function products()
    {
        return $this->hasMany(Product::class,'domain_id');
    }
}
