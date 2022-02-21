@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <span id="ct" class="mt-3 d-block text-right"></span>



            <div class="card mt-2 mb-2 shadow-sm" id="rekap-deployment">
                <div class="card-body">
                    <div class="form-row">
                            <div class="col">
                                <label for="witel">WITEL</label>
                                @foreach ($witel as $item)
                                <input type="text" name="witel" id="witel" class="form-control" value="{{ $item->REKAP_WITEL }}"></input>
                                @endforeach
                            </div>
                            <div class="col">
                                <label for="produk">PRODUK</label>
                                @foreach ($produk as $item)
                                <input type="text" name="produk" id="produk" class="form-control" value="{{ $item->REKAP_PRODUK }}"></input>
                                @endforeach
                            </div>
                            <div class="col">
                                <label for="witel">CUSTOMER</label>
                                @foreach ($customer as $item)
                                <input type="text" name="witel" id="witel" class="form-control" value="{{ $item->REKAP_CUSTOMER }}"></input>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
