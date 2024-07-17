<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
       'name',
       'contact_number',
       'description',
       'type',
       'subtype',
       'location',
       'zone',
       'status',
       'photo',
       'viewBarangay',
       'viewPolice',
       'police_read',
       'barangay_read'
    ];

    public function User() {
        return $this->hasOne(User::class, 'id', 'name');
    }

    public function Barangay() {
        return $this->hasOne(Barangay::class, 'id', 'location');
    }

    public function Type() {
        return $this->hasOne(Type::class, 'id', 'subtype');
    }
}
