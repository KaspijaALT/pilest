<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'client_id',
        'OrderDate',
        'status',
        'Funding',
    ];

    public $timestamps = false; // Disable Eloquent timestamps
}
