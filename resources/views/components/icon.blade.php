@props(['name'])

@if ($name === 'sound' || $name === 'lyd')
    <svg
        viewBox="0 0 24 24"  
        fill="none" 
        stroke="currentColor"  
        stroke-width="2" 
        stroke-linecap="round"  
        stroke-linejoin="round"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    >  
        
        <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
        <circle cx="12" cy="14" r="4" />
        <line x1="12" y1="6" x2="12.01" y2="6" />
    </svg>
@endif

@if ($name === 'light' || $name === 'lys')
    <svg 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    >
        
        <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            stroke-width="2" 
            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
        /> 
    </svg>
@endif

@if ($name === 'scene')
    <svg 
        viewBox="0 0 24 24"  
        fill="none"  
        stroke="currentColor"  
        stroke-width="2"  
        stroke-linecap="round"  
        troke-linejoin="round"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    >  
    
        <polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2" />  
        <line x1="12" y1="22" x2="12" y2="15.5" />  
        <polyline points="22 8.5 12 15.5 2 8.5" /> 
        <polyline points="2 15.5 12 8.5 22 15.5" />  
        <line x1="12" y1="2" x2="12" y2="8.5" />
    </svg>
@endif


@if ($name === 'av')
    <svg
        viewBox="0 0 24 24"  
        fill="none" 
        stroke="currentColor" 
        stroke-width="2" 
        stroke-linecap="round" 
        stroke-linejoin="round"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    > 

        <polygon points="23 7 16 12 23 17 23 7" />  
        <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
    </svg>
@endif

@if ($name === 'crew')
    <svg  
        width="24" 
        height="24" 
        viewBox="0 0 24 24" 
        stroke-width="2" 
        stroke="currentColor"
        fill="none" 
        stroke-linecap="round"
        stroke-linejoin="round"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    >  

        <path stroke="none" d="M0 0h24v24H0z"/>  
        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
    </svg>
@endif

@if ($name === 'driver' || $name === 'chauffør')
    <svg   
        width="24" 
        height="24" 
        viewBox="0 0 24 24"
        stroke-width="2" 
        stroke="currentColor" 
        fill="none" 
        stroke-linecap="round"
        stroke-linejoin="round"
        {{ $attributes(['class' => 'h-8 w-8 text-white inline-block']) }}
    >
        <path stroke="none" d="M0 0h24v24H0z"/>  
        <circle cx="7" cy="17" r="2" />  
        <circle cx="17" cy="17" r="2" />  
        <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
    </svg>
@endif