<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacancies as $vacancy)
            <div class="p-6 dark:text-gray-100 text-gray-900 md:flex md:justify-between md:items-center border-b border-gray-400 ">
                <div class="space-y-3">
                    <a href="{{ route('vacancies.show', $vacancy) }}" class="text-xl font-bold">
                        {{ $vacancy -> title }}
                    </a>
                    <p class="text-sm text-gray-300 font-bold">{{ $vacancy -> company }}</p>
                    <p class="text-sm text-gray-400">Last Day: {{ $vacancy -> lastHiringDate -> format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidates.index', $vacancy) }}" class="bg-gray-400 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase text-center hover:bg-white"> {{ $vacancy -> candidates -> count() }} @choice('Candidate|Candidates', $vacancy -> candidates -> count())</a>
                    <a href="{{ route('vacancies.edit', $vacancy -> id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center hover:bg-blue-600">Edit</a>
                    <button wire:click="$emit('showAlert', {{ $vacancy -> id }})" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center hover:bg-red-600">Delete</button>
                </div>        
            </div>
        @empty
            <p class="p-3 text-center text-sm text-white">No vacancies to show</p>
        @endforelse
    </div>
    
    <div class="mt-10">
        {{ $vacancies -> links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('showAlert', (vacancy_id) => {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteVacancy', vacancy_id)
                    Swal.fire(
                        'Deleted!',
                        'Your vacancy has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush