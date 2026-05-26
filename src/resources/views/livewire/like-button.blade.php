<div>
    <button wire:click="increment" 
            class="flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold shadow-sm transition duration-200 border
                   {{ $hasLiked ? 'bg-red-50 border-red-200 text-maroon hover:bg-red-100' : 'bg-white border-gray-200 hover:border-gray-300 text-gray-700 hover:bg-gray-50' }}">
        
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-5 w-5 {{ $hasLiked ? 'text-maroon fill-current scale-110' : 'text-gray-400' }} transition-all" 
             viewBox="0 0 20 20" 
             fill="currentColor">
            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
        </svg>
        
        <span>{{ $likes }} {{ $hasLiked ? 'Disukai' : 'Suka Portfolio' }}</span>
    </button>
</div>
