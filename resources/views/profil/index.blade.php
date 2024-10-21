@extends('layouts.template')

@section('content')

<style>
    .profile-image-container {
      display: flex;
      flex-direction: column;
      align-items: center;
  }

  .profile-user-img {
      width: 200px;
      height: 200px;
      object-fit: cover;
  }

  .ubah-foto-btn {
      margin-top: 10px;
  }
</style>

<div class="container-fluid">
  <div class="row justify-content-center">
    <!-- Profile Section -->
    <div class="col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="profile-image-container">
              <img class="profile-user-img img-fluid" src="{{ route('profil.image') }}" alt="User profile picture">
            </div>
            <p class="text-muted text-center"></p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Username</b> <p class="float-right">{{ auth()->user()->username }}</p>
                </li>
                <li class="list-group-item">
                    <b>Level</b> <p class="float-right">{{ auth()->user()->level->level_nama }}</p>
                </li>
                <li class="list-group-item">
                    <b>Nama</b> <p class="float-right">{{ auth()->user()->nama }}</p>
                </li>
            </ul>

            <div class="float-left">
              <a class="btn btn-sm btn-primary mt-1" href="{{ url('/profil/edit_profil') }}">Ubah Profil</a>
            </div>
            <div class="card-tools float-right">
                <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" class="btn btn-success btn-sm mt-2 ubah-foto-btn">Ubah Foto</button>
                  <input type="file" id="upload_foto" name="foto" accept="image/*" class="form-control">
                </form>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#edit-pass" data-toggle="tab">Ubah Password</a>
            </li>
          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="edit-pass">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputUser" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPass" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPass" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>

@endsection