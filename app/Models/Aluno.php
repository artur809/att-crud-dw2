<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory, softDeletes;

	protected $table = 'aluno';

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'aluno_id', 'id');
    }

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'emprestimo')
        ->withPivot('datahora', 'datahora_devolucao')
        ->withTimestamps();
    }
}
