<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::withCount('faqs')->orderBy('sort_order')->get();
        return view('admin.faq-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('admin.faq-categories.index')
                        ->with('success', 'FAQ Category created successfully!');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $faqCategory->update($request->all());

        return redirect()->route('admin.faq-categories.index')
                        ->with('success', 'FAQ Category updated successfully!');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        if ($faqCategory->faqs()->count() > 0) {
            return back()->with('error', 'Cannot delete category that contains FAQs.');
        }

        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')
                        ->with('success', 'FAQ Category deleted successfully!');
    }
}