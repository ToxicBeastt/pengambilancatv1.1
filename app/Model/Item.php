<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'code','nama','merk','satuan','jenis','netto'
    ];
}
