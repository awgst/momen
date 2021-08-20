@extends('layout.post')
@section('navbar-name', 'Momen')
@section('navbar-link', '/')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 pe-5" id="body-setting">
                <form action="{{ url('user/'.$user->id) }}" class="px-5 mx-5" id="form-1" method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="fw-bold pb-2 border-1 border-bottom" id="setting">Personal</h3>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nameFormfloating" placeholder="Nama Kamu..." value="{{ $user->name }}">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="emailFormfloating" placeholder="name@example.com" value="{{ $user->email }}">
                        <label for="floatingInput">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usernameFormfloating" placeholder="Username Kamu..." value="{{ $user->email }}">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="d-flex w-100">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mb-5">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <h4 class="border-bottom border-1 pb-2">Pengaturan</h4>
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <a href="#" class="fs-5 text-secondary text-decoration-none setting-item">Personal</a>
                                <a href="#" class="fs-5 text-secondary text-decoration-none setting-item">Reset Password</a>
                                <a href="#" class="fs-5 text-secondary text-decoration-none setting-item">Pengembangan</a>
                                <a href="#" class="fs-5 text-secondary text-decoration-none setting-item">Akun</a>
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
    </div>
@endsection
@section('custom-script')
    <script>
        $(document).ready(function () {
            $('.setting-item').on('click', function () {
                if($('#form-2').html()){
                    $('#form-2').remove();
                }
                if($(this).html()==='Personal'){
                    $('#form-1').html(`
                    @csrf
                    @method('PUT')
                    <h3 class="fw-bold pb-2 border-1 border-bottom" id="setting">Personal</h3>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Nama Kamu..." value="{{ $user->name }}">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $user->email }}">
                        <label for="floatingInput">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Username Kamu..." value="{{ $user->email }}">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="d-flex w-100">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>`);
                    $('#form-1').attr('action', `{{ url('user/'.$user->id) }}`);
                }
                if($(this).html()==='Reset Password'){
                    $('#form-1').html(`
                    @csrf
                    <h3 class="fw-bold pb-2 border-1 border-bottom" id="setting">Personal</h3>
                    <div class="d-flex w-100 flex-column">
                        <p class="p-0">Kami akan mengirimkan link untuk mereset password kamu ke <span class="fw-bold">{{ $user->email }}</span>. Silahkan periksa email kamu.</p>
                        <button type="submit" class="btn btn-primary mx-auto">Kirim</button>
                    </div>`);
                    $('#form-1').attr('action', `#`);
                }
                if($(this).html()==='Pengembangan'){
                    $('#form-1').html(`
                    @csrf
                    <h3 class="fw-bold pb-2 border-1 border-bottom" id="setting">Personal</h3>
                    <div class="d-flex w-100 flex-column">
                        <p class="p-0">Untuk menggunakan mode pengembangan kamu harus merequest token terlebih dahulu sebelum dapat menggunakannya dalam aplikasi yang kamu kembangkan. Untuk info lebih lanjut silahkan kunjungi pusat bantuan.</p>
                        <button type="submit" class="btn btn-primary mx-auto">Minta Token</button>
                    </div>`);
                    $('#form-1').attr('action', `#`);
                }
                if($(this).html()==="Akun"){
                    $('#form-1').html(`
                    @csrf
                    @method('DELETE')
                    <h3 class="fw-bold pb-2 border-1 border-bottom" id="setting">Personal</h3>
                    <div class="row row-cols-2">
                        <div class="col my-auto" style="width: 70%;">
                            <p class="p-0 m-0">Menonaktifkan akun akan membuat akun anda tidak aktif sementara waktu sampai kamu mengaktifkannya kembali. Seluruh data yang kamu miliki tidak akan terhapus.</p>
                        </div>
                        <div class="col m-auto" style="width: 30%;">
                            <button type="submit" class="btn btn-secondary m-auto">Nonaktifkan Akun</button>
                        </div>
                    </div>
                    `);
                    $('#form-1').attr('action', `#`);
                    $('#body-setting').append(`
                    <form action="#" class="px-5 mx-5 mt-3" id="form-2"  method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row row-cols-2">
                            <div class="col my-auto" style="width: 70%;">
                                <p class="p-0 m-0">Menghapus akun akan membuat akun anda terhapus secara permanen dan semua data personal kamu serta seluruh cerita yang kamu punya akan terhapus secara permanen dan tidak dapat dikembalikan.</p>
                            </div>
                            <div class="col m-auto" style="width: 30%;">
                                <button type="submit" class="btn btn-danger m-auto">Hapus Akun</button>
                            </div>
                        </div>
                    </form>
                    `);
                }
                $('#setting').html($(this).html());
            });
        });
    </script>
@endsection
