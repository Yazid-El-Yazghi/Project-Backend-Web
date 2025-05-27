<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'publication_date',
        'is_published',
        'created_by'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'is_published' => 'boolean'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('publication_date', '<=', now());
    }
}