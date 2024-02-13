<div class="mt-5">
    <div class="mb-2  flex items-center gap-2">
        <input type="text"
            class="py-3 px-4 block w-[90%] border-gray-200 rounded-lg text-sm focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
            wire:model.live="search" placeholder="Search voter">
        <label for="family" class="inline-flex items-center">
            <input wire:model.live="family" id="family" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Only Family No') }}</span>
        </label>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Block
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Serial
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Family
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Father
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">CNIC
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Gender
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($voters as $voter)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $voter->block }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $voter->serial_number }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $voter->family_number }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 capitalize">
                                            {{ $voter->name }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 capitalize">
                                            {{ $voter->father_name }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $voter->cnic }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $voter->gender }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            @if ($voter->casted)
                                                @if ($is_casted)
                                                    {{ $voter->updated_at->addHours(5)->format('g:i A') }}
                                                @else
                                                    <button type="button"
                                                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-teal-900 dark:text-teal-500 dark:hover:text-teal-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        disabled>
                                                        Casted
                                                    </button>
                                                @endif
                                            @else
                                                <button type="button" wire:click="casted({{ $voter->id }})"
                                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-teal-500 text-teal-500 hover:border-teal-400 hover:text-teal-400 disabled:opacity-50 disabled:pointer-events-none dark:border-teal-500 dark:text-teal-500 dark:hover:text-teal-400 dark:hover:border-teal-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    Done
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"
                                            colspan="8">
                                            {{ $search ? 'No voter in the list' : 'Please search to find voter details' }}
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 mt-2">
                        {!! $voters->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
