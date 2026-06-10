<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = ['datahora','datahora_devolucao'];
	protected $table = 'emprestimo';

}
