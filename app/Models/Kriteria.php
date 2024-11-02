<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'bobot',
        'jenis_kriteria',
        'keterangan',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bobot' => 'float',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
