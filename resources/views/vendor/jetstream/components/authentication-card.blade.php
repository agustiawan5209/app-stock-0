<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center bg-cover bg-center" style="background-image: url({{asset('img/login.jpg')}})">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div
            class="absolute inset-0 bg-gradient-to-r from-orange-300 to-ungumuda shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div>
                    <h1 class="text-2xl font-semibold text-center">{{ $title }}</h1>
                </div>
            </div>
            <div class="divide-y divide-gray-200">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
