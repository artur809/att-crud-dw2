<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use HasFactory, softDeletes;

	protected $table = 'telefone';

	public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
