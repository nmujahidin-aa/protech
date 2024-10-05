<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Worksheet extends Model
{
    use HasFactory;

    protected $table = 'worksheets';
    protected $fillable = [
        'file',
        'team_id',
    ];

    public function timestamp()
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
