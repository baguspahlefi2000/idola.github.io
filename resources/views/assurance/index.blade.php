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
                            <button type="button" class="btn btn-outline" data-toggle="modal"
                                data-target="#importButton">
                                <i class="las la-upload"></i> Import
                            </button>
                            <a href="{{ route('wfm.export') }}" class="btn btn-second-thin ml-2">
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
                            <th>Resolved Data</th>
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
                                

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Impor -->
        <div class="modal fade" id="importButton" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="importButtonLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importButtonLabel">Import Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('wfm.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p><i class="las la-info-circle"></i> Sebelum Import pastikan sesuai dengan template!</p>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="importFile" required
                                        accept=".xlsx, .csv, .xls, .ods, .tsv">
                                    <label class="custom-file-label" for="importFile">Pilih File</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-second btn-block">Import</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-second-thin text-bold" data-toggle="modal"
                            data-target="#templateButton">Lihat Template</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Template -->
        <div class="modal fade" id="templateButton" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="templatelabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="templatelabel">Template Tabel Deployment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan urutan kolom file excel yang akan diupload sesuai seperti tabel template agar tidak
                            terjadi error!</p>
                        <table class="table table-sm table-responsive table-striped template-tabel">
                            <thead>
                                <tr>
                                    <th>Tgl/Bln/Thn</th>
                                    <th class="text-nowrap">No. ao</th>
                                    <th>Witel</th>
                                    <th class="text-nowrap">OLO / ISP</th>
                                    <th class="text-nowrap">Site kriteria</th>
                                    <th>SID</th>
                                    <th class="text-nowrap">Site ID</th>
                                    <th class="text-nowrap">Order type</th>
                                    <th>Produk</th>
                                    <th>Satuan</th>
                                    <th class="text-nowrap">Kapasitas [BW]</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th class="text-nowrap">Alamat asal</th>
                                    <th class="text-nowrap">Alamat tujuan</th>
                                    <th class="text-nowrap">Status NCX</th>
                                    <th class="text-nowrap">Berita acara</th>
                                    <th class="text-nowrap">Tgl Complete WFM</th>
                                    <th class="text-nowrap">Status WFM</th>
                                    <th class="text-nowrap">Alasan cancel</th>
                                    <th class="text-nowrap">Cancel by</th>
                                    <th class="text-nowrap">Start cancel date</th>
                                    <th class="text-nowrap">Ready after cancel</th>
                                    <th>Integrasi</th>
                                    <th class="text-nowrap">Metro backhaull</th>
                                    <th>IP</th>
                                    <th>PORT</th>
                                    <th class="text-nowrap">Metro access</th>
                                    <th>IP</th>
                                    <th>PORT</th>
                                    <th>VLAN</th>
                                    <th>VCID</th>
                                    <th>GPON</th>
                                    <th>IP</th>
                                    <th>PORT</th>
                                    <th>SN</th>
                                    <th>PORT</th>
                                    <th>TYPE</th>
                                    <th class="text-nowrap">Nama switch</th>
                                    <th class="text-nowrap">IP switch</th>
                                    <th>Downlink</th>
                                    <th class="text-nowrap">Type SWITCH</th>
                                    <th class="text-nowrap">CAPTURE METRO BACKHAUL</th>
                                    <th class="text-nowrap">CAPTURE METRO ACCESS</th>
                                    <th class="text-nowrap">CAPTURE GPON</th>
                                    <th class="text-nowrap">CAPTURE GPON IMAGE</th>
                                    <th>PIC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12-12-2021</td>
                                    <td>2-780564639</td>
                                    <td>TASIKMALAYA</td>
                                    <td>CITRA JELAJAH INFORMATIKA (CIFO)</td>
                                    <td>SINGLE</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>NEW INSTALL</td>
                                    <td>METRO</td>
                                    <td>MBps</td>
                                    <td>100</td>
                                    <td>107,895</td>
                                    <td>-7,484347</td>
                                    <td>Singajaya, Kabupaten Garut, Jawa Barat Garut Indonesia CIFO KEC SINGAJAYA</td>
                                    <td>-</td>
                                    <td>Fulfill Billing Completed</td>
                                    <td></td>
                                    <td>15-12-2021</td>
                                    <td>CLOSE</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>16-12-2021</td>
                                    <td>ME9-D3-LBG</td>
                                    <td>172.30.193.1</td>
                                    <td>3/2/2</td>
                                    <td>ME-B-JWB-CKG</td>
                                    <td>172.30.193.1</td>
                                    <td>3/2/2</td>
                                    <td>2080</td>
                                    <td>1934412080</td>
                                    <td>GPON02-D3-CKJ-2</td>
                                    <td>172.30.193.1</td>
                                    <td>1/2/2</td>
                                    <td>48575443E09915A3</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>Huawei</td>
                                    <td>199.202.93.2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>11-11-2021</td>
                                    <td>2-780564639</td>
                                    <td>BANDUNG</td>
                                    <td>PT. TELKOM INDONESIA</td>
                                    <td>SINGLE</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>NEW INSTALL</td>
                                    <td>METRO</td>
                                    <td>MBps</td>
                                    <td>100</td>
                                    <td>107,895</td>
                                    <td>-7,484347</td>
                                    <td>Coblong, Bandung</td>
                                    <td>-</td>
                                    <td>Fulfill Billing Completed</td>
                                    <td></td>
                                    <td>15-12-2021</td>
                                    <td>CLOSE</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>16-12-2021</td>
                                    <td>ME9-D3-LBG</td>
                                    <td>172.30.193.1</td>
                                    <td>3/2/2</td>
                                    <td>ME-B-JWB-CKG</td>
                                    <td>172.30.193.1</td>
                                    <td>3/2/2</td>
                                    <td>2080</td>
                                    <td>1934412080</td>
                                    <td>GPON02-D3-CKJ-2</td>
                                    <td>172.30.193.1</td>
                                    <td>1/2/2</td>
                                    <td>48575443E09915A3</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>Huawei</td>
                                    <td>199.202.93.2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h3>Order</h3>

                            </div>
                            <div id="orderDetails" class="modal-body"></div>
                            <div id="orderItems" class="modal-body"></div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
