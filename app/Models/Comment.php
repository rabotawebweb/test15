<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'parent', 'star', 'content', 'news_id', 'user_id', 'guest', 'published'
    ];

    public function user()
    {
		return $this->belongsTo(User::class);
    }
	
	public function news()
    {
		return $this->belongsTo(News::class);
    }
}
