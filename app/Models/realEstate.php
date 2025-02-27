<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realEstate extends Model
{
    use HasFactory;
    protected $table = 'real_estate';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public function Types()
    {
        return $this->belongsTo('App\Models\Types','type');
    }
}
