<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiel van') }} {{ $user->display_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Profile Information -->
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                            {{ $profile->username ?: $user->name }}
                        </h1>
                        
                        @if($profile->username && $profile->username !== $user->name)
                            <p class="text-lg text-gray-600 dark:text-gray-400">
                                ({{ $user->name }})
                            </p>
                        @endif
                    </div>

                    <!-- Profile Details -->
                    <div class="space-y-4">
                        @if($profile->birthday)
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    <strong>Verjaardag:</strong> {{ $profile->birthday->format('d F Y') }}
                                    @if($profile->birthday->isBirthday())
                                        🎉 <span class="text-blue-600 dark:text-blue-400 font-semibold">Vandaag jarig!</span>
                                    @endif
                                </span>
                            </div>
                        @endif

                        @if($profile->about_me)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Over mij</h3>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $profile->about_me }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Member Since -->
                        <div class="flex items-center space-x-3 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <span class="text-gray-600 dark:text-gray-400">
                                <strong>Lid sinds:</strong> {{ $user->created_at->format('F Y') }}
                            </span>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    @auth
                        @if(auth()->id() === $user->id)
                            <div class="mt-6 flex flex-wrap space-x-3">
                                <a href="{{ route('profiles.edit') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Profiel bewerken
                                </a>
                                
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                    </svg>
                                    Terug naar Dashboard
                                </a>
                            </div>
                        @else
                            <div class="mt-6">
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                    </svg>
                                    Terug naar Dashboard
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="mt-6">
                            <a href="{{ route('welcome') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Terug naar Home
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Recent Activity (Optional) -->
            @if($user->news->count() > 0)
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Recente artikelen</h3>
                        <div class="space-y-3">
                            @foreach($user->news()->published()->latest()->take(3)->get() as $article)
                                <div class="border-l-4 border-blue-500 pl-4">
                                    <a href="{{ route('news.show', $article) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium">
                                        {{ $article->title }}
                                    </a>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $article->publication_date->format('d F Y') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>