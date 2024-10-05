<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';
    protected $fillable = [
        'image',
        'description',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function timestamp()
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'assignment_id');
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isLikedByUser()
    {
        $userId = auth()->id();
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function description()
    {
        $description = $this->description;
        return strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description;
    }
}
