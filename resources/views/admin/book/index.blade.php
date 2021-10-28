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
// dd($book)
@endphp
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#add-modal" class="btn btn-inverse-primary btn-fw">Tambah Buku</button>
        <div class="table-responsive">
          <table class="table table-striped table-sm my-3">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Jeisbn</th>
                <th>Pengarang</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $i => $book)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{ $book->title }}<br/><small>ISBN: {{ $book->isbn }}</small></td>
                <td>{{ $book->publisher }}<br/>({{ $book->published_year }})</td>
                <td>{{ $book->bookType->name ?? 'Tidak Spesifik' }}<br/><small>Rak: {{ $book->bookcase->name }}</small></td>
                <td>{{ $book->author }}<br/><small>{{ $book->page_count }} Halaman</small></td>
                <td>{{ $book->stock }} buah</td>
                <td>{{ $book->condition }}</td>
                <td>
                  <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-outline-primary btn-sm" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="mdi mdi-printer"></i></a>
                  <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="mdi mdi-pencil"></i></a>
                  <form style="display: inline" action="{{ route('books.destroy', $book->id) }}" method="post">
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
        <h4 class="modal-title">Tambah Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form class="forms-sample" action="{{ route('books.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Judul Buku" value="{{ old('title') }}" required/>
            @error('title')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-control form-control-sm numberonly" id="isbn" placeholder="Nomor ISBN" value="{{ old('isbn') }}" required/>
                @error('isbn')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="bookcase">Rak Buku</label>
                <select name="bookcase" class="form-control form-control-sm" id="bookcase" required>
                  @foreach ($bookcases as $bookcase)
                  <option value="{{ $bookcase->id }}" {{ old('bookcase') == $bookcase->id ? 'selected' : ''}}>{{ $bookcase->name }}</option>
                  @endforeach
                </select>
                @error('bookcase')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="booktype">Jenis Buku</label>
                <select name="booktype" class="form-control form-control-sm" id="booktype" required>
                  @foreach ($booktypes as $booktype)
                  <option value="{{ $booktype->id }}" {{ old('booktype') == $booktype->id ? 'selected' : ''}}>{{ $booktype->name }}</option>
                  @endforeach
                </select>
                @error('booktype')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="author">Pengarang</label>
                <input type="text" class="form-control form-control-sm" name="author" id="author" placeholder="Nama Pengarang" value="{{ old('author') }}" required/>
                @error('author')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="publisher">Nama Penerbit</label>
                <input type="text" class="form-control form-control-sm" name="publisher" id="publisher" placeholder="Nama Penerbit" value="{{ old('publisher') }}" required/>
                @error('publisher')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input type="text" maxlength="4" class="numberonly form-control form-control-sm" name="year" id="year" placeholder="Tahun Terbit" value="{{ old('year') }}" required/>
                @error('year')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>  
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="page_count">Jumlah Halaman</label>
                <input type="text" class="form-control form-control-sm numberonly" name="page_count" id="page_count" placeholder="Jumlah Halaman" value="{{ old('page_count') }}" required/>
                @error('page_count')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="stock">Jumlah Buku</label>
                <input type="text" class="form-control form-control-sm numberonly" name="stock" id="stock" placeholder="Stok Buku" value="{{ old('stock') }}" required/>
                @error('stock')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="condition">Kondisi Buku</label>
                <select name="condition" class="form-control form-control-sm" id="condition" required>
                  <option value="GOOD">GOOD</option>
                  <option value="BAD">BAD</option>
                </select>
                @error('condition')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Tambahkan </button>
          <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection