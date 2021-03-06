<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Icon Line Awesome -->
    <link rel="stylesheet" href="{{ asset('line-awesome/css/line-awesome.min.css') }}">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">

    {{-- CSS Custom --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Sweet Alert -->
    <script src="{{ asset('sweet-alert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('sweet-alert/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweet-alert/sweetalert2.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo_favicon.png') }}">

    <title>{{ $title }}</title>
</head>

<body onload="display_ct();">

    @include('template.navbar')

    <div class="main-content">
        <!-- Contain -->

        @yield('contain')
    </div>
    @include('template.footer')

    <!-- Font Awesome-->
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <!-- Bootstrap 4 JS -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Custom -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!--  Data Table-->
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <link rel="stylesheet" href="extensions/sticky-header/bootstrap-table-sticky-header.css">
    <script src="extensions/sticky-header/bootstrap-table-sticky-header.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "Tidak ada data di dalam table",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 ke 0 dari 0 data",
                    "infoFiltered": "(terfilter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Sedang Memuat...",
                    "processing": "Sedang Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
            });
        });

        $(document).ready(function () {
            $('#table_id_2').DataTable();
        });

    </script>

<script>
    function display(){
        var x = document.getElementById('status_integrasi').value;

        if(x=="1"){
            document.getElementById('tanggal_integrasi_a').style.display= "block";
            document.getElementById('tanggal_integrasi_b').style.display= "none";
        }else{
            document.getElementById('tanggal_integrasi_a').style.display= "none";
            document.getElementById('tanggal_integrasi_b').style.display= "block";
        }
    }
    
</script>




    


<script>
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }
</script>

<script>
        $(document).ready(function () {
            $('#table_id_progress').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "Tidak ada data di dalam table",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 ke 0 dari 0 data",
                    "infoFiltered": "(terfilter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Sedang Memuat...",
                    "processing": "Sedang Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
            });
        });

        $(document).ready(function () {
            $('#table_id_progress_2').DataTable();
        });

    </script>

<script>
        $(document).ready(function () {
            $('#table_id_integrasi').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "Tidak ada data di dalam table",
                    "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 ke 0 dari 0 data",
                    "infoFiltered": "(terfilter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Sedang Memuat...",
                    "processing": "Sedang Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
            });
        });

        $(document).ready(function () {
            $('#table_id_integrasi_2').DataTable();
        });

    </script>



</body>

</html>
