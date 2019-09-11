@extends('_views.guest.layout',['title'=>'Restore password'])

@section('body')
<!-- START: Content -->
<div class="container">
    <br />
    <br />

    <div class="row">
        <div class="col-sm-12 col-md-6" style="margin:0 auto;">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" data-i18n="Auth.Password.HeadingForgottenPassword">
                        Forgotten Password
                    </h3>
                </div>
                <div id="formPasswordRestore" class="card-body">
                    <!-- START: Message Area -->
                    <div class="alert-area" style="display:none;"></div>
                    <!-- END: Message Area -->

                    <!-- START: Email -->
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="Email" type="text"
                            data-i18n="Auth.PasswordRestore.InputEmail" />
                    </div>

                    <!-- START: First Name -->
                    <div class="form-group">
                        <input class="form-control" placeholder="First Name" name="FirstName" type="text" value=""
                            data-i18n="Auth.RestorePassword.InputFirstName">
                    </div>
                    <!-- END: First Name -->

                    <!-- START: Last Name -->
                    <div class="form-group">
                        <input class="form-control" placeholder="Last Name" name="LastName" type="text" value=""
                            data-i18n="Auth.RestorePassword.InputLastName">
                    </div>
                    <!-- END: Last Name -->

                    <input type="hidden" name="sid" value="" />

                    <button class="btn btn-lg btn-success btn-block" onclick="return formPasswordRestoreProcess();">
                        <img data-icon="ionicons ios-checkmark-circle" style="width:32px;color:white;" />
                        <span data-i18n="Auth.PasswordRestore.ButtonRestorePassword">
                            Send Password
                        </span>
                    </button>

                    <div style="margin-top:30px;">
                        <button onclick="$$.to('auth/login');" class="btn btn-info float-left">
                            <img data-icon="ionicons ios-key" style="width:22px;color:white;" />
                            <span>
                                Login
                            </span>
                        </button>
                        <button onclick="$$.to('auth/register');" class="btn btn-warning float-right">
                            <img data-icon="ionicons ios-book" style="width:22px;height:22px;color:white;" />
                            <span>
                                Register
                            </span>
                        </button>
                    </div>
                    <!-- END: Actions -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

<script>
    function formPasswordRestoreProcess() {
        var email = $.trim($('input[name=Email]').val());
        var firstName = $.trim($('input[name=FirstName]').val());
        var lastName = $.trim($('input[name=LastName]').val());

        if (email === '') {
            return formPasswordRestoreShowErrorMessage('Email is required');
        }

        if (firstName === '') {
            return formPasswordRestoreShowErrorMessage('First Name is required');
        }

        if (lastName === '') {
            return formPasswordRestoreShowErrorMessage('Last Name is required');
        }

        var data = { "Email": email, "FirstName": firstName, "LastName": lastName };
        var cmd = $$.ws("auth/password-restore", data);

        cmd.done(function (response) {
            if (response.status !== "success") {
                return formPasswordRestoreShowErrorMessage(response.message);
            }

            formPasswordRestoreShowSuccessMessage(response.message);
            $('div.alert-danger').html('').hide();
            setTimeout(function () {
                $$.to('auth/login.html');
            }, 4000);
            return;
        });

        cmd.fail(function (error) {
            return formPasswordRestoreShowErrorMessage('There was an error. Try again later!');
        });
    }

    function formPasswordRestoreShowErrorMessage(message) {
        $('#formPasswordRestore .alert-area').html('').hide();
        var error = '<div class="alert alert-danger">' + message + '</div>';
        $('#formPasswordRestore .alert-area').html(error).show();
        setTimeout(function () {
            $('#formPasswordRestore .alert-area').html('').hide();
        }, 3000);
        return false;
    }

    function formPasswordRestoreShowSuccessMessage(message) {
        $('#formPasswordRestore .alert-area').html('').hide();
        var success = '<div class="alert alert-success">' + message + '</div>';
        $('#formPasswordRestore .alert-area').html(success).show();
        setTimeout(function () {
            $('#formPasswordRestore .alert-area').html('').hide();
        }, 3000);
        return false;
    }
</script>
<!-- END: Scripts -->
@stop