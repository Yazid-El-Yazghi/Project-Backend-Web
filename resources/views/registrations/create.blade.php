<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kind Inschrijven bij ACJM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Inschrijving Voetbalclub ACJM</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Vul onderstaand formulier in om je kind in te schrijven bij voetbalclub ACJM. 
                            We nemen binnen 2 werkdagen contact met je op over de inschrijving.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('registrations.store') }}" class="space-y-6">
                        @csrf

                        <!-- Child Information -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 mb-4">Gegevens Kind</h4>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="child_name" :value="__('Naam van het kind')" />
                                    <x-text-input id="child_name" 
                                                  class="block mt-1 w-full" 
                                                  type="text" 
                                                  name="child_name" 
                                                  :value="old('child_name')" 
                                                  required />
                                    <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="age" :value="__('Leeftijd')" />
                                    <x-text-input id="age" 
                                                  class="block mt-1 w-full" 
                                                  type="number" 
                                                  name="age" 
                                                  min="4" 
                                                  max="18"
                                                  :value="old('age')" 
                                                  required />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Leeftijd tussen 4 en 18 jaar</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6 mt-4">
                                <div>
                                    <x-input-label for="tshirt_size" :value="__('T-shirt maat')" />
                                    <select id="tshirt_size" 
                                            name="tshirt_size" 
                                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            required>
                                        <option value="">Selecteer maat</option>
                                        <option value="XS" {{ old('tshirt_size') == 'XS' ? 'selected' : '' }}>XS</option>
                                        <option value="S" {{ old('tshirt_size') == 'S' ? 'selected' : '' }}>S</option>
                                        <option value="M" {{ old('tshirt_size') == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="L" {{ old('tshirt_size') == 'L' ? 'selected' : '' }}>L</option>
                                        <option value="XL" {{ old('tshirt_size') == 'XL' ? 'selected' : '' }}>XL</option>
                                        <option value="XXL" {{ old('tshirt_size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('tshirt_size')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="shoe_size" :value="__('Schoenmaat')" />
                                    <x-text-input id="shoe_size" 
                                                  class="block mt-1 w-full" 
                                                  type="number" 
                                                  name="shoe_size" 
                                                  min="20" 
                                                  max="50"
                                                  :value="old('shoe_size')" 
                                                  required />
                                    <x-input-error :messages="$errors->get('shoe_size')" class="mt-2" />
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Bijvoorbeeld: 36, 42</p>
                                </div>
                            </div>
                        </div>

                        <!-- Parent Information -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 mb-4">Gegevens Ouder/Voogd</h4>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="parent_name" :value="__('Naam ouder/voogd')" />
                                    <x-text-input id="parent_name" 
                                                  class="block mt-1 w-full" 
                                                  type="text" 
                                                  name="parent_name" 
                                                  :value="old('parent_name')" 
                                                  required />
                                    <x-input-error :messages="$errors->get('parent_name')" class="mt-2" />
                                </div>

                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="parent_email" :value="__('E-mailadres')" />
                                        <x-text-input id="parent_email" 
                                                      class="block mt-1 w-full" 
                                                      type="email" 
                                                      name="parent_email" 
                                                      :value="old('parent_email')" 
                                                      required />
                                        <x-input-error :messages="$errors->get('parent_email')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="parent_phone" :value="__('Telefoonnummer (optioneel)')" />
                                        <x-text-input id="parent_phone" 
                                                      class="block mt-1 w-full" 
                                                      type="tel" 
                                                      name="parent_phone" 
                                                      :value="old('parent_phone')" />
                                        <x-input-error :messages="$errors->get('parent_phone')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Information Box -->
                        <div class="bg-blue-50 dark:bg-blue-900/50 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <h5 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">Belangrijke informatie:</h5>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Training vindt plaats op dinsdagavond en zaterdagochtend</li>
                                <li>• Contributie bedraagt €15 per maand</li>
                                <li>• Voetbalschoenen en scheenbeschermers zijn verplicht</li>
                                <li>• We nemen binnen 2 werkdagen contact op</li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ auth()->check() ? route('dashboard') : route('welcome') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:bg-gray-400 dark:focus:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Terug
                            </a>
                            
                            <x-primary-button>
                                {{ __('Inschrijving Verzenden') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>