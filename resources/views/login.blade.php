<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<section style="padding-top: 60px">
    <div class="container">

        <div class="row">
            <div align="center" class="col-md-9 offset-md-3">
                <h3 style="font-weight: bolder;">EXCEL MANAGEMENT SYSTEM</h3>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-9 offset-md-3">

{{--                @if(isset(Auth::user()->email))--}}
{{--                <script>window.location="/import-form-product"</script>--}}
{{--                @endif--}}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if(count($errors)>0)
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
        <br>


        <div class="row">
            <div class="col-md-9 offset-md-3">
                <div class="card">

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{url('/main/checklogin')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="file"><h4 style="font-weight: bold;font-family: Roboto">Enter Email</h4></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                            <div class="col-md-3">
                                <label for="file"><h4 style="font-weight: bold;font-family: Roboto">Enter Password</h4></label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-12" align="right">
                                    <button type="submit" class="btn btn-primary navbar-btn"><i class="glyphicon glyphicon-log-in"></i>&nbsp&nbspLogin</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

    </div>

</section>
</body>

</html>
