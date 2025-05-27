<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sort_order'
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id')->orderBy('sort_order');
    }

    public function publishedFaqs()
    {
        return $this->hasMany(Faq::class, 'category_id')
                   ->where('is_published', true)
                   ->orderBy('sort_order');
    }
}