@extends('layouts.app')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    id: {{$user->id}} <br>
                    ФИО: {{$user->name}} <br>
                    Контактные данные:<br>
                    email:<a href="mailto:{{$user->email}}">{{$user->email}} </a> <br>
<!--                    --><?php //var_dump($user); ?>
                </div>
            </div>
        </div>
    </div>
@endsection

