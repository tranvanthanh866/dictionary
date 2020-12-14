<x-guest-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <header>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <form action="">
                <div style="display: flex">
                    <x-jet-input id="q" class="block mt-1 flex-1" type="text" name="q" :value="old('q')" required autofocus autocomplete="off" />
                    <x-jet-button class="ml-2">
                        find
                    </x-jet-button>
                </div>
            </form>
        </div>
    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-guest-layout>
