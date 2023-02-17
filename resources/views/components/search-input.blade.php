@props(['helptext'=>false])
<div>
    <div class="flex flex-1 justify-center px-2 lg:ml-6 lg:justify-end">
        <div>
            @if ($helptext)
                <span>{{$helptext}}</span>
            @endif
        </div>
        <div class="w-full max-w-lg lg:max-w-xs">
            <div class="relative text-gray-400 focus-within:text-gray-600 float-right">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <!-- Heroicon name: mini/magnifying-glass -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <input wire:model="search"
                       class="block w-full rounded-md border border-transparent bg-white py-2 pl-10 pr-3 leading-5 text-gray-900 placeholder-gray-500 focus:border-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600 sm:text-sm"
                       placeholder="Search" type="search" name="search">
            </div>
        </div>
    </div>
</div>

