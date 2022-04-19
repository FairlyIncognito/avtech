<div class="py-3 my-5 text-gray-100">
    @foreach ($categories as $category)
        <a href="#" class="px-3 text-left">
            <x-icon name="{{ Str::lower($category->name) }}" />
            <p class="inline-block mx-1">{{ $category->name }}</p>
        </a>
    @endforeach              
</div>