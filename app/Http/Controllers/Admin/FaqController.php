<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->orderBy('category_id')->orderBy('sort_order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('sort_order')->get();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_published' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');

        Faq::create($data);

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ created successfully!');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::orderBy('sort_order')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_published' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');

        $faq->update($data);

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ updated successfully!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
                        ->with('success', 'FAQ deleted successfully!');
    }
}