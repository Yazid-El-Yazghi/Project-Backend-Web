<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Wijzig $categories naar $faqCategories om consistent te zijn met de view
        $faqCategories = FaqCategory::with('publishedFaqs')
                                ->orderBy('sort_order')
                                ->get();
        
        return view('faq.index', compact('faqCategories'));
    }
}