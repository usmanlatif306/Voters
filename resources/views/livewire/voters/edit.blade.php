<section>
    <form wire:submit="update" class="mt-6 space-y-6">
        <div>
            <x-input-label for="block" :value="__('Block')" />
            <x-text-input wire:model="block" id="block" name="block" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('block')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="serial_number" :value="__('Serial Number')" />
            <x-text-input wire:model="serial_number" id="serial_number" name="serial_number" type="text"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="family_number" :value="__('Family Number')" />
            <x-text-input wire:model="family_number" id="family_number" name="family_number" type="text"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('family_number')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="father_name" :value="__('Father Name')" />
            <x-text-input wire:model="father_name" id="father_name" name="father_name" type="text"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="cnic" :value="__('CNIC Number')" />
            <x-text-input wire:model="cnic" id="cnic" name="cnic" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('cnic')" class="mt-2" />
        </div>

        <!-- Confirm Vote -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input id="remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    wire:model="confirmed" @checked($voter->confirmed)>
                <span class="ms-2 text-sm text-gray-600">{{ __('Confirm Vote') }}</span>
            </label>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Voter') }}</x-primary-button>

            <x-action-message class="me-3" on="voter-saved">
                {{ __('Voter Updated.') }}
            </x-action-message>
        </div>
    </form>
</section>
