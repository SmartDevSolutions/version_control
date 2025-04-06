<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'link', 'icon', 'is_visible', 'pdf_installation_instructions', 'pdf_user_manual'];
}
