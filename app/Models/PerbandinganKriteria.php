<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerbandinganKriteria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nilai_perbandingan',
        'kriteria1_id',
        'kriteria2_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nilai_perbandingan' => 'float',
        'kriteria1_id' => 'integer',
        'kriteria2_id' => 'integer',
    ];

    public function kriteria1(): BelongsTo
    {
        return $this->belongsTo(Kriteria1::class);
    }

    public function kriteria2(): BelongsTo
    {
        return $this->belongsTo(Kriteria2::class);
    }
}
