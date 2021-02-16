<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $perPage = 25;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'cover',
        'price',
        'discount',
        'status'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', '1');
    }

    public function getIsNewAttribute()
    {
        return now()->subDays(7) <= $this->created_at;
    }
}
