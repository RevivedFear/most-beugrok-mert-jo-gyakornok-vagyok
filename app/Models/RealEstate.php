<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    protected $guarded = [];
    protected $table = "real_estate";
    use HasFactory;
    use SoftDeletes;
}
