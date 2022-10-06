<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RssFeed extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rss_feeds';

    protected $fillable = [
        'user_id',
        'name',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
