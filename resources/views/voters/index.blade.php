<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Voters') }}
            </h2>
            <div class="">
                {{-- <a href="{{ route('voters.export', ['type' => 'pdf']) }}" wire:navigate>
                    <x-primary-button>{{ __('Export PDF') }}</x-primary-button>
                </a>
                <a href="{{ route('voters.export', ['type' => 'excel']) }}" wire:navigate>
                    <x-primary-button>{{ __('Export Excel') }}</x-primary-button>
                </a>
                <a href="{{ route('voters.export', ['type' => 'csv']) }}" wire:navigate>
                    <x-primary-button>{{ __('Export CSV') }}</x-primary-button>
                </a> --}}
                <a href="{{ route('voters.create') }}" wire:navigate>
                    <x-primary-button>{{ __('Add Voter') }}</x-primary-button>
                </a>

            </div>


        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('voters.voter-list')
        </div>
    </div>
</x-app-layout>
