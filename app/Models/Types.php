<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $table = 'real_estate_types';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public function realEstate()
    {
        return $this->hasMany('App\Models\Name','id');
    }
}
