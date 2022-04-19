<div 
    class="relative flex justify-center min-h-screen py-4 text-white bg-gray-100 bg-cover bg-home items-top dark:bg-gray-700 sm:items-center sm:pt-0" 
    style="background-image: url(<?= asset('img/' . rand(1,6) . '.jpg'); ?>)"
>   <!-- Div with randomized background image from asset folder -->

    <!-- Wrapper -->
    <div class="flex-col p-10 text-center bg-black bg-overlay rounded-xl bg-opacity-60 w-50">
        
        <!-- Logo -->
        <img 
            class="py-2 mx-auto"
            src="{{ asset('img/logo_white.png')}}"
            alt="smart hire logo in white" 
        />

        <!-- Tagline -->
        <p class="text-2xl font-semibold leading-tight text-gray-100">
            Professionel Freelancer Portal
        </p>

        <livewire:category-index /> <!-- Work Categories -->
        
    </div>
    <!-- Wrapper end -->

    <x-nav-links /> <!-- Login/register links -->

</div>