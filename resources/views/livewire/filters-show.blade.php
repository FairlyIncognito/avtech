<div class="flex flex-col space-y-3 filters md:flex-row md:space-y-0 md:space-x-6">
    
    <!-- categories dropdown -->
    <div class="w-full md:w-1/3"> 
        <select 
            wire:model="category" 
            name="category" 
            id="category" 
            class="w-full px-4 py-2 border-none rounded-xl"
        >
            <option value="All Categories">
                {{ __('All Categories') }}
            </option>
            
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <!-- categories end -->
    
    <!-- status dropdown -->
    <div class="w-full md:w-1/3">
        <select wire:model="filter" name="other_filters" id="other_filters" class="w-full px-4 py-2 border-none rounded-xl">
            <option value="No Filter">
                {{ __('No Filters') }}
            </option>
            <option value="Top Voted">
                {{ __('Popular') }}
            </option>
            
            @if(auth()->check()) 
                <option value="My Ideas">
                    {{ __('My Jobs') }}
                </option>
            @endif
        </select>
    </div>
     <!-- end status -->
    
    <!-- search field -->
    <div class="relative w-full md:w-2/3">
        <input
            wire:model="search" 
            type="search" 
            placeholder="Søg" 
            class="w-full px-4 py-2 pl-8 placeholder-gray-900 bg-white border-none rounded-xl"
        >
            <div class="absolute top-0 flex items-center h-full ml-2">
                <x-icon :name="search" />
            </div>
    </div> 
    <!-- end search field -->
    
</div> <!-- end filters wrapper -->