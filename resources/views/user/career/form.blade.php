@extends('user.master')
@push('css')
<!-- <link href="{{ asset('user/css/styles.css') }}" rel="stylesheet"> -->
<link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
@endpush
@section('content')
<div class="page">
    <main id="main-splash" class="splash-slider main-page"
        style="height: auto !important; min-height: auto !important;">

        <!-- Swiper -->
        <div class="swiper-container" style="height: auto !important;">
            <div class="swiper-wrapper">

                <div class="swiper-slide height-half"
                    style="background-image: url({{ asset('user/uploads/contact-splash.jpg') }});">
                    <div class="overlayed text-white" style="width: 100%;">
                        <div class="featured-content-meta">
                            <ul class='post-meta'>
                                <li><span class='post-meta-key'>Globe:</span> <img class="img-fluid img-56-vw"
                                        src="{{ asset('user/uploads/armas-globe-white-big.svg') }}" /></li>
                            </ul>
                        </div>
                        <div class="featured-content-paragraph">
                        </div>
                    </div>
                </div>

            </div>
            <!-- Add Pagination -->
            <!-- Add Arrows -->
            <div class="swiper-button-next text-right" id="real-swp-next" style="opacity: 0"><i
                    class="fal fa-arrow-right text-white"></i></div>
            <div class="swiper-button-prev text-left" id="real-swp-prev" style="opacity: 0"><i
                    class="fal fa-arrow-left text-white"></i></div>
        </div>

    </main>

    <h1 class="text-white akzidenz-condensed-bold about-text-title revealOnScroll" data-animation="fadeInUp">
        Form Lamaran
    </h1>


    <style>
        /* Styles for wrapping the search box */

        .main {
            width: 50%;
            margin: 50px auto;
        }

        /* Bootstrap 4 text input with search icon */

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        html,
        body {
            position: relative;
            height: 100%;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: transparent;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-pagination-fraction,
        .swiper-pagination-custom,
        .swiper-container-horizontal>.swiper-pagination-bullets {
            left: 0;
            right: 0;
            width: auto !important;
            bottom: 1rem !important;
            padding: .25rem;
            position: absolute !important;
            color: white !important;
            text-align: center;
            z-index: 1 !important;
        }

        @media (max-width: 992px) {

            .swiper-pagination-fraction,
            .swiper-pagination-custom,
            .swiper-container-horizontal>.swiper-pagination-bullets {
                left: 1rem !important;
                right: auto !important;
                text-align: left !important;
            }
        }

        .contact-link {
            font-weight: bold !important;
        }
    </style>
    <style>
        .form-select {
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        @media (prefers-reduced-motion:reduce) {
            .form-select {
                transition: none
            }
        }

        .form-select:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25)
        }

        .form-select[multiple],
        .form-select[size]:not([size="1"]) {
            padding-right: .75rem;
            background-image: none
        }

        .form-select:disabled {
            background-color: #e9ecef
        }

        .form-select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #212529
        }

        .form-select-sm {
            padding-top: .25rem;
            padding-bottom: .25rem;
            padding-left: .5rem;
            font-size: .875rem
        }

        .form-select-lg {
            padding-top: .5rem;
            padding-bottom: .5rem;
            padding-left: 1rem;
            font-size: 1.25rem
        }
    </style>

    <div class="container">
        <form action="{{url('career/form')}}/{{$lowonganKerja->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="page-content mt50">
                <div class="row justify-content-center">
                    <img src="https://via.placeholder.com/150" id="preview" width="300" height="400">
                </div>
                <div class="row justify-content-center mt10">
                    <div class="2">
                        <input type="file" class="form-control" accept="image/*" onchange="previewImage(event)"
                            name="foto" required>
                    </div>
                </div>
            </div>
            <div class="page-content mt10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="motijob-sidebar">

                            <div class="job-general-info">
                                <!-- <form action="#"> -->

                                <ul class="list-unstyled job-registration">
                                    <li><strong>Nama lengkap</strong><input type="text" name="nama_lengkap"
                                            placeholder="[khansa lungit]" value="{{session('nama_lengkap')}}">
                                    </li>
                                    <li><strong>Tanggal lahir:</strong><input type="date"
                                            value="{{session('tanggal_lahir')}}" name="tanggal_lahir"
                                            placeholder="[25/06/2002]">
                                    </li>
                                    <li><strong>NIK</strong><input type="text" name="nik" value="{{session('nik')}}"
                                            placeholder="[10999099]">
                                    </li>
                                    <li><strong>Umur:</strong><input type="text" name="umur" value="{{session('umur')}}"
                                            placeholder="[18 tahun]">
                                    </li>
                                    <li><strong>Gender:</strong>
                                        <select class="form-select" name="jenis_kelamin" id="">
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                        </select>

                                    </li>
                                    <li><strong>No Telpon:</strong><input type="text" name="no_tlp"
                                            placeholder="[082262200182]" value="{{session('no_tlp')}}"></li>
                                    <li><strong>E-mail</strong><input type="text" name="email"
                                            placeholder="[admin@gmail.com]" value="{{session('email')}}"></li>

                                    <li><strong>Link Sosial media</strong><input type="text"
                                            placeholder="[admin.biolinky.com]" name="link_sosmed"
                                            value="{{session('link_sosmed')}}"></li>

                                </ul>
                                <!-- </form> -->

                            </div> <!-- end .candidate-general-info -->
                        </div>
                    </div> <!-- end .3col grid layout -->

                    <div class="col-md-6">
                        <div class="motijob-sidebar">
                            <div class="job-general-info">
                                <!-- <div class="job-reg-form"> -->
                                <!-- <form action="#"> -->
                                <!-- <div class="form-banner-button"> -->
                                <ul>
                                    <li><strong>Sudah pernah bekerja?</strong>
                                        <select class="form-select" name="sudah_bekerja" onchange="hideStatusKerja();" id="statusKerja">
                                            <option value="iya">Pernah</option>
                                            <option value="belum">Belum</option>
                                        </select>
                                    </li>
                                    <li class="status"><strong>Terakhir bekerja di PT?</strong><input type="text"
                                            placeholder="[PT.Teknologi]" value="{{session('terakhir_bekerja')}}"
                                            name="terakhir_bekerja"></li>
                                    <li class="status"><strong>Berapa tahun anda bekerja?</strong><input type="text"
                                            placeholder="[3 tahun]" name="lama_bekerja"
                                            value="{{session('lama_bekerja')}}"></li>
                                    <li class="status"><strong>Jabatan terakhir?</strong><input type="text"
                                            placeholder="[Staff acounting]" name="jabatan_terakhir"
                                            value="{{session('jabatan_terakhir')}}"></li> </br>
                                    <li>
                                    <li class="status"><strong>Gaji terakhir?</strong><input type="text" placeholder="[55000000]"
                                            name="gaji_terakhir" value="{{session('gaji_terakhir')}}"></li> </br>
                                    <li>

                                        <form id="form1" name="form1" method="post" action="">
                                        
                                                <strong>Upload CV Anda</strong>
                                                <input class="form-control" type="file" name="cv" required>
                                    </li> </br>
                                    <ol start="1" type="1">
                                                <li>Four Kids,Oliver,Rachel,Sarah,and Todd,were playing upstairs when
                                                    you heard a loud crash.you ran to the room and found
                                                    a broken vase on the floor.when you questioned the kids on who broke
                                                    the vase,they said: <br> "it wasn't me!"screamed oliver <br>
                                                    "it was Oliver!"yalled Rachel <br>"No,it was Rachel,"blamed Sarah
                                                    <br>"Rachel is a liar,"said Todd <br>Patrick,the babysitter who
                                                    liked logic puzzles,told you that only one of them was telling the
                                                    truth.Which of the kids broke the vase?</li>
                                                <br>


                                                <ol start="1" type="a">
                                                    <i>
                                                        <li><input type="radio" name="nilai_soal" value="a">Oliver</li>
                                                        <li><input type="radio" name="nilai_soal" value="b">Rachel</li>
                                                        <li><input type="radio" name="nilai_soal" value="c">Serah</li>
                                                        <li><input type="radio" name="nilai_soal" value="d">Todd</li>
                                                    </i>
                                                </ol>
                                                <br>
                                                <br>
                                </ul>
                                <div class="preview-import pull-left">

                                    <!-- aku coba tambah dua div dibawah ini -->
                                </div>
                            </div>
                        </div> <!-- end .candidate-reg-form -->

                    </div> <!-- end .9col grid layout -->

                </div> <!-- end .row -->
                <center>
                    <div class="save-cancel-button ml20 mt20">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="#" class="btn btn-danger">Cancel</a>
                    </div> <!-- end .save-cancel-button -->
                </center>
        </form>

    </div> <!-- end .page-content -->

    <footer id="footer">

    </footer> <!-- end #footer -->

</div> <!-- end #main-wrapper -->

@endsection
@push('scripts')
<script>
    hideStatusKerja();
    function hideStatusKerja() {
        var statusKerja = $("#statusKerja").val();
        if(statusKerja == "belum") {
            $(".status").hide();
        } else {
            $(".status").show();
        }
    }
</script>
<script>
    const previewImage = e => {
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = () => {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        };
    };
</script>
<script>
    var i = 1;
    $('#addSkill').click(function () {
        i++;
        var skill = $("#skill").val();
        if (skill) {
            $('#listSkill').append('<tr id="row' + i + ' mt5" class="dynamic-added row' + i +
                '"><td><input type="text" value="' + skill +
                '" name="skill[]" placeholder="Skill" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $("#skill").val("");
        } else {
            alert('Pilih Skill terlebih dahulu');
        }
    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('.row' + button_id).remove();
    });
</script>
@if(session('error'))
<script>
    Swal.fire(
        'Error!',
        '{{session('error')}}',
        'error'
    )
</script>
@endif
@endpush