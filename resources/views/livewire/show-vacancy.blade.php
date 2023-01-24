<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-200 my-3">
            {{ $vacancy -> title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-100 my-3">Company:
                <span class="font-normal normal-case">{{ $vacancy -> company }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-100 my-3">Last Hiring Day:
                <span class="font-normal normal-case">{{ $vacancy -> lastHiringDate -> toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-100 my-3">Category:
                <span class="font-normal normal-case">{{ $vacancy -> category -> category }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-100 my-3">Salary:
                <span class="font-normal normal-case">{{ $vacancy -> salary -> salary  }}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/' . $vacancy -> image) }}" alt="Vacancy Image">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5 text-gray-200">Job Description</h2>
            <p class="text-gray-100 ">{{ $vacancy -> jobDescription }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-700 border border-dashed p-5 text-center">
            <p class="text-white">
                Do you wanna apply to this job? <a class="font-bold text-orange-400" href="{{ route('register') }}">Create an account and apply for this and other Jobs</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacancy::class)
            <livewire:apply-for-vacancy :vacancy="$vacancy"/>
        @endcannot
    @endauth
</div>
