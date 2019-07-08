@extends('outlet.outlet-template')
@section('css')
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div class="media">
            @if (!empty($produk->foto))
                <img src="{{asset($produk->foto)}}" style="max-height: 55px" alt="Icon produk" class="mr-3">
            @endif
            <div class="media-body">
                <h5 class="mt-0">{{$produk->nama_produk}}</h5>
                {{$produk->barcode}}
            </div>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
                <a class="btn btn-default mr-1 mb-1 btn-sm" href="{{route('outlet.stok.show').'?produk_id='.$produk->id}}">Pengaturan Stok</a> 
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-12 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($produk->foto))
                        <img src="{{asset($produk->foto)}}" style="max-width: 100%" class="rounded" alt="Icon produk" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif

                        <table class="table table-sm table-borderless">
                            <tr><td>Nama Produk</td> <td>{{$produk->nama_produk}}</td></tr>
                            <tr><td>Deskripsi</td> <td>{{$produk->deskripsi}}</td></tr>
                            <tr><td>Barcode</td> <td>{{$produk->alamat}}</td></tr>
                            <tr><td>Harga Jual</td> <td>{{$produk->harga_jual}}</td></tr>
                            <tr><td>Harga Beli</td> <td>{{$produk->harga_beli}}</td></tr>
                        </table>

                        <table class="table table-sm ">
                            <tr><td>Penjualan Hari ini</td> <td>10</td></tr>
                            <tr><td>Penjualan bulan ini</td> <td>10</td></tr>
                            <tr><td>Penjualan total</td> <td>10</td></tr>
                        </table>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <strong>Penjualan</strong> <br><br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <th>Pelanggan</th>
                                <th>Tagihan</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ($kasir->penjualan()->get() as $penjualan)
                            <tr>
                                <td>{{app('App\Helper\Waktu')->hari_tanggal_waktu($penjualan->created_at, true)}}</td>
                                <td>{{empty($penjualan->pelanggan_id)? '': $penjualan->pelanggan->nama}}</td>
                                <td>{{$penjualan->tagihan}}</td>
                                <td>{{$penjualan->status}}</td>
                            </tr>
                            @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
            
            </div>
        </div>

    </div>
    
</main>

@endsection

@section('script')
<script>
   
</script>
@endsection
