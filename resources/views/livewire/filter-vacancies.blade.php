<div class="bg-gray-800 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-200 text-center font-extrabold my-5">Search and filter vacancies</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='readFormData'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-200 uppercase font-bold "
                        for="termino">Search Term
                    </label>
                    <input 
                        id="termino"
                        type="text"
                        wire:model="term"
                        placeholder="Search Term: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-200 uppercase font-bold">Category</label>
                    <select class="border-gray-300 p-2 w-full" wire:model='category'>
                        <option>-- Select --</option>
            
                        @foreach ($categories as $category )
                            <option value="{{ $category -> id }}">{{ $category -> category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-200 uppercase font-bold">Monthly Salary</label>
                    <select class="border-gray-300 p-2 w-full" wire:model='salary'>
                        <option>-- Select --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary -> id }}">{{$salary -> salary}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Search"
                />
            </div>
        </form>
    </div>
</div>