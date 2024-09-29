<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worksheet extends Model
{
    use HasFactory;

    protected $table = 'worksheets';
    protected $fillable = [
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
