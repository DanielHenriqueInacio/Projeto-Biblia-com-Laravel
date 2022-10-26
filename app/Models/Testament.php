<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testament extends Model
{
    protected $table = "testament";
    public $timestamps = false;

    public function livros()
    {
        return $this->hasMany(Book::class, "testament");
    }
}
