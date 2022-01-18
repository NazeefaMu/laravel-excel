<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <style>
        #gray {
            height: 1000px;
            background: gray;
            text-align: center;
            color: white;
            padding: 15px;
        }
        body{
            font-family: Roboto;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-2" id="gray">
        <h4 ><strong>{{ strtoupper(Auth::user()->name) }}</strong></h4>
        <hr><br><br>
        <a href="import-form-product" style="color: white"><h3><i class="glyphicon glyphicon-shopping-cart"></i></h3>Product Management</a><br />
        <br/><hr><br>
        <a href="add-user" style="color: white"><h3><i class="glyphicon glyphicon-user"></i></h3> User Management</a><br />
        <br /><hr><br>
        <a href="add-domain" style="color: white"><h3><i class="glyphicon glyphicon-tasks"></i></h3>Domain Management</a><br />
        <br/><hr>
    </div>
    <div class="col-md-10">
        <section style="padding-top: 10px">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-md-5 col-md-offset-1">
                        <h4 style="font-weight: bold">Domain Management</h4>
                    </div>
                    <div class="col-md-5"  align="right">
                        <a class="btn btn-secondary" href="{{ url('/main/logout') }}">Logout</a>
                    </div>
                    <div class="col-md-1"  align="right">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if(isset(Auth::user()->email))

                        @else
                            <script>window.location = "/main";</script>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header">
                                Add Domain
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" action="{{route('domain.add')}}">
                                    @csrf
                                    <div class="form-group" >
                                        <label for="file">Domain name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">&nbsp&nbspSubmit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 60px" >
                    <div class="col-md-10 offset-md-1">
                        <table class="table table-responsive `yajra-datatable" id="domain_table">
                            <thead class="active">
                            <tr style="font-weight: bold" class="active">
                                <td>Name</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($domainData as $domain)
                                <tr>
                                    <td>{{ $domain->domain_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                </form>

            </div>

        </section>
    </div>
</div>


</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#domain_table').Tabledit({
            url:'{{ route("domain.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'id'],
                editable:[[1, 'domain_name']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });

    });
</script>

