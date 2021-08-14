@extends('layout.post')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="d-flex flex-column max-700">
            <h2>{{ $post->title }}</h2>
            <h3 class="text-muted mb-4">{{ $post->excerpt }}</h3>
            <img src="{{ asset('img/rect815.png')}}" alt="" class="img-fluid">
            <div class="post-body mt-5 fs-5">
                {!! $post->body !!}
            </div>
            <div class="footer-post w-100 d-flex justify-content-between">
                <div class="d-flex w-auto my-auto">
                    <small class="text-muted my-auto">Oleh <a href="" class="text-decoration-none text-dark">Nama</a> dalam <a href="" class="text-decoration-none text-dark">Topik</a></small>
                    <i class="bi bi-dot text-muted mt-1"></i>
                    <small class="my-auto text-muted">3 days ago</small>
                </div>
                <a href="" class="text-dark my-auto"><i class="bi bi-bookmarks fs-5"></i></a>
            </div>
            <div class="writer my-5">
                <h3>Tentang Penulis</h3>
                <div class="row border rounded-3 mt-3 mx-1">
                    <div class="col-md-4 p-0">
                        <img src="{{ asset('img/rect815.png') }}" alt="" class="img-fluid h-100" style="border-radius: .3rem 0 0 .3rem">
                    </div>
                    <div class="col-md-8 my-auto p-3">
                        <h4>Username</h4>
                        <p class="text-muted fs-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia impedit vel cupiditate quo optio libero maxime consequuntur nostrum velit dolorem.</p>
                        <button class="btn btn-primary text-light rounded-pill px-4">Ikuti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
