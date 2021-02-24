<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

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

    public function getCoverAttribute()
    {
        return $this->getMedia('covers')->last();
    }

    public function attachCover($file)
    {
        return $this->addMedia($file)->toMediaCollection('covers');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('cover')
              ->fit(Manipulations::FIT_CONTAIN, 330, 384);
    }
}
