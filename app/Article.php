<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'title', 'description', 'imag', 'datenews', 'urlType', 'urltext', 'urlLink', 'pdf'
    ];

}
