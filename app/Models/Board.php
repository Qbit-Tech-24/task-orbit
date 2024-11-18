<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'admin_id','board_color',
    ];

    // Relationship: A board belongs to a user (admin)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Board.php model
    public function lists()
    {
        return $this->hasMany(BoardList::class);
    }

}
