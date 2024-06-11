<x-guest-layout>
    
    <div class="container mx-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-md">
                <form method="POST" action="{{ route('unlock') }}">
                    @csrf
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Enter your password"
                            >
                            @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Unlock
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //prevent back navigation
        window.onbeforeunload= function(){
            window.setTimeout(function(){
                window.location = 'lockscreen';
            }, 0);
            window.onbeforeunload = null; //to prevent infinite loop
        };
        
    
    
    </script>
</x-guest-layout>

