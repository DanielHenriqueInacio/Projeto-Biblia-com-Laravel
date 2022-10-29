<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verse extends Model
{
    protected $table = "verses";
    public $timestamps = false;

    public function livro()
    {
        return $this->hasOne(Book::class, "id", "book");
    }
}

/*
 * related: Classe (Model) na qual vai se fazer o relacionamento
 * Se os campos do banco banco de dados estiver no padrão do Laravel, nao precisa informar mais nenhum paramentro.
 * Caso nao estiver, o segundo parametro é a chave primária do Model que está sendo relacionado (O mesmo que foi passado antes)
 * E o terceiro parametro (localKey), é a chave estrangeira da tabela na qual o model atual representa.
 */
