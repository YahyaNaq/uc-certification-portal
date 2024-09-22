<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::updating(function ($certificate) {
            if ($certificate->status_id == 5 && is_null($certificate->issue_date)) {
                $certificate->issue_date = now();
            }
        });
    }

    public function status()
    {
        return $this->belongsTo(VerificationStatus::class, 'status_id', 'id');
    }
}
