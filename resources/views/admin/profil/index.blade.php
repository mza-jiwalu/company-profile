@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <form action="{{url('admin/profil')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                <img src="{{url($user->gambar)}}" class="rounded mx-auto d-block" width="200" height="200">
                <input type="file" name="gambar">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col" width="300" class="float-left">
                                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$user->nama}}">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">NIK</th>
                                <th scope="col" width="300" class="float-left">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$user->nik}}" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col" width="300" class="float-left">
                                    <input type="text" class="form-control" name="jenis_kelamin" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$user->jenis_kelamin}}">
                                </th>
                            </tr>

                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col" width="300" class="float-left">
                                    <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$user->username}}">
                                </th>
                            </tr>

                            <tr>
                                <th scope="col">Role</th>
                                <th scope="col" width="300" class="float-left">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$user->role}}" readonly>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <input type="submit" class="btn btn-primary" value="UPDATE">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@if(session('sukses'))
<script>
    alert('{{session('sukses')}}');
</script>
@endif
@if(session('error'))
<script>
    alert('{{session('error')}}');
</script>
@endif
@endpush
