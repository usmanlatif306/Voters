<header class="pt-3 border-b border-green-700 p-2">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-3 text-center">
            <h2 class="text-2xl font-semibold">Total Votes: {{ $total_voters }}</h2>
            <div class="flex gap-3 items-center">
                <h4 class="text-2xl font-semibold">Male: {{ $male_voters }}</h4>
                <h4 class="text-2xl font-semibold">Female: {{ $female_voters }}</h4>
            </div>
        </div>
        <div class="flex flex-col items-center gap-3">
            <img src="{{ asset('pti.png') }}" alt="Pakistan Tehreek-e-Insaf" class="w-20 h-20 object-cover">
            <h1 class="text-3xl font-semibold">Pakistan Tehreek-e-Insaf</h1>
            {{-- <h1 class="text-3xl font-semibold">پاکستان تحریک انصاف</h1> --}}
        </div>
        <div class="flex flex-col gap-3 text-center">
            <h2 class="text-2xl font-semibold">Votes Casted: {{ $votes_casted }}</h2>
            <div class="flex gap-3 items-center">
                <h4 class="text-2xl font-semibold">Male: {{ $male_vote_casted }}</h4>
                <h4 class="text-2xl font-semibold">Female: {{ $female_vote_casted }}</h4>
            </div>
            <a href="{{ route('voters', ['type' => 'casted']) }}">View Casted Votes</a>
        </div>
    </div>
</header>
