<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>
    <!-- Font awesome -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link id="switcher" href="{{ url('css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- Main style sheet -->
    <link href="{{ url('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/slick.css') }}" rel="stylesheet">
    <link href="{{ url('css/nouislider.css') }}" rel="stylesheet">
    <link href="{{ url('css/jquery.simpleLens.css') }}" rel="stylesheet">
    <link href="{{ url('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script import 'alpinejs'>

    </script>
</head>
<!-- wpf loader Two -->
<div id="wpf-loader-two">
    <div class="wpf-loader-two-inner">
        <span>Loading</span>
    </div>
</div>
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->
<!-- include top nav bar -->
@include('layouts.front-layout.top_navbar')
<!-- nav bar that contain the links-->
@include('layouts.front-layout.menu')
<!-- include  Slide Show  -->
@include('layouts.front-layout.slide_show')

<!--The Content yield here  -->

@include('Front-End.pages.Products')

<!-- include Footer -->
@include('layouts.front-layout.Footer')

<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login or Register</h4>
                <form class="aa-login-form" action="">
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" placeholder="Username or email">
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password">
                    <button class="aa-browse-btn" type="submit">Login</button>
                    <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me
                    </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                    <div class="aa-register-now">
                        Don't have an account?<a href="account.html">Register now!</a>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('js/bootstrap.js') }}"></script>
<!-- SmartMenus jQuery plugin -->
<!-- SmartMenus jQuery Bootstrap Addon -->
<!-- To Slider JS -->
<script src="{{ url('js/sequence.js') }}"></script>
<script src="{{ url('js/sequence-theme.modern-slide-in.js') }}"></script>
<script src="{{ url('js/jquery.smartmenus.js') }}"></script>
<script src="{{ url('js/jquery.smartmenus.bootstrap.js') }}"></script>
<!-- Product view slider -->
<script type="text/javascript" src="{{ url('js/jquery.simpleGallery.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.simpleLens.js') }}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{ url('js/slick.js') }}"></script>
<script type="text/javascript" src="{{ url('js/nouislider.js') }}"></script>
<!-- Price picker slider -->
<!-- Custom js -->
<script src="{{ url('js/custom.js') }}"></script>

</body>

</html>
