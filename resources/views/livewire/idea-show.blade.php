<div class="container idea-and-buttons">
    <div class="flex mt-4 bg-white idea-container rounded-xl">
        
        <div class="flex flex-col flex-1 px-4 py-6 md:flex-row">
            <div class="flex-none mx-2">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>

                <div class="hidden mt-6 font-bold text-gray-900 md:block">{{ $idea->user->name }}</div>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="mt-2 text-xl font-semibold md:mt-0">
                    {{ $idea->title }}
                </h4>
                <div class="mt-3 text-gray-600">
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col justify-between mt-6 md:flex-row md:items-center">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div class="hidden md:block"></div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        
                        
                        
                    </div>
                    <div
                        class="flex items-center mt-4 space-x-2 md:mt-0"
                        x-data="{ isOpen: false }"
                    >
                        <div class="status-{{ Str::kebab($idea->status->name) }} px-4 py-2 font-bold leading-none text-center uppercase rounded-full text-xxs w-28 h-7">{{ $idea->status->name }}</div>
                        <button
                            class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                class="absolute right-0 z-10 py-3 font-semibold text-left bg-white w-44 shadow-dialog rounded-xl md:ml-8 top-8 md:top-6 md:left-0"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                <li>
                                    <a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100"
                                    >
                                        {{ __('Mark as Spam') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100"
                                    >
                                        {{ __('Delete Post') }}
                                    </a>
                                </li>
                            </ul>
                        </button>
                    </div>

                    <div class="flex items-center mt-4 md:hidden md:mt-0">
                        <div class="h-10 px-4 py-2 pr-8 text-center bg-gray-100 rounded-xl">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="flex items-center justify-between mt-6 buttons-container">
        <div class="flex flex-col items-center space-x-4 md:flex-row md:ml-6">
            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    type="button"
                    @click="isOpen = !isOpen"
                    class="flex items-center justify-center w-32 px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover"
                >
                    {{ __('Answer') }}
                </button>
                <div
                    class="absolute z-10 w-64 mt-2 text-sm font-semibold text-left bg-white md:w-104 shadow-dialog rounded-xl"
                    x-cloak
                    x-show.transition.origin.top.left="isOpen"
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                >
                    <form action="#" class="px-4 py-6 space-y-4">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
                        </div>

                        <div class="flex flex-col items-center md:flex-row md:space-x-3">
                            {{-- <button
                                type="button"
                                class="flex items-center justify-center w-full px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in border h-11 md:w-1/2 bg-blue rounded-xl border-blue hover:bg-blue-hover"
                            >
                                Post Comment
                            </button> --}}
                            <button
                                type="button"
                                class="flex items-center justify-center w-full px-6 py-3 mt-2 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:w-32 h-11 rounded-xl hover:border-gray-400 md:mt-0"
                            >
                                <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">{{ __('Attach') }}</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            @auth
                @if(auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea"/>
                @endif  
            @endauth
        </div>

        <div class="items-center hidden space-x-3 md:flex">
            <div class="px-3 py-2 font-semibold text-center bg-white rounded-xl">
                
            </div>
            
        </div>
        
    </div> <!-- end buttons-container -->
</div> <!-- end idea and buttons container -->