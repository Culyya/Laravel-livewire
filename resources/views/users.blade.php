<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Preview Users') }}
        </h2>
    </x-slot>
    <button class="btn btn-outline">Default</button>
    <livewire:user.index/>

</x-app-layout>
