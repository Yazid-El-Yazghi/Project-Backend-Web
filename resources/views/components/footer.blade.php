<footer class="bg-gray-800 dark:bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Club Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">ACJM Voetbalclub</h3>
                <p class="text-gray-300 text-sm">
                    De voetbalclub voor jong en oud in de regio. 
                    Samen sporten, samen groeien.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Snelle Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('news.index') }}" class="text-gray-300 hover:text-white transition duration-150">Nieuws</a></li>
                    <li><a href="{{ route('registrations.create') }}" class="text-gray-300 hover:text-white transition duration-150">Inschrijven</a></li>
                    <li><a href="{{ route('faq.index') }}" class="text-gray-300 hover:text-white transition duration-150">FAQ</a></li>
                    <li><a href="{{ route('contact.show') }}" class="text-gray-300 hover:text-white transition duration-150">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <div class="text-sm text-gray-300 space-y-1">
                    <p>Sportlaan 123</p>
                    <p>1234 AB Sportstad</p>
                    <p>Tel: 012-3456789</p>
                    <p>Email: info@acjm.nl</p>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-6 text-center">
            <p class="text-sm text-gray-400">
                © {{ date('Y') }} ACJM Voetbalclub. Alle rechten voorbehouden.
            </p>
        </div>
    </div>
</footer>