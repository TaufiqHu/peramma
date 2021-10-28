@extends('layouts.admin')

@section('js')
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
// dd($booktype)
@endphp
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#add-modal" class="btn btn-inverse-primary btn-fw">Tambah Jenis Buku</button>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Buku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($booktypes as $i => $booktype)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{ $booktype->name }}</td>
                <td>
                  <a href="{{ route('booktypes.edit', ['booktype' => $booktype->id]) }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-pencil"></i></a>
                  <form style="display: inline" action="{{ route('booktypes.destroy', $booktype->id) }}" method="post">
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
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      
      
      <!-- Modal body -->
      <div class="modal-body">
        <form class="forms-sample" action="{{ route('booktypes.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="jenis">Jenis Buku</label>
            <input type="text" class="form-control form-control-sm" name="name" id="jenis" placeholder="Jenis Buku" value="{{ old('name') }}" required/>
            @error('name')
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