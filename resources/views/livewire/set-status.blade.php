<div
    class="relative"
    x-data="{ isOpen: false }"
    x-init="
        window.livewire.on('statusWasUpdated', () => {
            isOpen = false
        })
    "
>
    <button
        type="button"
        @click="isOpen = !isOpen"
        class="flex items-center justify-center px-6 py-3 mt-2 text-sm font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 w-36 h-11 rounded-xl hover:border-gray-400 md:mt-0"
    >
        {{ __('Status') }}
        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div
        x-cloak
        x-show.transition.origin.top.left="isOpen"
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute z-20 w-64 mt-2 text-sm font-semibold text-left bg-white md:w-76 shadow-dialog rounded-xl"
    >
        <form wire:submit.prevent="setStatus" action="#" class="px-4 py-6 space-y-4">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="text-gray-600 bg-gray-200 border-none" name="status" value="1" checked>
                        <span class="ml-2">
                            {{ __('Open') }}
                        </span>
                    </label>
                </div>
                
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 border-none text-red" name="status" value="5">
                        <span class="ml-2">
                            {{ __('Closed') }}
                        </span>
                    </label>
                </div>
            </div>

            <div>
                <textarea name="update_comment" id="update_comments" cols="30" rows="3" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Add an update comment (optional)"></textarea>
            </div>

            <div class="flex items-center justify-between space-x-3">
                <button
                    type="button"
                    class="flex items-center justify-center w-1/2 px-6 py-3 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400"
                >
                    <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1">
                        {{ __('Attach') }}
                    </span>
                </button>
                <button
                    type="submit"
                    class="flex items-center justify-center w-1/2 px-6 py-3 text-xs font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover disabled:opacity-50"
                >
                    <span class="ml-1">
                        {{ __('Update') }}
                    </span>
                </button>
            </div>

            <div>
                <label class="inline-flex items-center font-normal">
                    <input type="checkbox" class="bg-gray-200 rounded">
                    <span class="ml-2">
                        {{ __('Send status-change notification') }}
                    </span>
                </label>
            </div>
        </form>
    </div>
</div>
