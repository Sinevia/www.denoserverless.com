@extends('_views.guest.layout',['title'=>'Login'])

@section('body')
<!-- START: Content -->
<div class="container">
    <br />
    <br />

    <div class="row">
        <div class="col-sm-12 col-md-8" style="margin:0 auto;">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" data-i18n="Auth.Login.HeadingSignIn">
                        Please sign in
                    </h3>
                </div>
                <div class="card-body form_login">
                    <!-- START: Message Area -->
                    <div class="form-group">
                        <div class="alert alert-success" style="display:none;">
                            <a class="close" data-dismiss='alert'>×</a>
                            <strong>Success</strong>
                            <span class="successMessage">&nbsp;</span>
                        </div>
                        <div class="alert alert-danger" style="display:none;">
                            <a class="close" data-dismiss='alert'>×</a>
                            <strong>Error</strong>
                            <span class="errorMessage">&nbsp;</span>
                        </div>
                    </div>
                    <!-- END: Message Area -->

                    <!-- START: Email -->
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="text" data-i18n="Auth.Login.InputEmail" />
                    </div>

                    <!-- START: Password -->
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="" data-i18n="Auth.Login.InputPassword">
                    </div>
                    <!-- END: Password -->

                    <!-- START: Remember Me -->
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">
                            <span data-i18n="Auth.Login.LabelRememberMe">Remember Me</span>
                        </label>
                    </div>
                    <!-- END: Remember Me -->

                    <input type="hidden" name="sid" value="" />

                    <!-- START: Login -->
                    <button onclick="loginFormValidate();" class="buttonLogin btn btn-lg btn-success btn-block">
                        <img data-icon="ionicons ios-checkmark-circle" style="width:32px;color:white;" />
                        <span>Login</span>
                        <i class="imgLoading" class="fas fa-spinner fa-spin" style="display:none;"></i>
                    </button>
                    <!-- END: Login -->

                    <!-- START: Actions -->
                    <div style="margin-top:30px;">
                        <button class="btn btn-info float-left" onclick="$$.to('auth/register');">
                            <img data-icon="ionicons ios-book" style="width:22px;height:22px;color:white;" />
                            <span data-i18n="Auth.Login.ButtonRegister">
                                Register
                            </span>
                        </button>
                        <button class="btn btn-warning float-right" onclick="$$.to('auth/password-restore');">
                            <img data-icon="ionicons ios-mail" style="width:22px;height:22px;color:white;" />
                            <span data-i18n="Auth.Login.ButtonForgottenPasssword">
                                Forgotten Password
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
@endsection

@push('scripts')
<script>
    /**
     * Validate Login Form
     * @returns {Boolean}
     */
    function loginFormValidate() {
        var email = $.trim($('input[name=email]').val());
        var password = $.trim($('input[name=password]').val());

        if (email === '') {
            return loginFormRaiseError('Email is required');
        }

        if (password === '') {
            return loginFormRaiseError('Password is required');
        }

        $('.buttonLogin .imgLoading').show();

        var data = {
            "email": email,
            "password": password
        };
        var p = $$.ws('auth/login', data);

        p.done(function(response) {
            $('.buttonLogin .imgLoading').hide();

            if (response.status !== "success") {
                return loginFormRaiseError(response.message);
            }

            $$.setToken(response.data.token);
            $$.setUser(response.data.user);
            loginFormRaiseSuccess('Success');
            $('div.alert-danger').html('').hide();
            setTimeout(function() {
                $$.to('user/home.html');
            }, 2000);
            return;
        });

        p.fail(function(error) {
            $('.buttonLogin .imgLoading').hide();
            return loginFormRaiseError('There was an error. Try again later!');
        });
    }
    $(function() {
        $("#email").focus();
    });
</script>
@endpush