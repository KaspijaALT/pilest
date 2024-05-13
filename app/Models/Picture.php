<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['property_id', 'image', 'timestamp'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_ID');
    }
}
