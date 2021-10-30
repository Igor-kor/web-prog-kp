@extends('layouts.app')
@section('content')
    <div class="row" >
        <div class="col-6 col-sm-2 m-auto">
            <div class="bg-white ">
                <div class="p-1 bg-white border-b border-gray-200">
                    left sidebar
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-8">
            <div class="bg-white ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="app"><coin-list></coin-list></div>
                </div>
            </div>
        </div>
    </div>
@endsection
