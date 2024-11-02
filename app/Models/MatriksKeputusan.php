<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatriksKeputusan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nilai',
        'alternatif_id',
        'kriteria_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'alternatif_id' => 'integer',
        'kriteria_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
