<div class="mt-8">
    <div class="flex flex-col space-y-3 filters md:flex-row md:space-y-0 md:space-x-6">
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
        
        <div class="relative w-full md:w-2/3">
            
            <input
                wire:model="search" 
                type="search" 
                placeholder="Søg" 
                class="w-full px-4 py-2 pl-8 placeholder-gray-900 bg-white border-none rounded-xl">
            
                <div class="absolute top-0 flex h-full ml-2 itmes-center">
                    <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
        </div>
    </div> <!-- end filters -->

    <div class="my-8 space-y-6 ideas-container">

        @forelse($ideas as $idea)
            <livewire:idea-index
                :key="$idea->id"
                :idea="$idea"
            />   
        @empty
            <div class="mx-auto mt-12 w-70">
                <div class="mt-6 font-bold text-center text-gray-400">
                    {{ __('Your search found no results... \n Try searching for something else.') }}
                </div>
            </div>
        @endforelse

    </div> <!-- end ideas-container -->

    <!-- Laravel simplePagination links -->
    <div class="my-8">
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>