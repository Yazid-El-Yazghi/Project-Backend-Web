<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contact Message') }}
            </h2>
            <a href="{{ route('admin.contact.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Messages
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Message Header -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $contactMessage->subject }}</h3>
                                <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                    <span><strong>From:</strong> {{ $contactMessage->name }}</span>
                                    <span><strong>Email:</strong> {{ $contactMessage->email }}</span>
                                    <span><strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y \a\t H:i') }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $contactMessage->is_read ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                    {{ $contactMessage->is_read ? 'Read' : 'Unread' }}
                                </span>
                                @if($contactMessage->is_read && $contactMessage->read_at)
                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                        Read {{ $contactMessage->read_at->diffForHumans() }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="prose prose-sm max-w-none dark:prose-invert">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-gray-900 dark:text-gray-100 whitespace-pre-line">{{ $contactMessage->message }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            @if(!$contactMessage->is_read)
                                <form method="POST" action="{{ route('admin.contact.mark-read', $contactMessage) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Mark as Read
                                    </button>
                                </form>
                            @endif
                            
                            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" 
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Reply via Email
                            </a>
                        </div>

                        <form method="POST" action="{{ route('admin.contact.destroy', $contactMessage) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                    onclick="return confirm('Are you sure you want to delete this message?')">
                                Delete Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>