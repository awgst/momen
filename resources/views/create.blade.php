@extends('layout.post')
@section('navbar-name', 'Momen')
@section('navbar-link', '/')
@section('content')
    <div class="container my-5 newPost">
        <div class="row ps-5 ms-5">

            <div class="toolbar d-flex flex-column w-auto position-fixed">
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Header" data-command="h1"><i class="bi bi-type-h1"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Header" data-command="h2"><i class="bi bi-type-h2"></i></a>
                <a class="btn btn-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Paragraf" data-command="p" id="paragraph"><i class="bi bi-paragraph"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Tebal" data-command="bold"><i class="bi bi-type-bold"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Miring" data-command="italic"><i class="bi bi-type-italic"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Garis Bawah" data-command="underline"><i class="bi bi-type-underline"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Rata Kiri" data-command="justifyleft"><i class="bi bi-text-left"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Rata Tengah" data-command="justifycenter"><i class="bi bi-text-center"></i></a>
                <a class="btn btn-outline-secondary border-radius-5 mb-2" data-toggle="tooltip" title="Rata Kanan" data-command="justifyright"><i class="bi bi-text-right"></i></a>
            </div>
            <div class="col px-5 me-5 ms-3">
                <div class="alert alert-success d-none" role="alert">
                    Disimpan  kedalam draft.
                </div>
                <div class="alert alert-danger d-none" role="alert">
                    Gagal menyimpan, silahkan coba lagi.
                </div>
                <form action="{{ url('post/store') }}" method="POST" id="form-1">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="d-flex w-100 flex-row-reverse mt-3">
                        <button class="btn btn-success ms-2">Publikasikan</button>
                        <button class="btn btn-outline-secondary w-auto h-auto" id="btn-simpan"><span id="btn-simpan-text">Simpan</span><img src="{{ asset('img/loading-save.gif') }}" alt="" class="img-fluid d-none" style="max-height: 25px!important" id="saveLoadingImg"></button>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control border-0 fw-bold fs-3" id="floatingTitle" placeholder="Judul" name="title">
                        <label for="floatingTitle">Buat judul yang bagus..</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control border-0 text-muted fw-bold" id="floatingExcerpt" placeholder="Tuliskan sinopsis singkat ceritamu disini..." name="excerpt">
                        <label for="floatingExcerpt">Tulis sinopsis singkat</label>
                    </div>
                    <div class="form-floating mb-2">
                        <div id='editor' class="editorAria form-control border-0 pb-2" style="height: 100px; overflow: hidden; resize: none;" name="body" contenteditable>
                        </div>
                        <label for="editor">Tulis ceritamu disini</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script type="text/javascript">
    $('#editor').on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(document).ready(function(){
        $("#editor").on('focus', function() {
            $('#paragraph').click();
            $('#paragraph').remove('id');
        });
        const editor = $('.editor');
        $('.toolbar a').click(function(e) {
            $('.toolbar a').removeClass('btn-secondary');
            $('.toolbar a').addClass('btn-outline-secondary');
            $(this).addClass('btn-secondary');
            $(this).removeClass('btn-outline-secondary');
            e.preventDefault();
            const command = $(this).data('command');
            if (command==='h1' || command === 'h2' || command === 'p') {
                document.execCommand('formatBlock', false, command);
            }
        });
        $('#btn-simpan').on('click', function (e) {
            e.preventDefault();
            $('#btn-simpan').prop('disabled', true);
            $('#btn-simpan-text').addClass('d-none');
            $('#saveLoadingImg').removeClass('d-none');
            $.ajax({
                type: "POST",
                url: "/post/store",
                data: {
                    _token:$('input[name="_token"]').val(),
                    title:$('#floatingTitle').val(),
                    excerpt:$('#floatingExcerpt').val(),
                    body: $('#editor').html(),
                    id: $('input[name="id"]').val()
                },
                dataType: "json",
                success: function (response) {
                    $('.alert-success').removeClass('d-none');
                    $('.alert-danger').addClass('d-none');
                    $('#btn-simpan').prop('disabled', false);
                    $('#btn-simpan-text').removeClass('d-none');
                    $('#saveLoadingImg').addClass('d-none');
                    $('input[name="id"]').val(response.id);
                    console.log(response.id);
                },
                error: function (xhr) {
                    $('#btn-simpan').prop('disabled', false);
                    $('#btn-simpan-text').removeClass('d-none');
                    $('#saveLoadingImg').addClass('d-none');
                    $('.alert-success').addClass('d-none');
                    $('.alert-danger').removeClass('d-none');
                    console.log(xhr);
                }
            });

        });
    });

    </script>
@endsection
