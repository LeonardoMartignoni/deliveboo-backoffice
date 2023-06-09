<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // RELATIONS
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes() {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }

    // MUTATORS
    public function getFormattedCreatedAtAttribute()
    {
        $value = $this->created_at;
        return date('d/m/y H:i', strtotime($value));
    }

    protected $fillable = ['restaurant_id',
    'customer_name',
    'customer_surname',
    'customer_mail',
    'customer_phone_number',
    'customer_address',
    'note'];
}
