<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-gray-800 ">
            Work with Entries
        </p>
    </x-slot>
    @livewire('entry-listing')
    <a href="/coordinators" >Return</a>
</x-app-layout>
