@extends('layouts.main')

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
      @if(count($errors) > 0)
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                      @endforeach
                  </div>
                  @endif
      </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size:30px">Data Master Sertifikasi</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> <span> Tambah Sertifikasi </span>
            </button>
            <div class="table-responsive mt-3">
                <div class="row"><div class="col-sm-12">
                    <table class="table table-bordered" id="tableInstruktur" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                        <thead>
                            <th>ID Sertifikasi</th>
                            <th>Nama Sertifikasi</th>
                            <th>Competency Level</th>

                        </thead>

                        <tbody>
                            @foreach($dataSertifikasis as $sertifikasi)
                                <tr role="row" class="odd">
                                    <td>{{$sertifikasi->id_skillcomp}}</td>
                                    <td>{{$sertifikasi->skill_comp}}</td>
                                    <td>{{$sertifikasi->competency_level}}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#detailModal"
                                            onclick="showDetail('{{$sertifikasi->id}}')"
                                        >
                                            <i class="fas fa-list"> </i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm btn-warning"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            onclick="showEdit('{{$sertifikasi->id}}')"
                                        >
                                            <i class="fa fa-pencil"> </i> </button>
                                        <button
                                            type="button"
                                            data-instruktur-id = {{$sertifikasi->id}}
                                            data-toggle="modal"
                                            data-target="#deleteInstrukturModal" class="btn btn-info btn-sm btn-danger"> <i class= "far fa-trash-alt"> </i> </button>
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

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Detail Instruktur</h5>
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
                    <label for="id_pegawai">ID</label>
                    <input type="text" class="form-control" id="id_skillcomp" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Sertifikasi</label>
                    <input type="text" class="form-control" id="skill_comp" readonly>
                </div>
                <div class="form-group">
                    <label for="course_id">Competency Level</label>
                    <input type="text" class="form-control" id="competency_level" readonly>
                </div>

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Instruktur</h5>
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
                <form id = "form_edit">
                <div class="form-group">
                    <label for="id_pegawai">ID</label>
                    <input type="text" class="form-control" id="id_pegawai2">
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap2">
                </div>
                <div class="form-group">
                    <label for="course_id">Course ID</label>
                    <input type="text" class="form-control" id="course_id2">
                </div>
                <div class="form-group">
                    <label for="pelatihan">Pelatihan</label>
                    <input type="text" class="form-control" id="pelatihan2">
                </div>
                <div class="form-group">
                    <label for="status_pegawai">Status Pegawai</label>
                    <input type="text" class="form-control" id="status_pegawai2">
                </div>
                <div class="form-group">
                    <label for="sertifikat_tot">Sertifikasi TOT</label>
                    <input type="text" class="form-control" id="sertifikat_tot2">
                </div>
                <div class="form-group">
                    <label for="sertifikat_dimiliki">Sertifikasi yang Dimiliki</label>
                    <input type="text" class="form-control" id="sertifikat_dimiliki2">
                </div>
                <div class="form-group">
                    <label for="kualifikasi">kualifikasi</label>
                    <input type="text" class="form-control" id="kualifikasi2">
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP</label>
                    <input type="text" class="form-control" id="no_hp2">
                </div>
                <div class="form-group">
                    <label for="no_ktp">No. KTP</label>
                    <input type="text" class="form-control" id="no_ktp2">
                </div>
                <div class="form-group">
                    <label for="npwp">NPWP</label>
                    <input type="text" class="form-control" id="npwp2">
                </div>
                <div class="form-group">
                    <label for="alamat_ktp">Alamat</label>
                    <input type="text" class="form-control" id="alamat_ktp2">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email2">
                </div>
                <div class="form-group">
                    <label for="rekening">Rekening</label>
                    <input type="text" class="form-control" id="rekening2">
                </div>
                <div class="form-group">
                    <label for="update_terakhir">Update Terakhir</label>
                    <input type="text" class="form-control" id="update_terakhir2">
                </div>
                <div class="form-group">
                    <label for="keterangan_mengajar">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan_mengajar2">
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="competencyModal" tabindex="-1" role="dialog" aria-labelledby="competencyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="competencyModalLabel">Kompetensi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <h3 id="loadingComptencyModal">Loading ....</h3>
                <h3 id="dataTidakAdaComptencyModal">Data tidak ditemukan</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="tableCompetencyModal">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Skill Competency</td>
                            <td>Level</td>
                            <td>Deskripsi</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteInstrukturModal" tabindex="-1" role="dialog" aria-labelledby="deleteInstrukturLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteInstrukturLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('DeleteDataInstruktur')}}" id="deleteInstrukturModalForm">
                @csrf
                <input type="text" name="instrukturID" id="instrukturID" hidden>
                <div class="text-center">
                    <p>yakin delete instruktur ini ?</p>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" data-dismiss="modal"
          onclick="
            event.preventDefault();
            document.getElementById('deleteInstrukturModalForm').submit();">Delete</button>
        </div>
      </div>
    </div>
  </div>


@endsection


@section('script-js')

<script>
    $(document).ready(function() {
        $('#tableInstruktur').DataTable({
            "scrollX": true
        });
    });

    function showCompetency(nid) {
        console.log('showCompetency clicked');
        //console.log(nid);
        $("#tableCompetencyModal tbody").empty();
        $("#dataTidakAdaComptencyModal").hide();
        $("#tableCompetencyModal").hide();
        $("#loadingComptencyModal").show();

        $.ajax({
            url : "{!! route('getCompetencyInstruktur') !!}",
            data : {
                dataNID : nid
            },
            dataType: 'json',
            success : function (data) {
                //console.log(data);
                let noTable = 1;
                if (data.length > 0 ){
                    data.forEach((item, index) => {
                        if (item.SKILL_COMP == '-' && item.COMPTCY_LEVEL == null && item.COMPTCY_DESC == '-'){
                            return;
                        }
                        $("#tableCompetencyModal tbody").append(
                            `
                            <tr>
                                <td>${noTable}</td>
                                <td>${item.SKILL_COMP}</td>
                                <td>${item.COMPTCY_LEVEL == null ? '-': item.COMPTCY_LEVEL}</td>
                                <td>${item.COMPTCY_DESC}</td>
                            </tr>
                            `
                        )
                        noTable++;
                    });
                    $("#loadingComptencyModal").hide();
                    $("#tableCompetencyModal").show();
                } else {
                    $("#loadingComptencyModal").hide();
                    $("#dataTidakAdaComptencyModal").show();
                }
            }
        })
    }

    function showDetail(nid) {
        console.log('showDetail clicked');
        //console.log(nid);
        $("#dataTidakAdaDetailModal").hide();
        $("#dataDetail").hide();
        $("#loadingDetailModal").show();

        $.ajax({
            url : "{!! route('getDetailInstruktur') !!}",
            data : {
                instruktur_id : nid
            },
            dataType: 'json',
            success : function (data) {
                //console.log(data);
                let noTable = 1;
                if (data) {
                    $("#id_pegawai").val(data.id_pegawai)
                    $("#nama_lengkap").val(data.nama_lengkap)
                    $("#course_id").val(data.course_id)
                    $("#pelatihan").val(data.pelatihan)
                    $("#status_pegawai").val(data.status_pegawai)
                    $("#email").val(data.email)
                    $("#keterangan_mengajar").val(data.keterangan_mengajar)
                    $("#kampus").val(data.kampus)
                    $("#sertifikat_tot").val(data.sertifikat_tot)
                    $("#sertifikat_dimiliki").val(data.sertifikat_dimiliki)
                    $("#kualifikasi").val(data.kualifikasi)
                    $("#no_ktp").val(data.no_ktp)
                    $("#npwp").val(data.npwp)
                    $("#no_hp").val(data.no_hp)
                    $("#alamat_ktp").val(data.alamat_ktp)
                    $("#rekening").val(data.rekening)
                    $("#update_terakhir").val(data.update_terakhir)
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
        console.log('showEdit clicked');
        //console.log(nid);
        $("#dataTidakAdaEditModal").hide();
        $("#dataEdit").hide();
        $("#loadingEditModal").show();

        $.ajax({
            url : "{!! route('getEditInstruktur') !!}",
            data : {
                instruktur_id : nid
            },
            dataType: 'json',
            success : function (data) {
                //console.log(data);
                let noTable = 1;9
                if (data) {
                    $("#id_pegawai2").val(data.id_pegawai)
                    $("#nama_lengkap2").val(data.nama_lengkap)
                    $("#course_id2").val(data.course_id)
                    $("#pelatihan2").val(data.pelatihan)
                    $("#status_pegawai2").val(data.status_pegawai)
                    $("#email2").val(data.email)
                    $("#keterangan_mengajar2").val(data.keterangan_mengajar)
                    $("#kampus2").val(data.kampus)
                    $("#sertifikat_tot2").val(data.sertifikat_tot)
                    $("#sertifikat_dimiliki2").val(data.sertifikat_dimiliki)
                    $("#kualifikasi2").val(data.kualifikasi)
                    $("#no_ktp2").val(data.no_ktp)
                    $("#npwp2").val(data.npwp)
                    $("#no_hp2").val(data.no_hp)
                    $("#alamat_ktp2").val(data.alamat_ktp)
                    $("#rekening2").val(data.rekening)
                    $("#update_terakhir2").val(data.update_terakhir)
                    $("#loadingDetailModal").hide();
                    $("#dataDetail").show();
                } else {
                    $("#loadingDetailModal").hide();
                    $("#dataTidakAdaDetailModal").show();
                }
            }
        })
    }

    function SubmitEditInstruktur(nid) {
        console.log('showEdit clicked');
        //console.log(nid);
        $("#dataTidakAdaEditModal").hide();
        $("#dataEdit").hide();
        $("#loadingEditModal").show();

        $.ajax({
            url : "{!! route('PostEditInstruktur') !!}",
            data : $("#form_edit").serialize(),
            method : "post",
            dataType: 'json',
            success : function (data) {
                //console.log(data);
                let noTable = 1
            }
        })
    }

    //triggered when modal is about to be shown
    $('#deleteInstrukturModal').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var instrukturID = $(e.relatedTarget).data('instruktur-id');
        //console.log(instruk);
        //populate the textbox
        $(e.currentTarget).find('input[name="instrukturID"]').val(instrukturID);
    });

</script>

@endsection
