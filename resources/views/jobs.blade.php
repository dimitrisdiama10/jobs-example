<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="block border border-gray-400 px-4 py-6 rounded-lg">
                <div class="font-bold text-blue-400">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}:</strong> Salary {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach
    </div>

</x-layout>