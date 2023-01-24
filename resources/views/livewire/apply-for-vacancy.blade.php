<div class="bg-gray-700 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4 text-white">Apply For This Job</h3>

    @if (session() -> has('message'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('message') }}
        </div>
    @else
        <form  wire:submit.prevent="postulate" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Resume (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model='cv'/>
                @error('cv')
                    <livewire:show-alert :message="$message">
                @enderror
            </div>

            <x-primary-button class="my-5">
                {{ __("Apply") }}
            </x-primary-button>
        </form>
    @endif
</div>
