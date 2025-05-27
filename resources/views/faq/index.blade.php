<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @foreach($categories as $category)
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                            {{ $category->name }}
                        </h3>
                        
                        @if($category->description)
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                {{ $category->description }}
                            </p>
                        @endif

                        @if($category->publishedFaqs->count() > 0)
                            <div class="space-y-4">
                                @foreach($category->publishedFaqs as $faq)
                                    <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg">
                                        <button @click="open = !open" class="w-full text-left p-4 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                            <div class="flex justify-between items-center">
                                                <h4 class="font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $faq->question }}
                                                </h4>
                                                <svg x-show="!open" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="open" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </div>
                                        </button>
                                        <div x-show="open" x-collapse class="px-4 pb-4">
                                            <div class="text-gray-700 dark:text-gray-300 prose prose-sm max-w-none">
                                                {!! nl2br(e($faq->answer)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 italic">
                                No FAQs available in this category yet.
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach

            @if($categories->count() === 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-gray-500 dark:text-gray-400">
                            No FAQs available at the moment.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>