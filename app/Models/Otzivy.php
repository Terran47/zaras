<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otzivy extends Model
{
    protected $fillable = ['oziv_ava', 'otzivies_user_name', 'otzivies_user_id', 'otzivies_languages_id', 'otziv_text', 'otziv_product'];
}
