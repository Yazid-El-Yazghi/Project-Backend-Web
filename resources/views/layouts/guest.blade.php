<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="
    if (darkMode) {
        document.documentElement.classList.add('dark');
    }
    $watch('darkMode', val => {
        if (val) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        localStorage.setItem('darkMode', val);
    });
">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welkom bij ACJM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
            <!-- Navigation Bar -->
            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- ... existing navigation code ... -->
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
            <main class="flex-grow">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Welcome Message -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h3 class="text-lg font-semibold mb-2">Welkom bij ACJM!</h3>
                                <p>Dit is de officiële website van voetbalclub ACJM. Hier vind je het laatste nieuws, evenementen en informatie over onze matchen. Ontdek onze clubleden en blijf op de hoogte van alle activiteiten. <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium">Registreer je</a> om je zoon of dochter in te schrijven en voor volledige toegang tot alle functies van onze club.</p>
                                
                                <!-- Add Inschrijvingen Call-to-Action -->
                                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg border border-blue-200 dark:border-blue-800">
                                    <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">
                                        🏆 Schrijf je kind in bij ACJM!
                                    </h4>
                                    <p class="text-blue-800 dark:text-blue-200 text-sm mb-3">
                                        Geef je kind de kans om te voetballen in een leuke en veilige omgeving. 
                                        Voor kinderen van 4 tot 18 jaar.
                                    </p>
                                    <a href="{{ route('registrations.create') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                        </svg>
                                        Kind Inschrijven
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Rest of existing content ... -->
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

                        <!-- Existing tab content ... -->
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <x-footer />
        </div>

        <!-- Existing JavaScript ... -->
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
                    button.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                });

                // Show selected tab content
                document.getElementById(tabName + '-content').classList.remove('hidden');

                // Add active styling to selected tab
                const activeTab = document.getElementById(tabName + '-tab');
                activeTab.classList.add('active-tab', 'border-blue-500', 'text-blue-600', 'dark:text-blue-400');
                activeTab.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
            }
        </script>
    </body>
</html>