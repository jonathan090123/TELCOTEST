<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBehavior extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',            // Relasi ke User
        
        // 10 Fitur ML (Wajib Ada)
        'plan_type',
        'device_brand',
        'avg_data_usage_gb',
        'pct_video_usage',
        'avg_call_duration',
        'sms_freq',
        'monthly_spend',
        'topup_freq',
        'travel_score',
        'complaint_count'
    ];

    // Relasi: Data perilaku ini milik siapa? (Milik User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}