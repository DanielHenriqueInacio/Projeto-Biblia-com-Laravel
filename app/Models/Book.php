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
