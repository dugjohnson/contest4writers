<x-app-layout>
    <x-slot name="header">
        <div>
            <span class="font-semibold text-gray-800 ">
                Work with Entries
            </span>
            <a class="mybutton float-right" href="/coordinators">Return</a>
        </div>
    </x-slot>
    @livewire('entry-listing')
</x-app-layout>
