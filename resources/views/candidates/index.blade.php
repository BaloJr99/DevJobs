<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidates Applied') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">Candidates Applied : {{ $vacancy -> title }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacancy -> candidates as $candidate)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-300">{{ $candidate -> user -> name }}</p>
                                        <p class="text-sm text-gray-300">{{ $candidate -> user -> email }}</p>
                                        <p class="text-sm text-gray-300">Applied Date: <span class="font-normal">{{ $candidate -> created_at -> diffForHumans() }}</span></p>
                                    </div>
                                    <div>
                                        <a href="{{ asset('storage/cv/' . $candidate -> cv) }}" target="_blank" rel="noreferrer noopener" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border-gray-900 text-sm leading-5 font-medium rounded-full text-gray-50 bg-gray-500 hover:bg-gray-50 hover:text-gray-700">See Resume</a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-white">No new notification</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
