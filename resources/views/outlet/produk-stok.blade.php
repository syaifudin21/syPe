@extends('outlet.outlet-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Stok Produk</h1>
            <p>Informasi Stok Produk</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
                    <table id="sampleTable" class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Log</th>
                                <th>Keterngan</th>
                                <th>Invoice</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stoks as $stok)
                            <tr>
                                <td>{{empty($stok->debit)? "+". $stok->kredit : "-". $stok->debit}}</td>
                                <td>{{$stok->keterangan}}</td>
                                <td>{{$stok->invoice}}</td>
                                <td>{{$stok->stok_akhir}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>

    </div>
</main>


@endsection

@section('script')
@endsection
