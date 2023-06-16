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
                    <h3 class="text-center my-4">Menampilkan Data Product Toko Online</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="create" class="btn btn-md btn-outline-success mb-3">TAMBAH PRODUCT</a>
                        <a href="available" class="btn btn-md btn-outline-primary mb-3">PRODUCT
                            AVAILABLE</a>
                        <a href="unavailable" class="btn btn-md btn-outline-danger mb-3">PRODUCT
                            UNAVAILABLE</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $pro)
                                    <tr>
                                        <td>{{ $pro->nama }}</td>
                                        <td>{{ $pro->harga }}</td>
                                        <td>{{ $pro->stok }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('product.destroy', $pro->id) }}" method="POST">
                                                <a href="{{ route('product.show', $pro->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('product.edit', $pro->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                <a href="{{ route('product.editstok', $pro->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT STOCK</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
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
