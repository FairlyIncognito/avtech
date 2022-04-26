<x-app-layout>
    <livewire:status-filters />
    
    <div class="mt-8">
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">
                {{ __('Go back') }} <span class="text-gray-300">({{ __('incl. category & filters') }})</span>
            </span>
        </a>
    </div>

    <livewire:idea-show 
        :idea="$idea" 
    />
</x-app-layout>