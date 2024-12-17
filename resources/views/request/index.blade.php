<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('МашинаПомытия') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-nav-link :href="route('request.create')" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center mb-11">Создать</x-nav-link>
                @foreach($requests as $request)
                    <div class="p-8 flex flex-col gap-8">
                        <p class="text-red-600 font-bold text-base">
                            {{\Carbon\Carbon::parse($request->created_at)->translatedFormat('j F Y')}}
                        </p>
                        <div class='flex justify-between gap-x-2'>
                            <p class="font-bold text-base">
                                {{\Carbon\Carbon::parse($request->date)->translatedFormat('j F Y')}}
                            </p>
                            <p class="font-bold text-base">{{ $request->number }}</p>
                            <p class="w-full max-w-3xl font-normal text-base">{{ $request->user->name }}</p>
                            <p class="w-full max-w-32 font-bold text-base">{{ $request->status->name }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>