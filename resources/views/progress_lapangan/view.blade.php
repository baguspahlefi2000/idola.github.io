@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-5 shadow-sm">
            @if (Auth::user()->role == 'admin')
                <div class="card-body row">
                    <h4 class="form-title col-6 form-title mt-4">Form View Progress</h4>
                        <a href="{{ route('progress.edit',$progress->id) }}" class="col-3 mt-4" Style="color : black;" type="button"> 
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('progress.destroy',$progress->id) }}" method="POST" class="col-3 mt-4 d-inline" onsubmit="return validasiHapus()">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" type="submit" onclick="return confirm('Apakah Anda Ingin Menghapusnya?')"><i class="fas fa-trash mr-2"></i> Hapus</button>
                        </form>
                    </div>
                    @else
                    <h4 class="form-title col-6 form-title mt-4">Form View Progress</h4>
                    @endif
                    <form action="{{ route('progress.update', $progress->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mx-4">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ $progress->tanggal }}" disabled="disabled">
                        </div>
                        <div class="form-group mx-4">
                            <label for="witel">Witel</label>
                            <select name="witel" id="witel" class="form-control" disabled="disabled">
                                <option value="{{ $progress->witel }}" >{{ $progress->witel }}</option>
                                @foreach ($database as $db)
                                @if ($db->witel !== '')
                                <option value="{{ $db->witel }}">{{ $db->witel }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mx-4">
                            <label for="ao">No Ao</label>
                            <select name="ao" id="ao" class="form-control" disabled="disabled">
                                <option value="{{ $progress->ao }}">{{ $progress->ao }}</option>
                                @foreach ($wfm as $wfm)
                                <option value="{{ $wfm->no_ao }}">{{ $wfm->no_ao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mx-4">
                            <label for="olo">Olo</label >
                            <select name="olo" id="olo" class="form-control" disabled="disabled">
                                <option value="{{ $progress->olo }}">{{ $progress->olo }}</option>
                                @foreach ($database as $db)
                                <option value="{{ $db->olo_isp }}">{{ $db->olo_isp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mx-4">
                            <label for="produk">Produk</label>
                            <select name="produk" id="produk" class="form-control" disabled="disabled">
                                <option value="{{ $progress->produk }}">{{ $progress->produk }}</option>
                                @foreach ($database as $db)
                                @if ($db->produk !== '')
                                <option value="{{ $db->produk }}">{{ $db->produk }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group m-4">
                            <div class="form-group">
                                <label for="alamat_toko">Alamat</label>
                                <textarea name="alamat_toko" id="alamat_toko" rows="3"
                                    class="form-control" disabled="disabled">{{ $progress->alamat_toko }}</textarea>
                            </div>
                        </div>

                        <h5 class="ml-4">Progress PT1</h5>
                        <div class="row ml-md-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_order_pt1">Tanggal Order</label>
                                    <input type="date" name="tanggal_order_pt1" id="tanggal_order_pt1"
                                        class="form-control" disabled="disabled" value="{{ $progress->tanggal_order_pt1 }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group mr-3">
                                    <label for="keterangan_pt1">Keterangan</label>
                                    <textarea class="form-control" name="keterangan_pt1" id="keterangan_pt1"
                                        rows="1" disabled="disabled">{{ $progress->keterangan_pt1 }}</textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="ml-4">Progress PT2</h5>
                        <div class="row ml-md-3">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="tanggal_order_pt2">Tanggal Order</label>
                                    <input type="date" name="tanggal_order_pt2" id="tanggal_order_pt2"
                                        class="form-control" disabled="disabled" value="{{ $progress->tanggal_order_pt2 }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group mr-3">
                                    <label for="keterangan_pt2">Keterangan</label>
                                    <textarea class="form-control" name="keterangan_pt2" id="keterangan_pt2"
                                        rows="1" disabled="disabled">{{ $progress->keterangan_pt2 }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mx-4">
                            <label for="datek_odp">Datek ODP</label>
                            <input type="text" name="datek_odp" id="datek_odp" class="form-control"
                                value="{{ $progress->datek_odp }}" disabled="disabled">
                        </div>
                        <div class="form-group mx-4">
                            <label for="datek_gpon">Datek GPON</label>
                            <input type="text" name="datek_gpon" id="datek_gpon" class="form-control"
                                value="{{ $progress->datek_gpon }}" disabled="disabled">
                        </div>
                        <div class="form-group mx-4">
                            <label for="progress">Progress</label>
                            <select name="progress" id="progress" class="form-control" disabled="disabled">
                                <option value="{{ $progress->progress }}">{{ $progress->progress }}</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Done">Done</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </div>
                        <div class="form-group mx-4">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="2"
                                class="form-control" disabled="disabled">{{ $progress->keterangan }}</textarea>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
