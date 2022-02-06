@extends('template.main')

@section('contain')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="form-title">Form Update Disconnect</h4>
                    <form action="{{ route('disconnect.update',$disconnect->deployment_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tanggal">TGL/BLN/THN</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ $disconnect->tanggal }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="no_ao">NO. AO</label>
                            <input type="text" name="ao" id="ao" class="form-control" value="{{ $disconnect->ao }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="witel">WITEL</label>
                            <select name="witel" id="witel" class="form-control">
                                <option value="{{ $disconnect->witel_id }}">{{ $disconnect->witel_tabel->witel_nama }}</option>
                                @foreach ($witel_data as $item)
           
                                <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="olo">OLO / ISP</label>
                            <select name="olo" id="olo" class="form-control">
                                <option value="{{ $disconnect->olo_id }}">{{ $disconnect->olo_tabel->olo_nama }}</option>
                                @foreach ($olo_data as $item)
                                <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat_asal">ALAMAT ASAL</label>
                            <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="3"
                                value="{{ $disconnect->alamat_asal }}">{{ $disconnect->alamat_asal }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_nte">JENIS NTE</label>
                            <select name="jenis_nte" id="jenis_nte" class="form-control">
                                <option value="{{ $disconnect->jenis_nte_id }}">{{ $disconnect->jenis_nte_tabel->jenis_nte_nama }}</option>
                                @foreach ($jenis_nte_data as $item)

                                <option value="{{ $item->jenis_nte_id }}">{{ $item->jenis_nte_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_disconnect_detail">STATUS</label>
                            <select name="status_disconnect_detail" id="status_disconnect_detail" class="form-control">
                                <option value="{{ $disconnect->status_disconnect_detail_id }}">{{ $disconnect->status_disconnect_detail_tabel->status_disconnect_detail_nama }}</option>
                                @foreach ($status_disconnect_detail_data as $item)

                                <option value="{{ $item->status_disconnect_detail_id }}">{{ $item->status_disconnect_detail_nama }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="integrasi">TANGGAL PLAN CABUT</label>
                            <input type="date" name="tgl_plan_cabut" id="tgl_plan_cabut" class="form-control"
                                value="{{ $disconnect->tgl_plan_cabut }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="wfm_id">PIC</label>
                            <input type="text" name="pic" id="wfm_id" value="{{ $disconnect->kontak_pic_lokasi }}" class="form-control">
                        </div>
                        <div class="form-group text-right mt-4">
                            <a href="{{ route('disconnect.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
                            <button class="btn btn-main" type="submit" onclick="return validasiEdit();">Update
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
