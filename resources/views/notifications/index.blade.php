<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">My Notifications</h1>
                    <div class="divide-y divide-gray-200">
                        @forelse ($notifications as $notification)

                            </div>
                            <div class="p-5  lg:flex lg:justify-between lg:items-center">
                                <div>
                                    <p>You have a new Candidate on: 
                                        <span class="font-bold">{{ $notification -> data["vacancy_name"] }}</span>
                                    </p>
                                    <p><span class="font-bold">{{ $notification -> created_at -> diffForHumans() }}</span></p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidates.index', $notification -> data['vacancy_id']) }}" class="bg-teal-900 p-3 text-sm uppercase font-bold text-white rounded-lg">Show Candidates</a>
                                </div>
                            </div>
                        @empty
                            <p class="p-3 text-center text-sm text-white">No new notification</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
