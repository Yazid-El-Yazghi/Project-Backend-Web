<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inschrijving Verzonden') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Inschrijving Succesvol Verzonden!
                        </h3>
                        
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Bedankt voor de inschrijving van je kind bij voetbalclub ACJM. 
                            We hebben je aanvraag ontvangen en nemen binnen 2 werkdagen contact met je op.
                        </p>
                        
                        <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                            Je ontvangt binnenkort een e-mail met bevestiging en verdere instructies.
                        </p>
                        
                        <div class="mt-6 space-x-3">
                            <a href="{{ auth()->check() ? route('dashboard') : route('welcome') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Terug naar {{ auth()->check() ? 'Dashboard' : 'Home' }}
                            </a>
                            
                            <a href="{{ route('contact.show') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>