<style>
    body {
        background-color: #9f9da7;
        font-size: 1.6rem;
        font-family: "Open Sans", sans-serif;
        color: #2b3e51;
    }
    h2 {
        font-weight:300;
        text-align:center;
    }
    p {
        position: relative;
    }
    a,
    a:link,
    a:visited,
    a:active {
        color:#3ca9e2;
        transition: all 0.2s ease;
    &:focus,
    &:hover {
         color:#329dd5;
         transition: all 0.2s ease;
     }
    }
    #login-form-wrap {
        background-color: #fff;
        width: 35%;
        margin: 30px auto;
        text-align: center;
        padding:20px 0 0 0;
        border-radius: 4px;
        box-shadow: 0px 30px 50px 0px rgba(0, 0, 0, 0.2);
    }
    #login-form {
        padding:0 60px;
    }
    input {
        display: block;
        box-sizing: border-box;
        width: 100%;
        outline: none;
        height: 60px;
        line-height: 60px;
        border-radius: 4px;
    }
    input[type="email"],
    input[type="password"]{
        width: 100%;
        padding: 0 0 0 10px;
        margin: 0;
        color: #8a8b8e;
        border: 1px solid #c2c0ca;
        font-style: normal;
        font-size: 16px;
        appearance: none;
        position: relative;
        display: inline-block;
        background: none;
    &:focus {
         border-color:#3ca9e2;
    &:invalid  {
         color:#cc1e2b;
         border-color:#cc1e2b;
     }
    }
    &:valid ~ .validation {
         display:block;
         border-color:#0C0;
    span {
        background: #0C0;
        position:absolute;
        border-radius: 6px;
    &:first-child {
         top: 30px;
         left: 14px;
         width: 20px;
         height: 3px;
         transform: rotate(-45deg);
     }
    &:last-child {
         top: 35px;
         left: 8px;
         width: 11px;
         height: 3px;
         transform: rotate(45deg);
     }
    }
    }
    }
    .validation {
        display:none;
        position: absolute;
        content: " ";
        height:60px;
        width:30px;
        right:15px;
        top:0px;
    }

    input[type="submit"] {
        border: none;
        display:block;
        background-color: #3ca9e2;
        color: #fff;
        font-weight: bold;
        text-transform:uppercase;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 18px;
        position: relative;
        display: inline-block;
        cursor: pointer;
        text-align: center;
    &:hover {
         background-color:#329dd5;
         transition: all 0.2s ease;
     }
    }
    #create-account-wrap {
        background-color:#eeedf1;
        color:#8a8b8e;
        font-size:14px;
        width:100%;
        padding:10px 0;
        border-radius: 0 0 4px 4px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        @if(isset(Auth::user()->email))
            <script>window.location="/main/successlogin";</script>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div id="login-form-wrap">
    <h2>Login</h2>
    <form id="login-form" enctype="multipart/form-data" action="{{url('/main/checklogin')}}" method="post">
        @csrf
        <p>
            <input type="email" id="email" name="email" placeholder="Email" required><i class="validation"><span></span><span></span></i>
        </p>
        <p>
            <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
        </p>
        <p>
            <input type="submit" id="login" value="Login">
        </p>
    </form>
    <div id="create-account-wrap">
        <p>Forgot password? <a href="#">Click here</a><p>
    </div><!--create-account-wrap-->
</div><!--login-form-wrap-->

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Import</title>--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
{{--    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}

{{--</head>--}}
{{--<body>--}}

{{--<section style="padding-top: 60px">--}}
{{--    <div class="container">--}}

{{--        <div class="row">--}}
{{--            <div align="center" class="col-md-12">--}}
{{--                <h3 style="font-weight: bolder;">EXCEL MANAGEMENT SYSTEM</h3>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                    @if(isset(Auth::user()->email))--}}
{{--                        <script>window.location="/main/successlogin";</script>--}}
{{--                    @endif--}}

{{--                    @if ($message = Session::get('error'))--}}
{{--                        <div class="alert alert-danger alert-block">--}}
{{--                            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @if (count($errors) > 0)--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <br><br><br>--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-3"></div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="post" enctype="multipart/form-data" action="{{url('/main/checklogin')}}">--}}
{{--                            @csrf--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <label for="file"><h4 style="font-weight: bold;font-family: Roboto">Enter Email</h4></label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>--}}
{{--                                        <input type="email" name="email" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <br>--}}
{{--                            <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <label for="file"><h4 style="font-weight: bold;font-family: Roboto">Enter Password</h4></label>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-8">--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>--}}
{{--                                    <input type="password" name="password" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            </div>--}}
{{--                            <br><br>--}}
{{--                            <div class="row" >--}}
{{--                                <div class="col-md-12" align="right">--}}
{{--                                    <button type="submit" class="btn btn-primary navbar-btn"><i class="glyphicon glyphicon-log-in"></i>&nbsp&nbspLogin</button>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3"></div>--}}
{{--        </div>--}}
{{--        <br><br><br>--}}

{{--    </div>--}}

{{--</section>--}}
{{--</body>--}}

{{--</html>--}}
