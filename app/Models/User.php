<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email_verified_at' => 'timestamp',
    ];

    public function kriterias(): HasMany
    {
        return $this->hasMany(Kriteria::class);
    }

    public function alternatifs(): HasMany
    {
        return $this->hasMany(Alternatif::class);
    }

    public function matriksKeputusans(): HasMany
    {
        return $this->hasMany(MatriksKeputusan::class);
    }

    public function perbandinganKriterias(): HasMany
    {
        return $this->hasMany(PerbandinganKriteria::class);
    }

    public function konsistensiRasios(): HasMany
    {
        return $this->hasMany(KonsistensiRasio::class);
    }
}
