<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coins') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6 col-md-4">
            <div class="bg-white ">
                <div class="p-1 bg-white border-b border-gray-200">
                    left sidebar
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-8">
            <div class="bg-white ">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach(\App\Models\Coin::all() as $coin)
                        {{view('coins.coin',['coin'=>$coin])}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
