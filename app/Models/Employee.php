<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama_employee',
        'address',
        'birthdate',
        'join_date',
        'status',
    ];

    public function cuti() {
        return $this->hasMany(Cuti::class, "employeeId", "id");
    }
}
