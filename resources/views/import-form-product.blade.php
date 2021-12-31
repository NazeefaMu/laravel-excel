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

</head>
<body>

<section style="padding-top: 60px">
    <div class="container">

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h4 style="font-weight: bold">Import Excel to System</h4>
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
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        Import
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('dartxtest.import')}}">
                            @csrf
                            <div class="form-group" >
                                <label for="file">Choose Excel</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name">Domain</label>
                                <select class="form-control">
{{--                                    <option>Wordpress</option>--}}
{{--                                    <option>Shopify</option>--}}
{{--                                    <option>Magento</option>--}}
                                    <option>www.maxxus.com.auau</option>--}}
                                    <option>www.urbanclassics.com.au</option>

{{--                                    @foreach($domaindata as $domain)--}}
{{--                                        <option value="{{$domain->id}}">{{$domain->domain_name}}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload excel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h4 style="font-weight: bold">Choose export option : </h4>
                    </div>
                    <div class="col-md-5" >
                        <div class="form-group">
                            <select class="form-control">
                                <option>Wordpress</option>
                                <option>Shopify</option>
                                <option>Magento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="export-excel" class="btn btn-success"  onClick="window.location.reload();">Export Excel</a>
                    </div>
                    <div class="col-md-2">
                        <a href="export-csv" class="btn btn-primary"  onClick="window.location.reload();">Export CSV</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="row" style="padding-top: 60px" >
            <div class="col-md-10 offset-md-1">
                <table class="table table-responsive table-striped yajra-datatable" id="dartx_table">
                    <thead>
                    <tr style="font-weight: bold">
                        <td>Id</td>
                        <td>SKU</td>
                        <td>Item description</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Group name</td>
                        <td>Bar code</td>
                        <td>Stock</td>
                        <td>B2C</td>
                        <td>Brand</td>
                    </tr>
                    </thead>
                    @foreach ($productdata as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->colour }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->group_name }}</td>
                            <td>{{ $product->bar_code }}</td>
                            <td>{{ $product->in_stock }}</td>
                            <td>{{ $product->b2c }}</td>
                            <td>{{ $product->brand }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>

</section>
</body>

</html>
