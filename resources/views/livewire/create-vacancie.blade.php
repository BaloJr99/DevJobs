<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='createVacancy'>
    <div>
            <x-input-label for="title" :value="__('Vacancy Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" placeholder="Vacancy Title" />
            @error('title')
                <livewire:show-alert :message="$message"/>
            @enderror
    </div>
    <div>
        <x-input-label for="salary" :value="__('Salary')" />
        <select wire:model="salary" id="salary" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Select a salary --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary -> id }}">{{ $salary -> salary }}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Select a category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}">{{ $category -> category }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="company" :value="__('Company Name')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" placeholder="Company: ej. Netflix, Uber, Shopify" />
        @error('company')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="lastHiringDate" :value="__('Last Hiring Date')" />
        <x-text-input id="lastHiringDate" class="block mt-1 w-full" type="date" wire:model="lastHiringDate" :value="old('lastHiringDate')"/>
        @error('lastHiringDate')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="jobDescription" :value="__('Job Description')" />
        <textarea id="jobDescription" wire:model="jobDescription" placeholder="Job Description, experience"
        class="h-72 block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        ></textarea>
        @error('jobDescription')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" accept="image/*" wire:model="image" />
        <div class="my-5 w-full flex justify-center">
            @if ($image)
                <img src="{{ $image -> temporaryUrl() }}" alt="preImage" class="w-2/3">
            @endif
        </div>
        @error('image')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div class="w-full flex justify-end">
        <x-primary-button class="">
            {{ __('Create Vacancy') }}
        </x-primary-button>
    </div>
</form>
