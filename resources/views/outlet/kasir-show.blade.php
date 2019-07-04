@extends('outlet.outlet-template')
@section('css')
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
            <div class="media">
                    @if (!empty($kasir->foto))
                        <img src="{{asset($kasir->foto)}}" style="max-height: 55px" alt="Icon kasir" class="mr-3">
                    @endif
            <div class="media-body">
                <h5 class="mt-0">{{$kasir->nama}}</h5>
                {{$kasir->alamat}}
            </div>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-12 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($kasir->foto))
                        <img src="{{asset($kasir->foto)}}" style="max-width: 100%" class="rounded" alt="Icon kasir" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm ">
                            <tr><td>Nama</td> <td>{{$kasir->nama}}</td></tr>
                            <tr><td>Username</td> <td>{{$kasir->username}}</td></tr>
                            <tr><td>Alamat</td> <td>{{$kasir->alamat}}</td></tr>
                            <tr><td>HP</td> <td>{{$kasir->hp}}</td></tr>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Penjualan</strong> <br><br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <th>Pelanggan</th>
                                <th>Taginah</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($kasir->penjualan()->get() as $penjualan)
                            <tr>
                                <td>{{app('App\Helper\Waktu')->hari_tanggal_waktu($penjualan->created_at, true)}}</td>
                                <td>{{empty($penjualan->pelanggan_id)? '': $penjualan->pelanggan->nama}}</td>
                                <td>{{$penjualan->tagihan}}</td>
                                <td>{{$penjualan->status}}</td>
                            </tr>
                            @endforeach
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
