<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Html extends Model
{
    use HasFactory;
    protected $fillable = [
       'Html_Title',
       'Snippet_Description',
       'Html_Snippet',
    ];    
}
