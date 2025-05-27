<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inschrijving Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Inschrijving {{ $registration->child_name }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Ingeschreven op {{ $registration->created_at->format('d F Y \o\m H:i') }}
                                </p>
                            </div>
                            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $registration->getStatusBadgeClass() }}">
                                {{ ucfirst($registration->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Kind Informatie -->
                        <div class="space-y-4">
                            <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 pb-2">
                                Gegevens Kind
                            </h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Naam:</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ $registration->child_name }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Leeftijd:</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ $registration->age }} jaar</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">T-shirt maat:</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ $registration->tshirt_size }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Schoenmaat:</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ $registration->shoe_size }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Ouder Informatie -->
                        <div class="space-y-4">
                            <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 pb-2">
                                Gegevens Ouder/Voogd
                            </h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Naam:</span>
                                    <p class="text-gray-900 dark:text-gray-100">{{ $registration->parent_name }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">E-mailadres:</span>
                                    <p class="text-gray-900 dark:text-gray-100">
                                        <a href="mailto:{{ $registration->parent_email }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                            {{ $registration->parent_email }}
                                        </a>
                                    </p>
                                </div>
                                
                                @if($registration->parent_phone)
                                    <div>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Telefoon:</span>
                                        <p class="text-gray-900 dark:text-gray-100">
                                            <a href="tel:{{ $registration->parent_phone }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $registration->parent_phone }}
                                            </a>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Status Update -->
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 mb-4">Status Bijwerken</h4>
                        
                        <form method="POST" action="{{ route('admin.registrations.update-status', $registration) }}" class="flex items-center space-x-4">
                            @csrf
                            @method('PATCH')
                            
                            <select name="status" 
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>In Behandeling</option>
                                <option value="approved" {{ $registration->status === 'approved' ? 'selected' : '' }}>Goedgekeurd</option>
                                <option value="rejected" {{ $registration->status === 'rejected' ? 'selected' : '' }}>Afgewezen</option>
                            </select>
                            
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Status Bijwerken
                            </button>
                        </form>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-600">
                        <a href="{{ route('admin.registrations.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Terug naar Overzicht
                        </a>
                        
                        <div class="space-x-3">
                            <a href="mailto:{{ $registration->parent_email }}?subject=Inschrijving {{ $registration->child_name }} - ACJM&body=Beste {{ $registration->parent_name }},%0D%0A%0D%0ABetreft: Inschrijving {{ $registration->child_name }}%0D%0A%0D%0A" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                E-mail Versturen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>