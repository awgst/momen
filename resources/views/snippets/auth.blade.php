{{-- Register Toggle --}}
<div class="modal fade" id="registerToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-bg">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="registerModalLabel"></h5>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
        </div>
        <div class="modal-body pt-0">
          <div class="row d-flex flex-column">
                <div class="col text-center mb-5">
                  <h4>Bergabung dengan Momen.</h4>
                </div>
                <div class="col">
                    <div class="d-flex flex-column w-46 mx-auto align-items-center">
                        <a href="" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                            <img src="{{ asset('img/google.PNG') }}" class="colored-icon me-2">
                            <div>
                                Daftar pake Google
                            </div>
                        </a>
                        <a href="" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                            <img src="{{ asset('img/linkedin.PNG') }}" class="colored-icon me-2">
                            <div>
                                Daftar pake Linkedin
                            </div>
                        </a>
                        <a data-bs-toggle="modal" data-bs-dismiss="modal" href="#registerMailToggle" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                            <img src="{{ asset('img/mail.png') }}" class="colored-icon me-2">
                            <div>
                                Daftar pake Email
                            </div>
                        </a>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal-footer border-0">
            <div class="d-flex justify-content-center w-100">
                {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button> --}}
                <p class="mt-3">Sudah punya akun? <a data-bs-toggle="modal" href="#loginToggle" class="text-decoration-none fw-bold" role="button" data-bs-dismiss="modal">Masuk</a></p>
            </div>
        </div>
      </div>
    </div>
</div>
{{-- Register Using Mail Toggle --}}
<div class="modal fade" id="registerMailToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-bg">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="registerMailModalLabel"></h5>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
        </div>
        <div class="modal-body pt-0">
          <div class="row d-flex flex-column">
                <div class="col text-center mb-5">
                  <h4>Daftar pake email.</h4>
                </div>
                <div class="col">
                    <div class="d-flex flex-column w-50 mx-auto align-items-center">
                        <form action="{{ url('auth/store') }}" method="POST" id="registerByMailForm">
                            @csrf
                            <div class="mb-3" id="formName">
                              <label for="regInputName" class="form-label">Nama Lengkap</label>
                              <input type="text" class="form-control" id="regInputName" aria-describedby="emailHelp" required name="name">
                            </div>
                            <div class="mb-3" id="formEmail">
                                <label for="regInputEmail" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="regInputEmail" aria-describedby="emailHelp" required name="email">
                                <div id="emailHelp" class="form-text text-light fw-light">Momen tidak akan membagikan email kamu kepada siapapun.</div>
                            </div>
                            <div class="mb-3" id="formUsername">
                              <label for="regInputName" class="form-label">Username</label>
                              <input type="text" class="form-control" id="regInputUsername" required name="username">
                            </div>
                            <div class="mb-3" id="formPassword1">
                              <label for="regInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="regInputPassword1" required name="password">
                            </div>
                            <div class="mb-3 form-check" id="formCheck">
                              <input type="checkbox" class="form-check-input" id="regCheck1" name="checkbox">
                              <label class="form-check-label" for="regCheck1">Dengan mendaftar saya menyetujui <a href="" class="text-decoration-none fw-bold">syarat & ketentuan</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 disabled" id="btn-daftar" disabled>Daftar</button>
                        </form>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal-footer border-0">
            <div class="d-flex justify-content-center w-100">
                {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button> --}}
                <p class="mt-3">Sudah punya akun? <a data-bs-toggle="modal" href="#loginToggle" class="text-decoration-none fw-bold" role="button" data-bs-dismiss="modal">Masuk</a></p>
            </div>
        </div>
      </div>
    </div>
</div>
{{-- Login Using Mail Toggle --}}
<div class="modal fade" id="loginMailToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-bg">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="loginMailModalLabel"></h5>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
        </div>
        <div class="modal-body pt-0">
          <div class="row d-flex flex-column">
                <div class="col text-center mb-5">
                  <h4>Masuk pake email.</h4>
                </div>
                <div class="col">
                    <div class="d-flex flex-column w-50 mx-auto align-items-center">
                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                              <input type="email" class="form-control" id="loginInputEmail1" aria-describedby="emailHelp" required name="email">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="loginInputPassword1" required name="password">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="loginCheck1">
                              <label class="form-check-label" for="loginCheck1">Ingat Saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="btn-login">Masuk</button>
                        </form>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal-footer border-0">
            <div class="d-flex justify-content-center w-100">
                {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button> --}}
                <p class="mt-3">Belum punya akun? <a data-bs-toggle="modal" href="#registerToggle" class="text-decoration-none fw-bold" role="button" data-bs-dismiss="modal">Daftar</a></p>
            </div>
        </div>
      </div>
    </div>
</div>
{{-- Login Toggle --}}
<div class="modal fade" id="loginToggle" aria-hidden="true" aria-labelledby="loginModalToggle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-bg">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="registerModalLabel"></h5>
              <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
            </div>
            <div class="modal-body pt-0">
                <div class="row d-flex flex-column">
                    <div class="col text-center mb-5">
                      <h4>Masuk ke Momen.</h4>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column w-46 mx-auto align-items-center">
                            <a href="" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                                <img src="{{ asset('img/google.PNG') }}" class="colored-icon me-2">
                                <div>
                                    Masuk pake Google
                                </div>
                            </a>
                            <a href="" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                                <img src="{{ asset('img/linkedin.PNG') }}" class="colored-icon me-2">
                                <div>
                                    Masuk pake Linkedin
                                </div>
                            </a>
                            <a data-bs-toggle="modal" data-bs-dismiss="modal" href="#loginMailToggle" class="btn btn-light rounded-pill mb-2 w-100 d-flex align-items-center">
                                <img src="{{ asset('img/mail.png') }}" class="colored-icon me-2">
                                <div>
                                    Masuk pake Email
                                </div>
                            </a>
                        </div>
                    </div>
              </div>
            </div>
            <div class="modal-footer border-0">
                <div class="d-flex justify-content-center w-100">
                    {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button> --}}
                    <p class="mt-3">Belum punya akun? <a data-bs-toggle="modal" href="#registerToggle" class="text-decoration-none fw-bold" role="button" data-bs-dismiss="modal">Daftar</a></p>
                </div>
            </div>
          </div>
    </div>
</div>
