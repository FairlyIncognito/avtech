<div class="flex items-center mt-2 md:mt-0">
    @if (Route::has('login'))
        <div class="px-6 py-4">

            <!-- If logged in -->
            @auth
                <a href="{{ route('idea.create') }}">
                    Profil
                </a>

                <!-- Logout form -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4 text-sm">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log ud
                    </a>
                </form>

            <!-- If not logged in -->
            @else
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    <a href="{{ route('login') }}" class="text-gray-100 underline text-md">
                        Log ind
                    </a>
                
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-gray-100 underline text-md">
                            Registrer
                        </a>
                    @endif
                </div>
            @endauth

        </div>
    @endif

    @auth
        <a href="{{ route('idea.create') }}">
            <img src="https://www.gravatar.com/avatar/sdfdhft6asdasdsada743523?d=retro" alt="avatar" class="w-10 h-10 rounded-full">
        </a>
    @endauth          
</div>


