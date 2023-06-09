@extends('layouts.main')

@section('title', 'Profile')

<!-- Start: Sidebar -->
@section('card-profile')
    <a href="{{ route('profile-admin') }}" class="to-profile">
        <div class="d-flex card-profile p-2">
            <div class="avatar-profile">
                <img src="{{ asset('Template-Dashboard/img/profile-reggy.jpg') }}" alt="" >
            </div>
            <div class="info-profile">
                @if (Auth::user()->role = 1)
                    <small>Admin</small>
                @else
                    <small>Anggota</small>
                @endif
                <br>
                @php
                    $data = Auth::user()->name;
                    $name = implode(" ", array_slice(explode(" ", $data), 0, 2));
                @endphp
                <span>{{ $name }}</span>
            </div>
        </div>
    </a>
@endsection

@section('dashboard')
    <li class="sidebar-menu-item ">
        <a href="{{ route('dashboard-admin') }}">
            <i class="ri-dashboard-fill sidebar-menu-item-icon"></i>
            Dashboard
        </a>
    </li>
@endsection

@section('pertanian')
    <li class="sidebar-menu-item ">
        <a href="{{ route('pertanian-admin') }}" class="">
            <i class="ri-file-text-fill sidebar-menu-item-icon"></i>
            Data Pertanian
        </a>
    </li>
@endsection

@section('prediksi')
    <li class="sidebar-menu-item">
        <a href="{{ route('prediksi-admin') }}" class="">
            <i class="ri-file-chart-fill sidebar-menu-item-icon"></i>
            Prediksi Panen
        </a>
    </li>
@endsection

@section('kriteria')
    <li class="sidebar-menu-item ">
        <a href="{{ route('kriteria-admin') }}" class="">
            <i class="ri-file-settings-fill sidebar-menu-item-icon"></i>
            Kriteria
        </a>
    </li>
@endsection

@section('data-anggota')
    <li class="sidebar-menu-item active">
        <a href="{{ route('get-anggota') }}" class="">
            <i class="ri-file-user-fill sidebar-menu-item-icon"></i>
            Data Anggota
        </a>
    </li>
@endsection

@section('profile')
    <li class="sidebar-menu-item ">
        <a href="{{ route('profile-admin') }}" class="">
            <i class="ri-user-settings-fill sidebar-menu-item-icon"></i>
            Profile
        </a>
    </li>
@endsection
<!-- End: Sidebar -->

@section('navbar')
    <nav class="px-3 py-2 bg-white rounded shadow-sm">
        <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
        <h5 class="fw-bold mb-0 me-auto p-1">Data Users</h5>
    </nav>
@endsection

<!-- Start: Content -->
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <small class="fw-bold">Data Anggota</small>
        <div class="">
            <a class="btn btn-primary btn-sm d-flex" data-bs-toggle="modal" data-bs-target="#tambahAnggota">
                <i class="ri-add-fill mr-2"></i>
                Tambah Data
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="mt-0 table-sm table-responsive">
            <table id="tabelAnggota" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No.Hp</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ( $adataUsers as $data  )
                <tbody>
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td > {{ $data->name }} </td>
                        <td> {{ $data->nik }} </td>
                        <td> {{ $data->no_hp }} </td>
                        <td> {{ $data->alamat }} </td>
                        <td> {{ $data->email }} </td>
                        <td> {{ $data->role }}</td>
                        <td>
                            <div class="text-decoration-none">
                                <div class="d-flex mb-2 btn-group">
                                    <a href="" class="btn btn-sm btn-success" style="color: beige">Edit</a>
                                </div>
                                <div class="d-flex btn-group">
                                    <a href="" class="btn btn-sm btn-danger" style="font-size: 0.80rem; color: beige">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
    <div class="modal fade" id="tambahAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Anggota Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('add-anggota') }}" method="POST" id="formAnggota">
                    <div class="modal-body">
                        @csrf
                        <div class="info-profil row">
                            <div class="col-md-12 mb-3 form-floating">
                                <input type="text" class="form-control" placeholder="Masukan nama lengkap" id="floatingNama" name="name">
                                <label for="floatingNama" style="margin-left: 10px">Nama Lengkap</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <input type="number" class="form-control" placeholder="Masukan NIK" id="floatingNIK" name="nik">
                                <label for="floatingNIK" style="margin-left: 10px">NIK (Nomor Induk Kependudukan)</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <input type="number" class="form-control" placeholder="Masukan NO HP" id="floatingNoHP" name="no_hp">
                                <label for="floatingNoHP" style="margin-left: 10px">No HP</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <input type="email" class="form-control" placeholder="Masukan Email" id="floatingEmail" name="email">
                                <label for="floatingEmail" style="margin-left: 10px">Email</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <textarea type="text" class="form-control" placeholder="Masukan Alamat" id="floatingAlamat" name="alamat"></textarea>
                                <label for="floatingAlamat" style="margin-left: 10px">Alamat</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="" name="role">
                                    <option selected>Pilih Role</option>
                                    <option value="0">Anggota</option>
                                    <option value="1">Admin</option>
                                </select>
                                <label for="floatingSelect" tyle="margin-left: 20px">ROLE</label>
                            </div>
                            <div class="col-md-12 mb-3 form-floating">
                                <input type="password" class="form-control" placeholder="Masukan Alamat" id="floatingPass" name="password">
                                <label for="floatingPass" style="margin-left: 10px">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addAnggota">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="successMessage"></p>
                </div>
            </div>
        </div>
    </div>

@section('script')
<script>
    // $(document).ready(function(){
    //     tampilAnggota();
    // })

    // function tampilAnggota(){
    //     $('tbody').html('');
    //     $.ajax({
    //         url : "{{ route('get-anggota') }}",
    //         method : 'GET',
    //         dataType : 'json',
    //         success : function(data){
    //             $.each(data, function(key, values){
    //                 name = data[key].name;
    //                 nik = data[key].nik;
    //                 no_hp = data[key].no_hp;
    //                 alamat = data[key].alamat;
    //                 email = data[key].email;
    //                 role = data[key].role;

    //                 console.log(values);

    //                 $('tbody').apped('<tr>\
    //                         <td>'+parsInt(key+1)+'</td>\
    //                         <td>'+name+'</td>\
    //                         <td>'+nik+'</td>\
    //                         <td>'+no_hp+'</td>\
    //                         <td>'+alamat+'</td>\
    //                         <td>'+email+'</td>\
    //                         <td>'+role+'</td>\
    //                     </tr>');
    //             });
    //         }
    //     });
    // }
</script>
@endsection

@endsection
<!--End: Content -->
