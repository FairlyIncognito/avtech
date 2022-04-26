<div class="flex items-center mt-2 md:mt-0">
    @if (Route::has('login'))
        <div class="px-6 py-4">

            <!-- If logged in -->
            @auth
                @can('edit profile')
                    <a href="{{ route('idea.create') }}">
                        {{ __('Profile') }}
                    </a>
                @endcan

                <!-- Logout form -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4 text-sm">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>

            <!-- If not logged in -->
            @else
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    <a href="{{ route('login') }}" class="text-gray-100 underline text-md">
                        {{ __('Log In') }}
                    </a>
                
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-gray-100 underline text-md">
                            {{ __('Register') }}
                        </a>
                    @endif
                </div>
            @endauth

        </div>
    @endif

    @auth
        
        <img src="{{ Auth::user()->getAvatar() }}" alt="avatar" class="w-10 h-10 rounded-full">
        
    @endauth          
</div>


