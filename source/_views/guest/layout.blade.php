<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title??'Undefined' }} : Deno Serverless</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- START: Styles -->
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" rel="stylesheet" />
    <link href="/shared/css/main.css" rel="stylesheet" />
    <!-- END: Styles -->

    @stack('styles')
</head>

<body>
    <!-- START: Page Wrapper -->
    <table class="Layout" cellspacing="0" cellpadding="0" style="width:100%;height:100%;">
        <!-- START: Header -->
        <tr>
            <td class="Header" align="center" valign="middle" style="height:1px;">
                <style>
                    .navbar .navbar-brand {
                        font-size: 24px;
                        margin-right: 40px;
                    }

                    .navbar .nav-item {
                        font-size: 14px;
                    }
                </style>
                @include('_views/guest/partials/header')
            </td>
        </tr>
        <!-- END: Header -->

        <!-- START: Content-->
        <tr>
            <td class="Content" align="left" valign="top" style="">
                <!-- START: Main Content -->
                @yield('body')
                <!-- END: Main Content -->
            </td>
        </tr>
        <!-- END: Content -->

        <!-- START: Footer -->
        <tr>
            <td class="Footer" align="center" valign="middle" style="height:80px;">

            </td>
        </tr>
        <!-- END: Footer -->
    </table>
    <!-- END: Page Wrapper -->

    <!-- START: Scripts -->
    <script src="/shared/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@8"> </script>
    <script src="https://cdn.jsdelivr.net/gh/lesichkovm/web@2.0.0/initialize.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/lesichkovm/cell@1.5.0/cell.js"></script> -->
    <script src="https://cdn.jsdelivr.net/gh/lesichkovm/webicons@v1.4.0/webicons.ionicons.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/lesichkovm/webicons@v1.4.0/webicons.fontawesome.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/lesichkovm/webicons@v1.4.0/webicons.typicons.js"></script> -->
    <script src="https://cdn.jsdelivr.net/gh/lesichkovm/webicons@v1.4.0/webicons.runtime.js"></script>
    <!-- END: Scripts -->

    <script>
        $(function() {
            if ($$.getUser() !== null) {
                $$.to('user/home.html');
            }
        });
        $(function() {
            setTimeout(function() {
                $('#alert-area').hide();
            }, 15000);
        });
    </script>

    @stack('scripts')

    <!-- START: StatCounter -->
    @include('_views/shared/statcounter')
    <!-- END: StatCounter -->
</body>

</html>