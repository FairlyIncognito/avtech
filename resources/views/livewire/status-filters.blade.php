<nav class="items-center justify-between hidden text-xs text-gray-400 md:flex">
    <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
        <li>
            <a wire:click.prevent='setStatus("All")' href="{{ route('idea.index', ['status' => 'All']) }}" 
                class="pb-3 transition duration-150 ease-in border-b-4 hover:border-blue 
                @if($status === 'All') border-blue text-gray-900 @endif"
            >
               {{ __('All') }} ({{ $statusCount['all_statuses'] }})
            </a>
        </li>

        <li>
            <a wire:click.prevent='setStatus("Open")' href="{{ route('idea.index', ['status' => 'Open']) }}" 
                class="pb-3 transition duration-150 ease-in border-b-4 hover:border-blue 
                @if($status === 'Open') border-blue text-gray-900 @endif"
            >
                {{ __('Open') }} ({{ $statusCount['open'] }})
            </a>
        </li>
    </ul>

    <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">


        <li>
            <a wire:click.prevent='setStatus("Closed")' href="{{ route('idea.index', ['status' => 'Closed']) }}" 
                class="pb-3 transition duration-150 ease-in border-b-4 hover:border-blue 
                @if($status === 'Closed') border-blue text-gray-900 @endif"
            >
                {{ __('Closed') }} ({{ $statusCount['closed'] }})
            </a>
        </li>
    </ul>
</nav>