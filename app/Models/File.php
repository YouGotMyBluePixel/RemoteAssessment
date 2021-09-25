<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
       'Html_Title',
       'Snippet_Description',
       'Html_Snippet',
       'Link_Title',
       'link_itself',
       'Open_tab'
    ];    
}
