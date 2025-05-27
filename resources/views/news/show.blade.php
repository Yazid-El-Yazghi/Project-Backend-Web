<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $news->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover">
                @endif
                
                <div class="p-6">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                            {{ $news->title }}
                        </h1>
                        
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                            <span>Gepubliceerd op {{ $news->publication_date->format('d F Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Door <a href="{{ route('profiles.show', $news->author) }}" 
                                         class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                {{ $news->author->display_name }}
                            </a></span>
                        </div>
                    </div>

                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        <div class="text-gray-900 dark:text-gray-100 leading-relaxed">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('news.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            ← Terug naar Nieuws
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>