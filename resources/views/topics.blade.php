@extends('layout.post')
@section('navbar-name', 'Topik')
@section('content')
    <div class="container mt-5">
        <h1 class="border-bottom mx-5 ps-2 pb-3">Temukan topik menarik untukmu</h1>
        <div class="row mt-3 mx-5 row-cols-3">
            @foreach ($topics as $topic)
                <div class="col mb-4" style="width: 376px; height: 192px;">
                    <a href="{{ url('topic/'.$topic->slug) }}">
                        <p class="position-absolute ms-2 mt-2 text-light px-2 rounded-pill py-1" style="background-color: rgba(0, 0, 0, 0.65)">{{ $topic->name }}</p>
                        <img src="{{ asset('img/rect815.png') }}" alt="" class="w-100 h-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('custom-script')
@endsection
