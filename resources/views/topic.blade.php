@extends('layout.post')
@section('navbar-name')
    {{ $topic->name }}
@endsection
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 pe-5">
                <div class="list-group">
                    <div class="list-group-item border-0 p-0">
                        @foreach ($posts as $post)
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex">
                                <a href="{{ url('/'.$post->slug) }}" class="m-auto">
                                    <img src="{{ asset('img/rect815.png')}}" alt="" class="img-fluid float-start fixed-size-img">
                                </a>
                            </div>
                            <div class="col-md-8 my-auto">
                                <a href="{{ url('/'.$post->slug) }}" class="text-decoration-none text-dark">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 fw-bold fs-2">{{ $post->title }}</h5>
                                        <a href="" class="text-dark my-auto"><i class="bi bi-bookmarks fs-5"></i></a>

                                    </div>
                                    <p class="mb-1">{{ $post->excerpt }}</p>
                                </a>
                                <div class="d-flex w-100 mt-2">
                                    <small class="my-auto text-muted">3 days ago</small>
                                    <i class="bi bi-dot text-muted mt-1"></i>
                                    <small class="text-muted my-auto">Oleh <a href="" class="text-decoration-none text-dark">Nama</a> dalam <a href="{{ url('/'.$post->topic->slug) }}" class="text-decoration-none text-dark">{{ $post->topic->name }}</a></small>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <h5>Temukan topik menarik untukmu</h5>
                        <div class="row row-cols-4">
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Programming</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Gaya Hidup</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Otomotif</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Pengembangan Diri</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Personal</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Desain</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Seni</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Olahraga</a>
                            <a href="" class="btn btn-light border border-2 w-auto me-1 mb-2">Science</a>

                        </div>
                    </div>
                    <div class="row border-top mt-3 pt-2">
                        <div class="col-sm-2">
                            <a href="" class="text-decoration-none text-muted">Tentang</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="" class="text-decoration-none text-muted">Bantuan</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="" class="text-decoration-none text-muted">Pengembangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection