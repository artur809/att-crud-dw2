<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['nome','autor','isbn'];
	protected $table = 'livro';

	public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class, 'emprestimo')->withPivot('datahora', 'datahora_devolucao')->withTimestamps();
    }
}
