@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-5 shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form Update Witel</h4>
                    <form action="{{ route('db_witel.update',$witel->witel_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="witel_nama">Witel</label>
                            <input type="text" name="witel_nama" id="witel_nama" class="form-control" value="{{ $witel->witel_nama }}">
                        </div>
                        <div class="form-group text-right mt-4">
                            <a href="{{ route('db_witel.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
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
