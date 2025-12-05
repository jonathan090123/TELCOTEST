<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

<<<<<<< HEAD
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'nomor_hp',
        'password',
        'role',
        'device_brand',
    ];

=======
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi: User punya riwayat perilaku apa saja?
    public function behaviors()
    {
        return $this->hasMany(CustomerBehavior::class);
    }
    
    // Helper: Ambil perilaku TERBARU user ini
    public function latestBehavior()
    {
        return $this->hasOne(CustomerBehavior::class)->latestOfMany();
    }

    /**
     * Backwards-compatible accessor for phone number.
     * Some parts of the app use `phone_number`, migrations use `nomor_hp`.
     */
    public function getPhoneNumberAttribute()
    {
        if (isset($this->attributes['nomor_hp']) && $this->attributes['nomor_hp']) {
            return $this->attributes['nomor_hp'];
        }
        return $this->attributes['phone_number'] ?? null;
    }

    /**
     * Mutator to allow setting via phone_number while persisting to nomor_hp column.
     */
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['nomor_hp'] = $value;
    }

    // Also provide alias getter for nomor_hp to return phone_number if needed
    public function getNomorHpAttribute()
    {
        return $this->attributes['nomor_hp'] ?? ($this->attributes['phone_number'] ?? null);
=======
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi dengan transaksi
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    }
}