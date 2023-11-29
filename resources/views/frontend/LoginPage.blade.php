<!DOCTYPE html>
<html>

<head>
    <title>Tripathi Electronics Login</title>

    <!-- Custom stlylesheet -->
    {{-- <link type="text/css" rel="stylesheet" href="{{ env('APP_URL') }}/frontend/css/style.css" /> --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #D10024, #bb233c, #bb4f61);
        }

        .main {
            width: 350px;
            height: 540px;
            background: red;
            overflow: hidden;
            background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
        }

        #chk {
            display: none;
        }

        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }

        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        input {
            width: 60%;
            height: 20px;
            background: #E0DEDE;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        button {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #D10024;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }

        .login {
            height: 450px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }

        .login label {
            color: #D10024;
            transform: scale(.6);
        }

        #chk:checked~.login {
            transform: translateY(-530px);
        }

        #chk:checked~.login label {
            transform: scale(1);
        }

        #chk:checked~.signup label {
            transform: scale(.6);
        }

        .headg {
            margin-right: 16rem;
        }

        .display-heading {
            position: fixed;
            top: 0;
            text-align: center;
            color: #E0DEDE
        }
    </style>
</head>

<body>

    @if (session('msg'))
        {{-- <h2 class="display-heading">Email or Username Already Exist! </h2> --}}
        <h2 class="display-heading">{{ session('msg') }} </h2>
    @endif


    <div class="headg">
        <h1 style="font-size: 40px; font-weight: 900; color:rgb(196, 178, 178);">

            Tripathi <br>Electronics</h1>
        <h2 style="font-size:20px; color:rgb(141, 179, 45);"></h2>
    </div>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="{{ env('APP_URL') }}/user/sign-in" method="POST">
                @csrf
                <label for="chk" aria-hidden="false">Login</label>
                <input type="text" name="Uname" placeholder="User Name" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="login">

            <form method="POST" action="{{ env('APP_URL') }}/user/sign-up">
                @csrf


                <label for="chk" aria-hidden="false">Sign up</label>
                <div id="detail">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="text" name="Uname" placeholder="User name" required="">
                    <input type="text" name="name" placeholder="Name" required="">
                    <br>
                    <button type="button" onclick="add_click()">Submit</button>
                </div>

                <div id="pswd_section" style="display: none">
                    <input type="password" name="password" placeholder="Password" required="">
                    <input type="password" name="cnf_password" placeholder="Confirmation Password" required="">
                    <br>
                    <button type="submit">Confirm</button>
                </div>

            </form>
        </div>
    </div>
</body>

<script src="{{ env('APP_URL') }}/frontend/js/main.js"></script>
<script src="{{ env('APP_URL') }}/frontend/js/Script.js"></script>

</html>
