@extends('layouts.admin')


@section('js')
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
        <form class="forms-sample" action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama Kelas</label>
            <input type="text" class="form-control form-control-sm" name="name" id="nama" placeholder="Jenis Buku" value="{{ old('name') ?? $classroom->name }}" required/>
            @error('name')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="grade">Grade</label>
            <select name="grade" class="form-control form-control-sm" id="grade" required>
              <option value="9" {{ old('grade') ?? $classroom->grade == '9' ? 'selected' : ''}}>9</option>
              <option value="8" {{ old('grade') ?? $classroom->grade == '8' ? 'selected' : ''}}>8</option>
              <option value="7" {{ old('grade') ?? $classroom->grade == '7' ? 'selected' : ''}}>7</option>
            </select>
            @error('grade')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a class="btn btn-light" href="{{ route('classrooms.index') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection