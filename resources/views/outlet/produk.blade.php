@extends('outlet.outlet-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Produk</h1>
            <p>Informasi Produk Terdaftar</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('outlet.produk.create')}}">
                <i class="fa fa-plus"></i>Tambah Produk</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Produk</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Barcode</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Sisa Stok</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $produk)
                            <?php 
                               $stok = $produk->stok()->orderBy('id', 'DESC')->first();
                            ?>
                            <tr>
                                <td><b>{{$produk->nama_produk}}</b></td>
                                <td>{{$produk->barcode}}</td>
                                <td>{{$produk->harga_beli}}</td>
                                <td>{{$produk->harga_jual}}</td>
                                <td>{{empty($stok)? '': $stok->stok_akhir}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('outlet.produk.show', ['id'=> $produk->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('outlet.produk.edit', ['id'=>$produk->id])}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
@endsection
