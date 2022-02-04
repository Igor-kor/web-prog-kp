@extends('layouts.app')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

{{--                    @foreach($coins as $coin)--}}
{{--                    <coin-page v-bind:id='{{$coin->id}}'></coin-page>--}}
                    <coin-user-block
                        v-for="coin in {{$coins}}"
                        v-bind:data="coin"
                        v-bind:key="coin.id"
                    ></coin-user-block>
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
@endsection

