<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
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
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Neem contact met ons op</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Heb je vragen over voetbalclub ACJM? Stuur ons een bericht en we nemen zo snel mogelijk contact met je op.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Naam')" />
                                <x-text-input id="name" 
                                              class="block mt-1 w-full" 
                                              type="text" 
                                              name="name" 
                                              :value="old('name')" 
                                              required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('E-mailadres')" />
                                <x-text-input id="email" 
                                              class="block mt-1 w-full" 
                                              type="email" 
                                              name="email" 
                                              :value="old('email')" 
                                              required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="subject" :value="__('Onderwerp')" />
                            <x-text-input id="subject" 
                                          class="block mt-1 w-full" 
                                          type="text" 
                                          name="subject" 
                                          :value="old('subject')" 
                                          required />
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="message" :value="__('Bericht')" />
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                      required>{{ old('message') }}</textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('Verzend Bericht') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Contactgegevens</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Adres</h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Voetbalclub ACJM<br>
                                Sportlaan 123<br>
                                1234 AB Sportstad
                            </p>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Contact</h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                Telefoon: 012-3456789<br>
                                E-mail: info@acjm.nl<br>
                                Website: www.acjm.nl
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>