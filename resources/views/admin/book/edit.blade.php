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
        <form class="forms-sample" action="{{ route('books.update', $book->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Judul Buku" value="{{ old('title', $book->title) }}" required/>
            @error('title')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-control form-control-sm numberonly" id="isbn" placeholder="Nomor ISBN" value="{{ old('isbn', $book->isbn) }}" required/>
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
                  <option value="{{ $bookcase->id }}" {{ old('bookcase', $book->bookcase_id) == $bookcase->id ? 'selected' : ''}}>{{ $bookcase->name }}</option>
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
                  <option value="{{ $booktype->id }}" {{ old('booktype', $book->book_type_id) == $booktype->id ? 'selected' : ''}}>{{ $booktype->name }}</option>
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
                <input type="text" class="form-control form-control-sm" name="author" id="author" placeholder="Nama Pengarang" value="{{ old('author', $book->author) }}" required/>
                @error('author')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="publisher">Nama Penerbit</label>
                <input type="text" class="form-control form-control-sm" name="publisher" id="publisher" placeholder="Nama Penerbit" value="{{ old('publisher', $book->publisher) }}" required/>
                @error('publisher')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input type="text" maxlength="4" class="numberonly form-control form-control-sm" name="year" id="year" placeholder="Tahun Terbit" value="{{ old('year', $book->published_year) }}" required/>
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
                <input type="text" class="form-control form-control-sm numberonly" name="page_count" id="page_count" placeholder="Jumlah Halaman" value="{{ old('page_count', $book->page_count) }}" required/>
                @error('page_count')
                <small class="form-text text-danger">{{ $message }}</small>    
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="stock">Jumlah Buku</label>
                <input type="text" class="form-control form-control-sm numberonly" name="stock" id="stock" placeholder="Stok Buku" value="{{ old('stock', $book->stock) }}" required/>
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
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a class="btn btn-light" href="{{ route('books.index') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection