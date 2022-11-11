<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            Login
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email input -->
            <div class="mb-6">
                <input type="email" name="email" class="input focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlInput2" placeholder="Email address" />
            </div>

            <!-- Password input -->
            <div class="mb-6">
                <input type="password" name="password" class="input focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlInput2" placeholder="Password" />
            </div>

            {{-- <div class="flex justify-between items-center mb-6">
            <div class="form-group form-check">
                <input type="checkbox"
                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    id="exampleCheck2" />
                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                    me</label>
            </div>
            <a href="#!" class="text-gray-800">Forgot password?</a>
        </div> --}}

            <div class="text-center lg:text-left">
                <button type="submit" class="btn bg-ungumuda">
                    Login
                </button>
                <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                    Don't have an account?
                    <a href="#!"
                        class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Register</a>
                </p>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
