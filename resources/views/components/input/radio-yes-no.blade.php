<div>
    <div wire:key="{{ $attributes['wire:key'] }}" class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
        <div class="flex items-center">
            <input wire:model="{{ $attributes['wire:model'] }}" type="radio" value="1"
                   class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <label for="email" class="ml-3 block text-sm font-medium text-gray-700">Yes</label>
        </div>

        <div class="flex items-center">
            <input  wire:model="{{ $attributes['wire:model'] }}" type="radio" value="0" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <label for="sms" class="ml-3 block text-sm font-medium text-gray-700">No</label>
        </div>
    </div>
</div>
