$(document).ready(function () {
    // Call register
    function myAjax(param) {
        $.ajax({
            type: "POST",
            url: "/auth/validate",
            data: $('#registerByMailForm').serialize(),
            dataType: "json",
            success: function (response, status) {
                validate(response, response.status);
                console.log(response);
            },
            error: function(xhr, status, error){
                switch (param) {
                    case 'name':
                        validate(xhr.responseJSON.errors.name, status, param);
                        break;
                    case 'email':
                        validate(xhr.responseJSON.errors.email, status, param);
                        break;
                    case 'username':
                        validate(xhr.responseJSON.errors.username, status, param);
                        break;
                    case 'password':
                        validate(xhr.responseJSON.errors.password, status, param);
                        break;
                    case 'check':
                        validate(xhr.responseJSON.errors.password, status, param);
                        break;
                }
            }
        });
    }
    $('#regInputName').blur(function (e) {
        e.preventDefault();
        myAjax('name');
    });
    $('#regInputEmail').blur(function (e) {
        e.preventDefault();
        myAjax('email');
    });
    $('#regInputUsername').blur(function (e) {
        e.preventDefault();
        myAjax('username');
    });
    $('#regInputPassword1').blur(function (e) {
        e.preventDefault();
        myAjax('password');
    });
    $('#regCheck1').change(function (e) {
        e.preventDefault();
        myAjax('check');
    });

    function validate(param, status, input) {
        if (status===200) {
            $('#btn-daftar').prop('disabled', false);
            $('#btn-daftar').removeClass('disabled');
        }
        else{
            switch (input) {
                case 'name':
                    if(param){
                        $('#regInputName').addClass('is-invalid');
                        $('#regInputName').removeClass('is-valid');
                    }
                    else{
                        $('#regInputName').removeClass('is-invalid');
                        $('#regInputName').addClass('is-valid');
                    }
                    break;
                case 'email':
                    if(param){
                        $('#regInputEmail').addClass('is-invalid');
                        $('#regInputEmail').removeClass('is-valid');
                    }
                    else{
                        $('#regInputEmail').removeClass('is-invalid');
                        $('#regInputEmail').addClass('is-valid');
                    }
                    break;
                case 'username':
                    if(param){
                        $('#regInputUsername').addClass('is-invalid');
                        $('#regInputUsername').removeClass('is-valid');
                    }
                    else{
                        $('#regInputUsername').removeClass('is-invalid');
                        $('#regInputUsername').addClass('is-valid');
                    }
                    break;
                case 'password':
                    if(param){
                        $('#regInputPassword1').addClass('is-invalid');
                        $('#regInputPassword1').removeClass('is-valid');
                    }
                    else{
                        $('#regInputPassword1').removeClass('is-invalid');
                        $('#regInputPassword1').addClass('is-valid');
                    }
                    break;
            }
        }
    }
});
