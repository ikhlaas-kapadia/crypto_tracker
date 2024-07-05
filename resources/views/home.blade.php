<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>
    <h1>Home Page</h1>
    <x-coins :data=$data>
        Coins List
    </x-coins>
    {{-- @dump($data); --}}
</x-layout>