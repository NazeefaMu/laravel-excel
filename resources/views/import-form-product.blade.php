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

</head>
<body>

<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <h4 style="font-weight: bold">Import Excel to System</h4>
            </div>
            <div class="col-md-5"  align="right">
                <a class="btn btn-primary" href="{{ url('/main/logout') }}">Logout</a>
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
                    <div class="alert alert-success success-block">
                        <strong>Welcome {{ Auth::user()->email }}</strong>
                        <br />
                    </div>
                @else
                    <script>window.location = "/main";</script>
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
                        <form method="post" enctype="multipart/form-data" action="{{route('product.import')}}">
                            @csrf
                            <div class="form-group" >
                                <label for="file">Choose Excel</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name">Domain</label>
                                <select class="form-control" name="select_domain">
                                @foreach($domains as $domain)
                                    <option value='{{ $domain->id }}'>{{ $domain->domain_name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-upload"></span>&nbsp&nbspUpload excel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="font-weight: bold">Choose export option and Domain: </h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{route('product.export')}}">
                        @csrf
                    <div class="col-md-4" >
                        <div class="form-group">
                            <select class="form-control" name="select_framework">
                                <option value="1">Magento</option>
                                <option value="2">Woocommerce</option>
                                <option value="3">Shopify</option>
                                <option value="4">BigCommerce</option>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <select class="form-control" name="select_domain_export">
                                    @foreach($domains as $domain)
                                        <option value='{{ $domain->id }}'>{{ $domain->domain_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="col-md-4" align="right">
                        <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-download-alt"></span>&nbsp &nbspExport CSV</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row" style="padding-top: 60px" >
            <div class="col-md-10 offset-md-1">
                <table class="table table-responsive  yajra-datatable" id="product_table">
                    <thead class="active">
                    <tr style="font-weight: bold" class="info">
                        <td>SKU</td>
                        <td>Description</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Group name</td>
                        <td>Bar code</td>
                        <td>Stock</td>
                        <td>B2C</td>
                        <td>Brand</td>
                        <td>Action</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productdata as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->colour }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->group_name }}</td>
                            <td>{{ $product->bar_code }}</td>
                            <td>{{ $product->is_in_stock }}</td>
                            <td>{{ $product->b2c }}</td>
                            <td>{{ $product->brand }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </form>

    </div>

</section>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        {{--var table = $('.table').DataTable({--}}
        {{--    processing: true,--}}
        {{--    serverSide: true,--}}
        {{--    ajax: "{{ route('tabledit.action') }}",--}}
        {{--    columns: [--}}
        {{--        {data: 'sku', name: 'sku'},--}}
        {{--        {data: 'description', name: 'description'},--}}
        {{--        {data: 'colour', name: 'colour'},--}}
        {{--        {data: 'size', name: 'size'},--}}
        {{--        {data: 'group_name', name: 'group_name'},--}}
        {{--        {data: 'bar_code', name: 'bar_code'},--}}
        {{--        {data: 'is_in_stock', name: 'is_in_stock'},--}}
        {{--        {data: 'b2c', name: 'b2c'},--}}
        {{--        {data: 'brand', name: 'brand'},--}}
        {{--    ]--}}
        {{--});--}}

        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#product_table').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'sku'],
                editable:[[1, 'description'], [2, 'colour'],[3, 'size'],[4, 'group_name'],[5, 'bar_code'],[6, 'is_in_stock'],[7, 'b2c'],[8, 'brand']]

            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.sku).remove();
                }
            }
        });

    });
</script>
