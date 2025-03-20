<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BukSU Comelec: Admin Login</title>
        <x-dark-mode-initializer />
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-yellow-100 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                
                <div class="relative bg-white dark:bg-gray-800 shadow-lg sm:rounded-3xl p-20">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center justify-start rtl:justify-end mb-8">
                            <img src="{{asset('images/logo.jpg')}}" alt="logo" class="size-10 rounded-full">
                            <h1 class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-gray-900 dark:text-white ml-3">Admin Login</h1>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-2" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="divide-y divide-gray-200">
                                <div class="py-2 text-base leading-6 space-y-8 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="relative mt-4">
                                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                                            class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-purple-500" 
                                            placeholder="Email" />
                                        <label for="email" 
                                            class="absolute left-0 -top-5 text-gray-600 text-sm transition-all 
                                            peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 
                                            peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sm 
                                            peer-focus:text-purple-600">
                                            Email
                                        </label>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="relative mt-4">
                                        <input id="password" name="password" type="password" required autocomplete="current-password"
                                            class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-purple-500" 
                                            placeholder="Password" />
                                        <label for="password" 
                                            class="absolute left-0 -top-5 text-gray-600 text-sm transition-all 
                                            peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 
                                            peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sm 
                                            peer-focus:text-purple-600">
                                            Password
                                        </label>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="relative" style="margin-top: 1rem;">
                                        <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(Session::has('success'))
            <script>
                alert("{{ Session::get('success') }}");
            </script>
        @endif

        @if(Session::has('error'))
            <script>
                alert("{{ Session::get('error') }}");
            </script>
        @endif
    </body>
</html>
