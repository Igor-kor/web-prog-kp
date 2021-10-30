<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="coin-page">
                            <img src="{{asset('/img/dogecoin-logo.jpg')}}" alt="coin">
                            <p>Год {{$coin->Year}}</p>
                            <p>Страна {{$coin->Country}}</p>
                            <p>Сохранность {{$coin->Safety}}</p>
                            <p>Номинал {{$coin->Denomination}}</p>
                            <p>Тип монеты {{$coin->Coin_type}}</p>
                            <p>Материал {{$coin->Material}}</p>
                            <p>Диаметр {{$coin->Diameter}}</p>
                            <p>Вес монеты {{$coin->Coin_weight}}</p>
                            <p>Тираж {{$coin->Circulation}}</p>
                            <p>Гурт {{$coin->Edge}}</p>
                            <p>Особенности {{$coin->Features}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

