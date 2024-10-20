<header {{ $attributes->class(['heading md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0']) }}>
    <div class="mr-4 mt-1">{{ $account->name }}</div>
    <button type="button"
            class="mt-1">
        <div class="group flex items-center cursor-pointer select-none">
            <div class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap"><span>{{ $user->first_name }}</span><span class="hidden md:inline">&nbsp;{{ $user->last_name }}</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20"
                 class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
            </svg>
        </div>
    </button>
</header>
