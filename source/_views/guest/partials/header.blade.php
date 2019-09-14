<style>
    .navbar .navbar-brand {
        font-size: 24px;
        margin-right: 40px;
    }

    .navbar .nav-item {
        font-size: 14px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#/" onclick="return $$.to('/');">
            <b>Deno Serverless</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/" onclick="return $$.to('/');">
                        <b>Home </b>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/resources">
                        <b>Resources </b>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <!-- END: Account -->
                <li class="nav-item ">
                    <a class="nav-link" href="/auth/login" onclick="return $$.to('auth/login');">
                        <b>Login</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>