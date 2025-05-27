<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Welkom - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Dark mode initialization script -->
        <script>
            // Check for dark mode preference
            if (localStorage.getItem('darkMode') === 'true' || 
                (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Navigation Bar (gelijkaardig aan layouts.navigation) -->
            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('welcome') }}">
                                    <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">ACJM</h1>
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <a href="{{ route('welcome') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-400 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
                                    Home
                                </a>

                                <a href="{{ route('news.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                                    Nieuws
                                </a>

                                <a href="{{ route('faq.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                                    FAQ
                                </a>

                                <a href="{{ route('contact.show') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                                    Contact
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Dark Mode Toggle -->
                            <button x-data="{ 
                                darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches),
                                toggle() {
                                    this.darkMode = !this.darkMode;
                                    localStorage.setItem('darkMode', this.darkMode);
                                    if (this.darkMode) {
                                        document.documentElement.classList.add('dark');
                                    } else {
                                        document.documentElement.classList.remove('dark');
                                    }
                                }
                            }" 
                            x-init="
                                if (darkMode) {
                                    document.documentElement.classList.add('dark');
                                } else {
                                    document.documentElement.classList.remove('dark');
                                }
                            " 
                            @click="toggle()" 
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 mr-4">
                                <!-- Sun Icon (Light Mode) -->
                                <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                </svg>
                                
                                <!-- Moon Icon (Dark Mode) -->
                                <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </button>

                            @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 mr-4">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-3">
                                    Inloggen
                                </a>
                                <a href="{{ route('register') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Registreren
                                </a>
                            @endauth
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ route('welcome') }}" class="block pl-3 pr-4 py-2 border-l-4 border-blue-400 text-base font-medium text-blue-700 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/50 focus:outline-none focus:text-blue-800 dark:focus:text-blue-200 focus:bg-blue-100 dark:focus:bg-blue-900 focus:border-blue-700 dark:focus:border-blue-300 transition duration-150 ease-in-out">Home</a>
                        <a href="{{ route('news.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">Nieuws</a>
                        <a href="{{ route('faq.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">FAQ</a>
                        <a href="{{ route('contact.show') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">Contact</a>
                    </div>
                    
                    @guest
                        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                            <div class="mt-3 space-y-1">
                                <a href="{{ route('login') }}" 
                                   class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                                    Inloggen
                                </a>
                                <a href="{{ route('register') }}" 
                                   class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                                    Registreren
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>
            </nav>

            <!-- Page Header -->
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Welkom bij Voetbalclub ACJM
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Welcome Message -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h3 class="text-lg font-semibold mb-2">Welkom bij ACJM!</h3>
                                <p>Dit is de officiële website van voetbalclub ACJM. Hier vind je het laatste nieuws, evenementen en informatie over onze matchen. Ontdek onze clubleden en blijf op de hoogte van alle activiteiten. <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium">Registreer je</a> om je zoon of dochter in te schrijven en voor volledige toegang tot alle functies van onze club.</p>
                            </div>
                        </div>

                        <!-- Navigation Tabs -->
                        <div class="mb-6">
                            <div class="border-b border-gray-200 dark:border-gray-700">
                                <nav class="-mb-px flex space-x-8">
                                    <button onclick="showTab('users')" id="users-tab" class="tab-button active-tab border-b-2 border-blue-500 py-2 px-1 text-sm font-medium text-blue-600 dark:text-blue-400">
                                        Gebruikers
                                    </button>
                                    <button onclick="showTab('news')" id="news-tab" class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300">
                                        Laatste Nieuws
                                    </button>
                                </nav>
                            </div>
                        </div>

                        <!-- Users Tab Content -->
                        <div id="users-content" class="tab-content">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Gebruikers</h3>

                                    @php
                                        $users = \App\Models\User::where('role', 'user')->get();
                                    @endphp

                                    @if($users->count() > 0)
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full table-auto">
                                                <thead>
                                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Naam</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Lid sinds</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acties</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                                    {{ $user->display_name }}
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                                {{ $user->created_at->format('M Y') }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                                <a href="{{ route('profiles.show', $user) }}" 
                                                                   class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                                    Profiel
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-center py-8">
                                            <p class="text-gray-500 dark:text-gray-400">Er zijn momenteel geen gebruikers.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- News Tab Content -->
                        <div id="news-content" class="tab-content hidden">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Laatste Nieuws</h3>
                                        <a href="{{ route('news.index') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm">
                                            Bekijk alle nieuws →
                                        </a>
                                    </div>

                                    @php
                                        $latestNews = \App\Models\News::with('author')
                                                                     ->where('is_published', true)
                                                                     ->where('publication_date', '<=', now())
                                                                     ->orderBy('publication_date', 'desc')
                                                                     ->take(5)
                                                                     ->get();
                                    @endphp

                                    @if($latestNews->count() > 0)
                                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                                            @foreach($latestNews as $news)
                                                <div class="bg-gray-50 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                                    @if($news->image)
                                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                                                    @endif
                                                    <div class="p-4">
                                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                                            <a href="{{ route('news.show', $news) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                                                {{ $news->title }}
                                                            </a>
                                                        </h4>
                                                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                                                            {{ Str::limit(strip_tags($news->content), 120) }}
                                                        </p>
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                                {{ $news->publication_date->format('d M Y') }}
                                                            </span>
                                                            <a href="{{ route('news.show', $news) }}" 
                                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                                                                Lees Meer
                                                            </a>
                                                        </div>
                                                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                                            Door 
                                                            @if($news->author)
                                                                <a href="{{ route('profiles.show', $news->author) }}" 
                                                                   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                                                    {{ $news->author->display_name }}
                                                                </a>
                                                            @else
                                                                Onbekende auteur
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-8">
                                            <p class="text-gray-500 dark:text-gray-400">Er is momenteel geen nieuws beschikbaar.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            function showTab(tabName) {
                // Hide all tab contents
                const tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Remove active styling from all tabs
                const tabButtons = document.querySelectorAll('.tab-button');
                tabButtons.forEach(button => {
                    button.classList.remove('active-tab', 'border-blue-500', 'text-blue-600', 'dark:text-blue-400');
                    button.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300');
                });

                // Show selected tab content
                document.getElementById(tabName + '-content').classList.remove('hidden');

                // Add active styling to selected tab
                const activeTab = document.getElementById(tabName + '-tab');
                activeTab.classList.add('active-tab', 'border-blue-500', 'text-blue-600', 'dark:text-blue-400');
                activeTab.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300');
            }
        </script>

        <style>
            .active-tab {
                border-bottom-color: rgb(59 130 246) !important;
                color: rgb(37 99 235) !important;
            }
            
            .dark .active-tab {
                color: rgb(96 165 250) !important;
            }
        </style>
    </body>
</html>
