<div class="relative md:hidden" x-data="{ isOpen: false }">
    <button type="button" @click.prevent="isOpen = !isOpen" class="outline-none transition duration-150 ease-in">
        <svg class="w-5" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z" fill="#09121F" />
        </svg>
    </button>

    <div x-cloak x-show="isOpen" x-transition.origin.top.right @click.away="isOpen = false"
        class="absolute bg-white border font-semibold px-1.5 py-2 right-0 rounded-xl text-left z-20">
        <ul class="space-y-2">
            <li class="font-bold">
                {{ auth()->user()->username }}
            </li>
            <li>
                <form action="logout" method="POST" class="">
                    @csrf
                    <button type="submit"
                        class="">{{ __('messages.log_out') }}</button>
                </form>
            </li>
        </ul>
    </div>
</div>
