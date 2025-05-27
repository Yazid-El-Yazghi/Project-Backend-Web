<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Veelgestelde Vragen (FAQ)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(isset($faqCategories) && $faqCategories->count() > 0)
                @foreach($faqCategories as $category)
                    @if($category->publishedFaqs->count() > 0)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                    {{ $category->name }}
                                </h2>
                                
                                @if($category->description)
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                                        {{ $category->description }}
                                    </p>
                                @endif
                                
                                <div class="space-y-4">
                                    @foreach($category->publishedFaqs as $faq)
                                        <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg" id="faq-{{ $faq->id }}">
                                            <button @click="open = !open" class="w-full text-left p-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                                                <div class="flex justify-between items-center">
                                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 pr-4">
                                                        {{ $faq->question }}
                                                    </h3>
                                                    <div class="flex-shrink-0">
                                                        <svg x-show="!open" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                        <svg x-show="open" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </button>
                                            <div x-show="open" 
                                                 x-transition:enter="transition ease-out duration-200"
                                                 x-transition:enter-start="opacity-0 transform scale-95"
                                                 x-transition:enter-end="opacity-100 transform scale-100"
                                                 x-transition:leave="transition ease-in duration-150"
                                                 x-transition:leave-start="opacity-100 transform scale-100"
                                                 x-transition:leave-end="opacity-0 transform scale-95"
                                                 class="px-4 pb-4">
                                                <div class="text-gray-700 dark:text-gray-300 prose prose-sm max-w-none">
                                                    {!! nl2br(e($faq->answer)) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="max-w-md mx-auto">
                            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4.057 1.79 4.057 4s-1.847 4-4.057 4c-1.742 0-3.223-.835-3.772-2M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Geen FAQ's beschikbaar</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Er zijn momenteel geen veelgestelde vragen beschikbaar.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('contact.show') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Stel een vraag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>