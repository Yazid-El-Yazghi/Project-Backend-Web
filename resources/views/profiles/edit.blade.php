<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Profiel Bewerken') }}
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
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Profiel Informatie</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Update je publieke profielinformatie. Deze informatie is zichtbaar voor iedereen.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('profiles.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Username -->
                        <div>
                            <x-input-label for="username" :value="__('Gebruikersnaam (optioneel)')" />
                            <x-text-input id="username" 
                                          class="block mt-1 w-full" 
                                          type="text" 
                                          name="username" 
                                          :value="old('username', $profile->username)" 
                                          placeholder="Laat leeg om je echte naam te gebruiken" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Dit is de naam die anderen op je profiel zien. Laat leeg om "{{ $user->name }}" te gebruiken.
                            </p>
                        </div>

                        <!-- Birthday -->
                        <div>
                            <x-input-label for="birthday" :value="__('Verjaardag (optioneel)')" />
                            <x-text-input id="birthday" 
                                          class="block mt-1 w-full" 
                                          type="date" 
                                          name="birthday" 
                                          :value="old('birthday', $profile->birthday?->format('Y-m-d'))" />
                            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                        </div>

                        <!-- About Me -->
                        <div>
                            <x-input-label for="about_me" :value="__('Over mij (optioneel)')" />
                            <textarea id="about_me" 
                                      name="about_me" 
                                      rows="4" 
                                      class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                      placeholder="Vertel iets over jezelf...">{{ old('about_me', $profile->about_me) }}</textarea>
                            <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Maximaal 1000 karakters
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('profiles.show', $user) }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Bekijk Profiel
                            </a>
                            
                            <x-primary-button>
                                {{ __('Profiel Opslaan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>