<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property'; // Explicitly defining the table name
    protected $primaryKey = 'property_ID'; // Primary key
    public $timestamps = false; // Disable timestamps if not used

    protected $fillable = [
        'country',
        'built',
        'Property_type',
        'Nearby_parking',
        'area',
        'Price',
        'picture',
    ];

    /**
     * Get the property's picture as a base64-encoded string.
     *
     * @param  string  $value
     * @return string
     */
    public function getPictureAttribute($value)
    {
        if ($value) {
            return 'data:image/jpeg;base64,' . base64_encode($value);
        }

        return null; // Return null or a default image path if no image is available
    }
    public function getRouteKeyName()
{
    return 'property_ID'; // This should match the actual column name in your database
}
}
