<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(VerificationStatus::class, 'status_id', 'id');
    }
}
