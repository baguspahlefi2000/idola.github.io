@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    @if (session()->has('success'))
    <div class="success-tambah align-items-center mt-3" id="success-tambah">
        <div class="d-flex">
            <div class="ml-3 p-2 align-self-center text-success">
                <i class="las la-check display-4"></i>
            </div>
            <div class="p-2 flex-grow-1 border-right">
                <h3 class="mt-2">Success</h3>
                <p class="pesan-berhasil">{{ session('success') }}</p>
            </div>
            <div class="px-4 align-self-center">
                <button id="close-flash" class="close" onclick="hideFlash()">
                    <span class="font-weight-normal">CLOSE</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col">

            <span id="ct" class="mt-3 d-block text-right"></span>
            <div class="card mt-2 mb-5 shadow-sm">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Assurance</h2>
                        </div>
                        <div class="col text-right">
                            {{-- notifikasi form validasi --}}
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                    
                            {{-- notifikasi sukses --}}
                            @if ($sukses = Session::get('sukses'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $sukses }}</strong>
                            </div>
                            @endif


                            <button type="button" class="btn btn-outline" data-toggle="modal"
                                data-target="#importExcel">
                                <i class="las la-upload"></i> Import
                            </button>

                            <!-- Import Excel -->
                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="{{ route('assurance.import')}}" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                            </div>
                                            <div class="modal-body">
                    
                                                {{ csrf_field() }}
                    
                                                <label>Pilih file excel</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>
                    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                                        
                            <a href="{{ route('assurance.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                <div class="div1">
                    <table class="table table-responsive table-hover table-coba" id="table_id">
                        <thead>
                            <th>No</th>
                            <th>Incident</th>
                            <th>Customer Name</th>
                            <th>Summary</th>
                            <th class="text-nowrap">Service ID</th>
                            <th class="text-nowrap">Related to Global Issue</th>
                            <th>Gaul</th>
                            <th class="text-nowrap">TTR E2E</th>
                            <th class="text-nowrap">TTR Customer</th>
                            <th class="text-nowrap">TTR Nasional</th>
                            <th class="text-nowrap">TTR Regional</th>
                            <th class="text-nowrap">TTR Witel</th>
                            <th class="text-nowrap">TTR Mitra</th>
                            <th class="text-nowrap">TTR Agent</th>
                            <th class="text-nowrap">TTR Pending</th>
                            <th class="text-nowrap">Pending Reason</th>
                            <th>Workzone</th>
                            <th>Witel</th>
                            <th>Incident's Symptom</th>
                            <th>Solution's Segment</th>
                            <th>Actual Solution</th>
                            <th>Incident Domain</th>
                            <th>Resolved Date</th>
                            <th>Resolved Time</th>
                            @canany(['admin', 'editor'])
                            <th scope="col"><span class="las la-ellipsis-v"></span></th>
                            @endcanany
                        </thead>
                        <tbody>
                            @foreach ($assurance as $data)
                            <tr>
                                <td class="text-center">{{$loop->iteration }}</td>
                                <td>{{$data->incident }}</td>
                                <td>{{$data->REKAP_OLO_NAMA }}</td>
                                <td>{{$data->summary }}</td>
                                <td>{{$data->service_id }}</td>
                                <td>{{$data->related_to_global_issue }}</td>
                                <td>{{$data->gaul }}</td>
                                <td>{{$data->TTR_E2E }}</td>
                                <td>{{$data->ttr_customer }}</td>
                                <td>{{$data->ttr_nasional }}</td>
                                <td>{{$data->ttr_regional }}</td>
                                <td>{{$data->ttr_witel }}</td>
                                <td>{{$data->ttr_mitra }}</td>
                                <td>{{$data->ttr_agent }}</td>
                                <td>{{$data->ttr_pending }}</td>
                                <td>{{$data->pending_reason }}</td>
                                <td>{{$data->workzone }}</td>
                                <td>{{$data->REKAP_WITEL_NAMA}}</td>
                                <td>{{$data->incidents_symptom }}</td>
                                <td>{{$data->solutions_segment }}</td>
                                <td>{{$data->actual_solution }}</td>
                                <td>{{$data->INCIDENT_DOMAIN_NAMA }}</td>
                                <td>{{$data->resolved_date }}</td>
                                <td>{{$data->resolved_time }}</td>
                                

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    
        

    </div>
</div>
@endsection
