<x-app-layout>
    <div class="mx-auto md:mr-5 md:mx-0">   
        <div 
            class="mt-16 bg-white border-2 md:sticky md:top-8 border-blue rounded-xl" 
            style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    border-image-slice: 1;
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                    ">

            <div class="px-6 py-2 pt-6 text-center">
                <h3 class="text-base font-semibold">Profil</h3>
                @auth
                    <p class="mt-4 text-xs">Fortæl lidt om dig selv.</p>
                @else
                    <p class="mt-4 text-xs">Log venligst ind først, eller registrer dig som bruger.</p>
                @endauth
                
            </div>

            @auth
               <livewire:create-idea />
            @else
            <div class="my-6 text-center">
                <a href="{{ route('login') }}" class="items-center justify-center inline-block w-1/2 px-6 py-3 text-xs font-semibold text-white transition duration-150 ease-in border bg-blue border-blue h-11 rounded-xl hover:bg-blue-hover">
                    Log ind
                </a>

                <a href="{{ route('register') }}" class="items-center justify-center inline-block w-1/2 px-6 py-3 mt-4 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400">
                    Registrer
                </a>
            </div>
            @endauth
            
        </div>
    </div>
</x-app-layout>