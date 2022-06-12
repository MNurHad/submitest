<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeId',
        'date_cuti',
        'cuti_long',
        'note',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, "employeeId", "id");
    }
}
