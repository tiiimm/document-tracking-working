<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create New User</h1>
    <form wire:submit.prevent="submitDocument" class="mt-6 space-y-6">
        <div class="flex gap-4">
            <div class="flex-1/4">
                <flux:input wire:model="family_name" :label="__('Family Name')" type="text" required autofocus autocomplete="family_name" />
            </div>
            <div class="flex-1/4">
                <flux:input wire:model="given_name" :label="__('Given Name')" type="text" required autofocus autocomplete="given_name" />
            </div>
            <div class="flex-1/4">
                <flux:input wire:model="middle_name" :label="__('Middle Name')" type="text" required autofocus autocomplete="middle_name" />
            </div>
            <div class="flex-1/12">
                <flux:input wire:model="middle_initial" :label="__('MI')" type="text" required autofocus autocomplete="middle_initial" />
            </div>
            <div class="flex-1/6">
                <flux:input wire:model="suffix" :label="__('Suffix')" type="text" required autofocus autocomplete="suffix" />
            </div>
        </div>
        <div class="flex gap-4">
            <div class="flex-1/12">
                <flux:input wire:model="honorifics" :label="__('Honorifics')" type="text" required autofocus autocomplete="honorifics" />
            </div>
            <div class="flex-1/12">
                <flux:input wire:model="titles" :label="__('Titles')" type="text" required autofocus autocomplete="titles" />
            </div>
            <div class="flex-1/12">
                <flux:input wire:model="gender" :label="__('Gender')" type="text" required autofocus autocomplete="gender" />
            </div>
            <div class="flex-2/4">
                <flux:input wire:model="email" :label="__('Email')" type="email" required autofocus autocomplete="email" />
            </div>
        </div>
        <div class="flex gap-4">
            <div class="flex-1/3 space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Office') }}
                </label>

                <flux:select wire:model="office_id" placeholder="Choose office...">
                    @foreach ($offices as $office)
                        <flux:select.option value="{{ $office->id }}">{{ $office->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="flex-1/3">
                <flux:input wire:model="position" :label="__('Position')" type="text" required autocomplete="position" />
            </div>
            <div class="flex-1/12 space-y-4">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Office') }}
                </label>

                <flux:checkbox wire:model="is_head" label="Is head" />
            </div>
        </div>
        <div class="flex gap-4 items-center">
            <div class="flex-1/4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                <div class="flex items-center gap-4">
                    <!-- Image Preview -->
                    @if($signature)
                        <div class="relative">
                            <img src="{{ $signature->temporaryUrl() }}" class="w-40 h-20 object-cover border-2 border-gray-300">
                            <button wire:click="removePhoto" type="button" class="absolute -top-2 -right-2 bg-red-500 text-white p-1 text-xs">
                                ✕
                            </button>
                        </div>
                    @else
                        <div class="w-40 h-20 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif
                    
                    <!-- File Input -->
                    <div>
                        <input 
                            type="file" 
                            wire:model="signature" 
                            id="signature"
                            accept="image/*"
                            class="hidden"
                        >
                        <label for="signature" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ $signature ? 'Change' : 'Upload' }}
                        </label>
                        @error('signature') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="button" wire:click.prevent="saveUser" class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
</div>  