<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;



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
    // In your Property model (Property.php)

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'property_ID';
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'property_id', 'property_ID');
    }

}
