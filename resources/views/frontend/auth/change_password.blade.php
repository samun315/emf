<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="Idea Ago Mart">
    <meta name="title" content="Idea Ago Mart - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Idea Ago Mart - Change Password</title>

    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/venobox/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slickslider/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/niceselect/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/user-auth.css') }}">
</head>

<body>
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="user-form-logo"><a href="/"><img
                                src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>any issue?</h2>
                            <p>Make sure your current password is strong</p>
                        </div>
                        <form class="user-form">
                            <div class="form-group"><input type="password" class="form-control"
                                    placeholder="Old password"></div>
                            <div class="form-group"><input type="password" class="form-control"
                                    placeholder="Current password"></div>
                            <div class="form-group"><input type="password" class="form-control"
                                    placeholder="reapet password"></div>
                            <div class="form-button"><button type="submit">change password</button></div>
                        </form>
                    </div>
                    <div class="user-form-remind">
                        <p>Go Back To<a href="{{ route('frontend.showLoginForm') }}">login here</a></p>
                    </div>
                    <div class="user-form-footer">
                        <p>Idea Agro Mart | &COPY; Copyright by <a href="#">Md. Ripon Mia</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/countdown/countdown.min.js"></script>
    <script src="vendor/niceselect/nice-select.min.js"></script>
    <script src="vendor/slickslider/slick.min.js"></script>
    <script src="vendor/venobox/venobox.min.js"></script>
    <script src="js/nice-select.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/accordion.js"></script>
    <script src="js/venobox.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
