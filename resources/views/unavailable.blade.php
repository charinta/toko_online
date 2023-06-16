<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Menampilkan Data Product Unavailable</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="product" class="btn btn-md btn-danger">KEMBALI</a>
                        <br>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $pro)
                                    <tr>
                                        <td>{{ $pro->nama }}</td>
                                        <td>{{ $pro->harga }}</td>
                                        <td>{{ $pro->stok }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $pro->links('vendor.pagination.bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                //message with toastr
                @if (session()->has('success'))
                    toastr.success('{{ session('success') }}', 'BERHASIL!');
                @elseif (session()->has('error'))
                    toastr.error('{{ session('error') }}', 'GAGAL!');
                @endif
            </script>
</body>

</html>
