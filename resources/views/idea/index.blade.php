@auth
    <!-- If logged in, show app -->
    <x-app-layout>
        <livewire:status-filters />
        <livewire:ideas-index />
    </x-app-layout>
@else
    <!-- If not logged in, show guest index page -->
    <x-guest-layout>
        <x-home-guest />
    </x-guest-layout>
@endauth