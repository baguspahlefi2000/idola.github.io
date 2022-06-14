@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-5 shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form Update Jenis NTE</h4>
                    <form action="{{ route('db_jenis_nte.update',$jenis_nte->jenis_nte_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="jenis_nte_nama">Jenis NTE</label>
                            <input type="text" name="jenis_nte_nama" id="jenis_nte_nama" class="form-control" value="{{ $olo->jenis_nte_nama }}">
                        </div>
                        <div class="form-group text-right mt-4">
                            <a href="{{ route('db_jenis_nte.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
                            <button type="submit" class="btn btn-main" onclick="return validasiEdit();">Update
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
