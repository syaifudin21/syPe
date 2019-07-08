@extends('outlet.outlet-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Produk</h1>
            <p>Informasi Produk yang terdaftar</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('outlet.produk.store')}}">
                    {{ csrf_field() }}
    
                        <div class="row">
    
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="{{old('nama_produk')}}">
                                        @if ($errors->has('nama_produk'))
                                            <small class="form-text text-muted">{{ $errors->first('nama_produk') }}</small>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="{{old('harga_beli')}}">
                                        @if ($errors->has('harga_beli'))
                                            <small class="form-text text-muted">{{ $errors->first('harga_beli') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="{{old('harga_jual')}}">
                                        @if ($errors->has('harga_jual'))
                                            <small class="form-text text-muted">{{ $errors->first('harga_jual') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="{{old('barcode')}}">
                                        @if ($errors->has('barcode'))
                                            <small class="form-text text-muted">{{ $errors->first('barcode') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi">{{old('deskripsi')}}</textarea>
                                        @if ($errors->has('deskripsi'))
                                            <small class="form-text text-muted">{{ $errors->first('deskripsi') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="stok_awal" class="col-sm-2 col-form-label">Stok Awal</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="stok_awal" id="stok_awal" placeholder="Stok Awal" value="{{old('stok_awal')}}">
                                        @if ($errors->has('stok_awal'))
                                            <small class="form-text text-muted">{{ $errors->first('stok_awal') }}</small>
                                        @endif
                                    </div>
                                </div>
    
    
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" onchange="fotoURl(this)" name="foto" id="staticEmail" >
                                        @if ($errors->has('foto'))
                                            <small class="form-text text-muted">{{ $errors->first('foto') }}</small>
                                        @endif
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <img src="{{asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="foto">
                            </div>
                        </div>
                    </form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
				</div>
				</div>
			  </div>
			</div>
		  </div>

    </div>
</main>

@endsection

@section('script')
<script>
function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
