<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Product</label>
                                <input type="text" class="form-control" name="nama"
                                    value="{{ old('nama', $product->nama) }}" placeholder="Masukkan Nama Product">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Harga Product</label>
                                <input type="text" class="form-control" name="harga"
                                    value="{{ old('harga', $product->harga) }}" placeholder="Masukkan Harga Product">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Stok Product</label>
                                <input type="text" class="form-control" name="stok"
                                    value="{{ old('stok', $product->stok) }}" placeholder="Masukkan Stok Product">
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('product.index') }}" class="btn btn-md btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>

</html>
