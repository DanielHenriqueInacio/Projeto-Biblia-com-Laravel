<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    public $timestamps = false;

    public function testamento()
    {
        return $this->hasOne(Testament::class, "id", "testament");
    }
}


/*
book -> testamento

testamento ->>> livros

Quando tem um N para um M usa-se o $this->hasOne(Classe::class)
hasMany

testament -> id

book -> testament_id



*/

//ORM -> Object Relational Mapping
//Mapeamento Relacional - Objeto
//
//Eloquent
//Tabela <=> Classe Model
//
//Doctrine
//Propel
