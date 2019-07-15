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
                        <th class="text-center">Log</th>
                        <th>Keterangan</th>
                        <th class="text-center">Invoice</th>
                        <th class="text-center">Stok Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stoks as $stok)
                    <tr>
                        <td class="text-center">{{ $stok->debit == 0 ? "+". $stok->kredit : "-". $stok->debit}}</td>
                        <td>{{$stok->keterangan}}</td>
                        <td class="text-center">{{$stok->invoice}}</td>
                        <td class="text-center">{{$stok->stok_akhir}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="tile">
            <form method="post" action="{{route('outlet.produk.stok.store')}}"> @csrf
                <input type="hidden" name="produk_id" value="{{$_GET['produk_id']}}">
                 <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option>Kredit</option>
                        <option>Debit</option>
                    </select>
                    @if ($errors->has('status'))
                        <small class="form-text text-muted">{{ $errors->first('status') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input class="form-control" name="stok" id="stok" type="number" aria-describedby="stok" placeholder="Stok" value="{{old('stok')}}" required>
                    @if ($errors->has('nama_produk'))
                        <small class="form-text text-muted">{{ $errors->first('nama_produk') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea rows="3" class="form-control" name="keterangan" id="keterangan" aria-describedby="keterangan" placeholder="Keterangan" required>{{old('keterangan')}}</textarea>
                    @if ($errors->has('keterangan'))
                        <small class="form-text text-muted">{{ $errors->first('keterangan') }}</small>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary btn-block">
            </form>
        </div>
        </div>

    </div>
</main>


@endsection

@section('script')
@endsection
