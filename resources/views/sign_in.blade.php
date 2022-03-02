<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico" />

    <title>ID Card System - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Bitter:wght@100;400&display=swap");

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: "Bitter";
        }

        .form-signin {
            width: 100%;
            max-width: 360px;
            padding: 15px 30px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">
    <!-- <form class="form-signin"> -->
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="images/logo.png" alt="logo" height="72" />
        <h1 class="h3 mb-3 font-weight-normal">ID Card System</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <!-- <input type="text" id="inputEmail" class="form-control" placeholder="Email" required name="email" /> -->
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <br>

        <label for="inputPassword" class="sr-only">Password</label>
        <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" /> -->
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" /> Remember me
            </label>
        </div> -->

        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
        <p class="mt-3 mb-3 text-muted">&copy; 2021 - <?php echo date("Y"); ?> <br><span style="font-size: 12px;">Designed & Developed by <strong>KEI IT Support</strong></span></p>
    </form>
</body>

</html>