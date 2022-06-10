@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <span id="ct" class="mt-3 d-block text-right"></span>
            <ul class="nav tab-nav ml-n1 my-3">
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_olo.index') }}#database-olo" class="tab-rekap">Database Olo</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_produk.index') }}#database-produk" class="tab-rekap tab-active">Database Produk</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_satuan.index') }}#database-satuan" class="tab-rekap">Database Satuan</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_incident_domain.index') }}#database-incident-domain" class="tab-rekap">Database Incident Domain</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_witel.index') }}#database-incident-domain" class="tab-rekap">Database Witel</a>
                </li>
            </ul>

            <div class="card mt-2 mb-2 shadow-sm" id="database-produk">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Database Produk</h2>
                        </div>
                        @canany(['admin', 'editor'])
                        <div class="col text-right button-list">
                            <a href="{{route('db_produk.create')}}" class="btn btn-thin btn-primary">
                                <i class="las la-plus"></i> Create
                            </a>
                            <a href="{{ route('db_produk.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                        @endcanany
                    </div>
                    <table class="table table-hover table-responsive-md" id="table_id">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>Produk</th>
                                @canany(['admin', 'editor'])
                                <th scope="col" class="text-center"><span></span></th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $produk)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $produk->produk_nama }}</td>
                                @canany(['admin', 'editor'])
                                    <td class="text-center">
                                        <div class="dropleft" title="Menu">
                                            <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"></span>
                                            <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                <a href="{{ route('db_produk.edit',$produk->produk_id) }}" class="dropdown-item"
                                                    type="button">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('db_produk.destroy',$produk->produk_id) }}" method="POST"
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
