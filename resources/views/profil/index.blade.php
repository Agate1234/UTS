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
              <button class="btn btn-sm btn-primary mt-1" onclick="modalAction('{{ url('profil/ubah_data') }}')" >Ubah Profil</button>
              <button class="btn btn-sm btn-warning mt-1" onclick="modalAction('{{ url('profil/ubah_foto') }}')" >Ubah Foto</button>
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
              <form id="form-edit" class="form-horizontal" method="POST" action="{{ route('profil.ubah_pass') }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                  <label for="inputUser" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input value="{{ $user->username }}" type="text" class="form-control" id="inputUser" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPass" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPass" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Submit</button>
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

@push('js')
    <script>
        function modalAction(url = ''){
            $('#myModal').load(url,function(){
                $('#myModal').modal('show');
            });
        }

        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    password: {
                        minlength: 6,
                        maxlength: 20
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataUser.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush