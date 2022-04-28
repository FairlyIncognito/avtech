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

            <div class="content-center px-6 py-2 pt-6 text-center">
                <h3 class="text-base font-semibold">
                    {{ __('Profile') }}
                </h3>
                
                @auth
                    <img 
                        src="{{ Auth::user()->getAvatar() }}" 
                        alt="avatar" 
                        class="inline-block w-10 h-10 mt-2 text-center rounded-full">
                    
                    <p class="mt-4 text-xs">
                        {{ __('Tell us a little about yourself.') }}
                    </p>
                @else
                    <p class="mt-4 text-xs">
                        {{ __('Please log in first, or register an account.') }}
                    </p>
                @endauth
                
            </div>

            @auth
               <livewire:create-job />
            @else
                <x-nav-links-login />
            @endauth
            
        </div>
    </div>
</x-app-layout>