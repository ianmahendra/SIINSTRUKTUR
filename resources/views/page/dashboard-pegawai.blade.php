@extends('layouts.main')

@section('css-custom')
    <style>
        thead input {
            width: 100%;
        }
    </style>
@endsection

@section('konten')

    <html>

    <head>
        <title>Font Awesome Icons</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-black" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"> </i> <span> Tambah Pegawai </span>
                    </button>
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tablePegawai" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <th>NID</th>
                                        <th>Nama Pegawai</th>
                                        <th>Lokasi Unit</th>
                                        <th>Posisi</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($dataPegawais as $pegawai)
                                            <tr role="row" class="odd">
                                                <td>{{ $pegawai->nid }}</td>
                                                <td>{{ $pegawai->nama_lengkap }}</td>
                                                <td>{{ $pegawai->lokasi_unit }}</td>
                                                <td>{{ $pegawai->posisi }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        onclick="showDetail('{{ $pegawai->nid }}')">
                                                        <i class="fas fa-list"> </i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal"
                                                        onclick="showEdit('{{ $pegawai->nid }}')">
                                                        <i class="fa fa-pencil"> </i>
                                                    </button>
                                                    <button type="button" data-pegawai-id='{{ $pegawai->nid }}'
                                                        data-toggle="modal" data-target="#deletePegawaiModal"
                                                        class="btn btn-info btn-sm btn-danger"> <i class="far fa-trash-alt">
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog " aria-labelledby="addModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form_add" action="{{ route('PostAddPegawai') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Tambah Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="dataadd">
                                    <div class="form-group">
                                        <label for="nid">ID</label>
                                        <input type="text" class="form-control" name="nid2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama_lengkap2">
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi_unit">Lokasi Unit</label>
                                        <input type="text" class="form-control" name="lokasi_unit2">
                                    </div>
                                    <div class="form-group">
                                        <label for="divisi_asal">Divisi Asal</label>
                                        <input type="text" class="form-control" name="divisi_asal2">
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" name="npwp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp">KTP</label>
                                        <input type="text" class="form-control" name="ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email2">
                                    </div>
                                    <div class="form-group">
                                        <label for="telpon">No Kontak</label>
                                        <input type="text" class="form-control" name="telpon2">
                                    </div>
                                    <div class="form-group">
                                        <label for="posisi">Posisi</label>
                                        <input type="text" class="form-control" name="posisi2">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_ktp">Alamat</label>
                                        <input type="text" class="form-control" name="alamat_ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kota_ktp">Kota</label>
                                        <input type="text" class="form-control" name="kota_ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi_ktp">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi_ktp2">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h3 id="loadingDetailModal">Loading ....</h3>
                                <h3 id="dataTidakAdaDetailModal">Data tidak ditemukan</h3>
                            </div>
                            <div id="datadetail">
                                <div class="form-group">
                                    <label for="nid">ID</label>
                                    <input type="text" class="form-control" id="nid" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_lengkap" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_unit">Lokasi Unit</label>
                                    <input type="text" class="form-control" id="lokasi_unit" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="divisi_asal">Divisi Asal</label>
                                    <input type="text" class="form-control" id="divisi_asal" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" class="form-control" id="npwp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <input type="text" class="form-control" id="ktp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">EMail</label>
                                    <input type="text" class="form-control" id="email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">No. Kontak</label>
                                    <input type="text" class="form-control" id="telpon" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="posisi">Posisi</label>
                                    <input type="text" class="form-control" id="posisi" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ktp">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp"
                                        readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog " aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form_edit" action="{{ route('PostEditPegawai') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <h3 id="loadingEditModal">Loading ....</h3>
                                    <h3 id="dataTidakAdaEditModal">Data tidak ditemukan</h3>
                                </div>
                                <div id="dataedit">
                                    <input type="hidden" id="idKey" name="id_key">
                                    <div class="form-group">
                                        <label for="nid">ID</label>
                                        <input type="text" class="form-control" id="nid2" name="nid2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_lengkap2"
                                            name="nama_lengkap2">
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi_unit">Lokasi Unit</label>
                                        <input type="text" class="form-control" id="lokasi_unit2"
                                            name="lokasi_unit2">
                                    </div>
                                    <div class="form-group">
                                        <label for="divisi_asal">Divisi Asal</label>
                                        <input type="text" class="form-control" id="divisi_asal2"
                                            name="divisi_asal2">
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" id="npwp2" name="npwp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp">KTP</label>
                                        <input type="text" class="form-control" id="ktp2" name="ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email2" name="email2">
                                    </div>
                                    <div class="form-group">
                                        <label for="telpon">No. Kontak</label>
                                        <input type="text" class="form-control" id="telpon2" name="telpon2">
                                    </div>
                                    <div class="form-group">
                                        <label for="posisi">Posisi</label>
                                        <input type="text" class="form-control" id="posisi2" name="posisi2">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_ktp">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_ktp2" name="alamat_ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kota_ktp">Kota</label>
                                        <input type="text" class="form-control" id="kota_ktp2" name="kota_ktp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi_ktp">Provinsi</label>
                                        <input type="text" class="form-control" id="provinsi_ktp2"
                                            name="provinsi_ktp2">
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" data-dismiss="modal"
                                        onclick="submitForm()">Submit</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletePegawaiModal" tabindex="-1" role="dialog"
                aria-labelledby="deletePegawaiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePegawaiLabel">Menghapus Data Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('DeleteDataPegawai') }}" id="deletePegawaiModalForm">
                                @csrf
                                <input type="hidden" name="nid" id="nid">
                                <div class="text-center">
                                    <p>Anda Yakin Untuk Delete?</p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal"
                            onclick="
            event.preventDefault();
            document.getElementById('deletePegawaiModalForm').submit();">Delete</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        @endsection


        @section('script-js')
            <script>
                $(document).ready(function() {
                    // $('#tablePegawai thead tr')
                    //     .clone(true)
                    //     .addClass('filters')
                    //     .appendTo('#tablePegawai thead');

                    $('#tablePegawai').DataTable({
                        "scrollX": true,
                        "order": [],
                        orderCellsTop: true,
                        fixedHeader: true,
                        // initComplete: function() {
                        //     var api = this.api();

                        //     // For each column
                        //     api
                        //         .columns()
                        //         .eq(0)
                        //         .each(function(colIdx) {
                        //             // Set the header cell to contain the input element
                        //             var cell = $('.filters th').eq(
                        //                 $(api.column(colIdx).header()).index()
                        //             );
                        //             var title = $(cell).text();
                        //             $(cell).html('<input type="text" placeholder="' + title + '" />');

                        //             // On every keypress in this input
                        //             $(
                        //                     'input',
                        //                     $('.filters th').eq($(api.column(colIdx).header()).index())
                        //                 )
                        //                 .off('keyup change')
                        //                 .on('change', function(e) {
                        //                     // Get the search value
                        //                     $(this).attr('title', $(this).val());
                        //                     var regexr =
                        //                         '({search})'; //$(this).parents('th').find('select').val();

                        //                     var cursorPosition = this.selectionStart;
                        //                     // Search the column for that value
                        //                     api
                        //                         .column(colIdx)
                        //                         .search(
                        //                             this.value != '' ?
                        //                             regexr.replace('{search}', '(((' + this.value +
                        //                                 ')))') :
                        //                             '',
                        //                             this.value != '',
                        //                             this.value == ''
                        //                         )
                        //                         .draw();
                        //                 })
                        //                 .on('keyup', function(e) {
                        //                     e.stopPropagation();

                        //                     $(this).trigger('change');
                        //                     $(this)
                        //                         .focus()[0]
                        //                         .setSelectionRange(cursorPosition, cursorPosition);
                        //                 });
                        //         });
                        // },
                    });
                });

                function showDetail(nid) {
                    console.log('showDetail clicked');
                    //console.log(nid);
                    $("#dataTidakAdaDetailModal").hide();
                    $("#dataDetail").hide();
                    $("#loadingDetailModal").show();

                    $.ajax({
                        url: "{!! route('getDetailPegawai') !!}",
                        data: {
                            nid: nid
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            let noTable = 1;
                            if (data) {
                                $("#nid").val(data.nid === null ? 'XXX' : data.nid)
                                $("#nama_lengkap").val(data.nama_lengkap === null ? 'XXX' : data.nama_lengkap)
                                $("#lokasi_unit").val(data.lokasi_unit === null ? 'XXX' : data.lokasi_unit)
                                $("#divisi_asal").val(data.divisi_asal === null ? 'XXX' : data.divisi_asal)
                                $("#npwp").val(data.npwp === null ? 'XXX' : data.npwp)
                                $("#ktp").val(data.ktp === null ? 'XXX' : data.ktp)
                                $("#email").val(data.email === null ? 'XXX' : data.email)
                                $("#telpon").val(data.telpon === null ? 'XXX' : data.telpon)
                                $("#posisi").val(data.posisi === null ? 'XXX' : data.posisi)
                                $("#alamat_ktp").val(data.alamat_ktp === null ? 'XXX' : data.alamat_ktp + ", " + data
                                    .provinsi_ktp + ", " + data.kota_ktp)
                                $("#loadingDetailModal").hide();
                                $("#dataDetail").show();
                            } else {
                                $("#loadingDetailModal").hide();
                                $("#dataTidakAdaDetailModal").show();
                            }
                        }
                    })
                }

                function showEdit(nid) {
                    // console.log('showEdit clicked');
                    //console.log(nid);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('getEditPegawai') !!}",
                        data: {
                            nid: nid
                        },
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            let noTable = 1;
                            if (data) {
                                $("#idKey").val(data.id);
                                //alert($("#idKey").val());
                                $("#nid2").val(data.nid === null ? 'XXX' : data.nid)
                                $("#nama_lengkap2").val(data.nama_lengkap === null ? 'XXX' : data.nama_lengkap)
                                $("#lokasi_unit2").val(data.lokasi_unit === null ? 'XXX' : data.lokasi_unit)
                                $("#divisi_asal2").val(data.divisi_asal === null ? 'XXX' : data.divisi_asal)
                                $("#npwp2").val(data.npwp === null ? 'XXX' : data.npwp)
                                $("#ktp2").val(data.ktp === null ? 'XXX' : data.ktp)
                                $("#email2").val(data.email === null ? 'XXX' : data.email)
                                $("#telpon2").val(data.telpon === null ? 'XXX' : data.telpon)
                                $("#posisi2").val(data.posisi === null ? 'XXX' : data.posisi)
                                $("#alamat_ktp2").val(data.alamat_ktp === null ? 'XXX' : data.alamat_ktp)
                                $("#provinsi_ktp2").val(data.provinsi_ktp === null ? 'XXX' : data.provinsi_ktp)
                                $("#kota_ktp2").val(data.kota_ktp === null ? 'XXX' : data.kota_ktp)
                                $("#loadingEditModal").hide();
                                $("#dataEdit").show();
                            } else {
                                $("#loadingEditModal").hide();
                                $("#dataTidakAdaEditModal").show();
                            }
                        }
                    })
                }

                function submitForm() {
                    $("#form_edit").submit()
                }

                function SubmitEditPegawai(nid) {
                    console.log('showEdit clicked');
                    //console.log(nid);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('PostEditPegawai') !!}",
                        data: $("#form_edit").serialize(),
                        method: "post",
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            let noTable = 1
                        }
                    })
                }

                //triggered when modal is about to be shown
                $('#deletePegawaiModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    var nid = $(e.relatedTarget).data('pegawai-id');
                    //console.log(instruk);
                    //populate the textbox
                    //alert(nid)
                    $(e.currentTarget).find('input[name="nid"]').val(nid);
                });
            </script>
        @endsection
