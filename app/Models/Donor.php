<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Donor extends Authenticatable
{
    use HasFactory;

    protected $dates = ['birth_date', 'last_donate'];

    protected $casts = [
        'socialMedia' => 'object'
    ];


    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    function bloodRequest(){
        return $this->hasMany(BloodRequestMessage::class, 'donor_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
