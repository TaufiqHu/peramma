@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
@endsection

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    @if($errors->any())
    $('#add-modal').modal('show');
    @endif

    $('.btn-delete').on('click', function(e){
      e.preventDefault();
      let btn = $(this);
      Swal.fire({
        title: 'Yakin?',
        text: "Data akan dihapus dari database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          btn.parent('form').submit();
        }
      })
    })
    
  });
</script>
@endsection
@section('content')
@php
// dd($student)
@endphp
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#add-modal" class="btn btn-inverse-primary btn-fw">Tambah Siswa</button>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $i => $student)
              <tr>
                <td>{{$i+1}}</td>
                <td class="py-1">
                  <img src="{{ asset('images/photos/'.$student->photo) }}" alt="photo" />
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->classRoom->name }}</td>
                <td>
                  <a href="{{ route('student-show', ['student' => $student->id]) }}" class="btn btn-outline-primary btn-sm" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="mdi mdi-printer"></i></a>
                  <a href="{{ route('student-edit', ['student' => $student->id]) }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-pencil"></i></a>
                  <form style="display: inline" action="{{ route('student-destroy', $student->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete"></i></button>
                  </form>
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
<!-- The Modal -->
<div class="modal fade" id="add-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Siswa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form class="forms-sample" action="{{ route('student-store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="nis">Nomor Induk Siswa</label>
            <input type="text" name="nis" class="form-control form-control-sm" id="nis" placeholder="Nomor Induk Siswa" value="{{ old('nis') }}" required/>
            @error('nis')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="namasiswa">Nama Siswa</label>
            <input type="text" class="form-control form-control-sm" name="name" id="namasiswa" placeholder="Nama Lengkap Siswa" value="{{ old('name') }}" required/>
            @error('name')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="form-control form-control-sm" id="gender" required>
              <option value="MALE" {{ old('gender') == 'MALE' ? 'selected' : ''}}>PRIA</option>
              <option value="FEMALE" {{ old('gender') == 'FEMALE' ? 'selected' : ''}}>WANITA</option>
            </select>
            @error('gender')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="classroom">Kelas</label>
            <select name="classroom" class="form-control form-control-sm" id="classroom" required>
              @foreach ($classRooms as $classroom)
              <option value="{{$classroom->id}}" {{ old('classroom') == $classroom->id ? 'selected' : '' }}>{{$classroom->name}}</option>
              @endforeach
            </select>
            @error('classroom')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="birthplace">Tempat Lahir</label>
            <input type="text" name="birthplace" class="form-control form-control-sm" id="birthplace" placeholder="Tempat Lahir" value="{{ old('birthplace') }}" required/>
            @error('birthplace')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="birthdate">Tanggal Lahir</label>
            <input type="text" name="birthdate" autocomplete="off" class="form-control form-control-sm datepicker" id="birthdate" value="{{ old('birthdate') }}" placeholder="Tanggal Lahir" />
            @error('birthdate')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="address" id="alamat" rows="3" placeholder="Alamat Lengkap" required> {{ old('address') }}</textarea>
            @error('address')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Tambahkan </button>
          <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection