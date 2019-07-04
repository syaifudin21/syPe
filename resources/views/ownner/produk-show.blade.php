@extends('ownner.ownner-template')
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
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm ">
                            <tr><td>Nama Produk</td> <td>{{$produk->nama_produk}}</td></tr>
                            <tr><td>Deskripsi</td> <td>{{$produk->deskripsi}}</td></tr>
                            <tr><td>Barcode</td> <td>{{$produk->alamat}}</td></tr>
                            <tr><td>Harga Jual</td> <td>{{$produk->harga_jual}}</td></tr>
                            <tr><td>Harga Beli</td> <td>{{$produk->harga_beli}}</td></tr>
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
