@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <span id="ct" class="mt-3 d-block text-right"></span>
            <ul class="nav tab-nav ml-n1 my-3">
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_olo.index') }}#database-olo" class="tab-rekap">Database OLO</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_produk.index') }}#database-produk" class="tab-rekap">Database Produk</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_satuan.index') }}#database-satuan" class="tab-rekap">Database Satuan</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_incident_domain.index') }}#database-incident-domain" class="tab-rekap">Database Incident Domain</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_witel.index') }}#database-incident-domain" class="tab-rekap tab-active">Database Witel</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('db_jenis_nte.index') }}#database-jenis-nte" class="tab-rekap">Database Jenis NTE</a>
                </li>
            </ul>

            <div class="card mt-2 mb-2 shadow-sm" id="database-incident-domain">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Database Witel</h2>
                        </div>
                        @canany(['admin'])
                        <div class="col text-right button-list">
                            <a href="{{route('db_witel.create')}}" class="btn btn-thin btn-primary">
                                <i class="las la-plus"></i> Create
                            </a>
                            <a href="{{ route('db_witel.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                        @endcanany
                        @canany(['editor'])
                        <div class="col text-right button-list">
                            <a href="{{ route('db_witel.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                        @endcanany
                    </div>
                    <table class="table table-hover table-responsive-sm" id="table_id">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>Witel Nama</th>
                                @canany(['admin', 'editor'])
                                <th scope="col" class="text-center"><span></span></th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($witel as $witel)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $witel->witel_nama }}</td>
                                @canany(['admin'])
                                    <td class="text-center">
                                        <div class="dropleft" title="Menu">
                                            <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"></span>
                                            <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                <a href="{{ route('db_witel.edit',$witel->witel_id) }}" class="dropdown-item"
                                                    type="button">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('db_witel.destroy',$witel->witel_id) }}" method="POST"
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
                                    @canany(['editor'])
                                    <td class="text-center">
                                        <div class="dropleft" title="Menu">
                                            <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"></span>
                                            <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                <a href="{{ route('db_witel.edit',$witel->witel_id) }}" class="dropdown-item"
                                                    type="button">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
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
