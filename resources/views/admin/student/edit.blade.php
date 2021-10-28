@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
@endsection

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
  });
</script>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" action="{{ route('student-update', $student->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nis">Nomor Induk Siswa</label>
            <input type="text" name="nis" class="form-control form-control-sm" id="nis" placeholder="Nomor Induk Siswa" value="{{ old('nis') ?? $student->nis }}" required/>
            @error('nis')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="namasiswa">Nama Siswa</label>
            <input type="text" class="form-control form-control-sm" name="name" id="namasiswa" placeholder="Nama Lengkap Siswa" value="{{ old('name') ?? $student->name }}" required/>
            @error('name')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="form-control form-control-sm" id="gender" required>
              <option value="MALE" {{ old('gender') ?? $student->gender == 'MALE' ? 'selected' : ''}}>PRIA</option>
              <option value="FEMALE" {{ old('gender') ?? $student->gender == 'FEMALE' ? 'selected' : ''}}>WANITA</option>
            </select>
            @error('gender')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="classroom">Kelas</label>
            <select name="classroom" class="form-control form-control-sm" id="classroom" required>
              @foreach ($classRooms as $classroom)
              <option value="{{$classroom->id}}" {{ old('classroom') ?? $student->class_room_id == $classroom->id ? 'selected' : '' }}>{{$classroom->name}}</option>
              @endforeach
            </select>
            @error('classroom')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="birthplace">Tempat Lahir</label>
            <input type="text" name="birthplace" class="form-control form-control-sm" id="birthplace" placeholder="Tempat Lahir" value="{{ old('birthplace') ?? $student->birth_place }}" required/>
            @error('birthplace')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="birthdate">Tanggal Lahir</label>
            <input type="text" name="birthdate" autocomplete="off" class="form-control form-control-sm datepicker" id="birthdate" value="{{ old('birthdate') ?? $student->birth_date }}" placeholder="Tanggal Lahir" />
            @error('birthdate')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control form-control-sm" name="address" id="alamat" rows="3" placeholder="Alamat Lengkap" required>{{ old('address') ?? $student->address }}</textarea>
            @error('address')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a class="btn btn-light" href="{{ route('student-index') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection