<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class BloodRequestMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'donor_id',
        'user_id',
        'number',
        'hospital_name',
        'district',
        'thana',
        'blood_group',
        'donation_date'
    ];

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    function donor() {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
