@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <span id="ct" class="mt-3 d-block text-right"></span>
            <ul class="nav tab-nav ml-n1 my-3">
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_olo.index') }}#database-olo" class="tab-rekap tab-active">Database Olo</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_produk.index') }}#database-produk" class="tab-rekap">Database Produk</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_satuan.index') }}#database-satuan" class="tab-rekap">Database Satuan</a>
                </li>
            </ul>

            <div class="card mt-2 mb-2 shadow-sm" id="rekap-deployment">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Database Olo</h2>
                        </div>
                        @canany(['admin', 'editor'])
                        <div class="col text-right button-list">
                            <a href="{{route('db_olo.create')}}" class="btn btn-thin btn-primary">
                                <i class="las la-plus"></i> Create
                            </a>
                        </div>
                        @endcanany
                    </div>
                    <table class="table table-hover table-responsive-md" id="table_id">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>OLO</th>
                                @canany(['admin', 'editor'])
                                <th scope="col"><span class="las la-ellipsis-v"></span></th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($olo as $olo)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $olo->olo_nama }}</td>
                                @canany(['admin', 'editor'])
                                    <td class="text-center">
                                        <div class="dropleft" title="Menu">
                                            <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"></span>
                                            <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                <a href="{{ route('db_olo.edit',$olo->olo_id) }}" class="dropdown-item"
                                                    type="button">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('db_olo.destroy',$olo->olo_id) }}" method="POST"
                                                    class="d-inline" onsubmit="return validasiHapus()">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item" type="submit"
                                                        onclick="return confirm('Apakah Anda Ingin Menghapusnya?')"><i
                                                            class="fas fa-trash mr-2"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    @endcanany
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
