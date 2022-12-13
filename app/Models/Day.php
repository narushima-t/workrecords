<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function record()
    {
        return $this->belongsTo('App\Models\Record');
    }
}
