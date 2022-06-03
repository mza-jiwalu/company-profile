@extends('hrd.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pelamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="post.php">Post</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Detail Pelamar
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('hrd/lamaran')}}" class="btn btn-sm btn-secondary float-right">
                                    <i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive">
                                <tr>
                                    <td>
                                        <div class="col-auto">
                                            <label for="inputPassword6" class="col-form-label">Foto</label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{url($pelamar->foto)}}" alt="" width="200" height="200">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Lowongan Kerja</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->lowongan}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="inputPassword6" class="col-form-label">Nama</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" id="inputPassword6" value="{{$pelamar->nama_lengkap}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Tanggal Lahir</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->tanggal_lahir}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">NIK</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->nik}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Umur</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->umur}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Jenis Kelamin</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->jenis_kelamin}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">No Telepon</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->no_tlp}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Email</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->email}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                               
                                <tr>
                                    <td>
                                        <label class="col-form-label">Link Sosial Media</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->link_sosmed}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Sudah Bekerja ?</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->sudah_bekerja}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Terakhir Bekerja ?</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->terakhir_bekerja}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Lama Bekerja</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->lama_bekerja}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Jabatan Terakhir</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->jabatan_terakhir}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="col-form-label">Gaji terakhir</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->jabatan_terakhir}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="col-form-label">Nilai soal</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->nilai_soal}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>
                               

                                <tr>
                                    <td>
                                        <label class="col-form-label">CV</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                        <embed src="{{url($pelamar->cv)}}" type="application/pdf" width="100%" height="600px" />
                                            <!-- <embed href="{{url($pelamar->cv)}}" target="_blank">
                                            <input type="text" value="{{$pelamar->cv}}"
                                                class="form-control" aria-describedby="passwordHelpInline"> -->
                                        </div>
                                    </td>
                                </tr>

                              

                                <tr>
                                    <td>
                                        <label class="col-form-label">Score Pilihan Ganda</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <input type="text" value="{{$pelamar->score_pilgan}}"
                                                class="form-control" aria-describedby="passwordHelpInline">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <select name="" class="form-select" id="status" onchange="putStatus();">
                                                <option value="">Status Pelamar</option>
                                                   
                                                
                                                    <option value="ditolak" {{($pelamar->status == 'ditolak') ? 'selected' : ''}}>Tahap Selanjutnya</option>
                                                
                                                    <option value="diterima" {{($pelamar->status == 'diterima') ? 'selected' : ''}}>Ditolak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                            <!-- <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Foto</label>
                                </div>
                                <div class="col-auto">
                                    <img src="{{url($pelamar->foto)}}" alt="" width="200" height="200">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Nama</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" value="{{$pelamar->nama_lengkap}}" class="form-control"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" value="{{$pelamar->tanggal_lahir}}" class="form-control"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function putStatus()
    {
        var status = $("#status").val();
        var idPelamar = "{{$pelamar->id}}";
        $.get("{{url('hrd/lamaran/status')}}/"+idPelamar,
        {
            status: status
        },
        function(data) {
            console.log(data);
            if(data.success) {
                window.location.reload();
            }
        });
    }
</script>
@endpush