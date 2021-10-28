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
        <form class="forms-sample" action="{{ route('booktypes.update', $booktype->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Jenis Buku</label>
            <input type="text" class="form-control form-control-sm" name="name" id="nama" placeholder="Jenis Buku" value="{{ old('name') ?? $booktype->name }}" required/>
            @error('name')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a class="btn btn-light" href="{{ route('booktypes.index') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection