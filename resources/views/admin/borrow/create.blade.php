@extends('layouts.admin')
@section('css')
<style>
  #student-show table td{
    vertical-align: top;
  }

  .table tr>th{
    border: none
  }
</style>
@endsection
@section('js')
<script>
  $(document).ready(function(){
    const months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const maxBook = {{ $setting->max_item }}
    const photoUrl = "{{ asset('images/photos/') }}"

    let studentInputFocus = false;
    let bookInputFocus = false;
    let selectedBook = [];
    let selectedStudent = null;

    $('button#student-edit').on('click', function(){
      $('#student-show').hide();
      $('#student-input').show();
      $('#nis').select();
      setStudent(null);
      studentInputFocus = true;
    });

    function setStudent(value){
      selectedStudent = value;
      $('input#student').val(value);
    }
    
    function formatDate(stringDate){
      let dates = stringDate.split('-');
      return `${parseInt(dates[2])} ${months[parseInt(dates[1])]} ${dates[0]}`;
    }

    function getStudent(nis){
      $.ajax({
        url: `{{ route('api.students.prefix') }}/${nis}`,
        method: 'get',
        dataType: 'json',
        success: function(resp){
          $('#student-nis-info').hide();
          if(resp.status){
            let student = resp.data;
            $('#nis').val('');
            $('#student-photo').attr('src', photoUrl + `/${student.photo}`);
            $('#student-name').html(student.name);
            $('#student-nis').html(student.nis);
            $('#student-address').html(student.address ?? 'Not Set');
            $('#student-birth').html(student.birth_place + ", " + formatDate(student.birth_date));
            $('#student-show').show();
            $('#student-input').hide();
            $('#isbn').focus().select();
            setStudent(student.id);
          }else{
            $('#student-nis-info').html(resp.message).show();
          }
        },error: function(a, b){
          
        }
      })
    }

    function setInputBook(){
      bookContent = ``;
      selectedBook.forEach((bookId) => {
        bookContent += `<input type="hidden" name="books[]" value="${bookId}" />`;
      })
      $('#input-books').html(bookContent)
    }

    function addBook(book){
      if(selectedBook.length >= 3){
        alert(`Jumlah buku yang boleh dipinjam adalah ${maxBook} buah`)
        return false;
      }
      // if(selectedBook.indexOf(book.id) > -1){ //Uncomment jika tidak boleh pinjam 1 judul lebih dari 1
      //   alert('Buku sudah diinputkan.')
      //   return false;
      // }

      selectedBook.push(book.id)
      let content = `<tr><td><button class="btn btn-danger btn-sm delete-book" data-id="${book.id}"><i class="mdi mdi-window-close"></i></button></td><td><strong>${book.title}</strong><br>ISBN: ${book.isbn}</td><td><strong>${book.publisher}</strong><br>Tahun: ${book.published_year}</td></tr>`;
      $('#book-row').append(content);
      setInputBook()
    }

    function getBook(isbn){
      $.ajax({
        url: `{{ route('api.books.prefix') }}/${isbn}`,
        method: 'get',
        dataType: 'json',
        success: function(resp){
          // $('#student-nis-info').hide();
          if(resp.status){
            let book = resp.data;
            // add book
            addBook(book);
            $('input#isbn').val('').focus();
          }else{
            $('#book-isbn-info').html(resp.message).show();
          }
        },error: function(a, b){
          
        }
      })
    }

    $('input#nis').on('keypress', function(e){
      let nis = $(this).val();
      if(e.keyCode == 13){
        getStudent(nis)
      }else if(nis.length == 10){
        getStudent(nis)
      }
    });
    
    $('input#isbn').on('keypress', function(e){
      let isbn = $(this).val();
      if(e.keyCode == 13){
        getBook(isbn)
      }else if(isbn.length == 13){
        getBook(isbn)
      }
    });
    
    $('body').on('click', 'button.delete-book', function(e){
      e.preventDefault();
      
      let btn = $(this);
      let bookId = btn.data('id');
      let tr = btn.closest('tr');
      tr.hide('slow', () => {
        tr.remove();
        idx = selectedBook.indexOf(bookId);
        if (idx > -1) {
          selectedBook.splice(idx, 1);
        }
        setInputBook()
      })
    })

    $('button#submit-button').on('click', function(e){
      e.preventDefault();
      let submitBtn = $(this);
      if(selectedStudent == null){
        alert('Anda belum memasukkan data peminjam!')
      }else if(selectedBook.length == 0){
        alert('Anda belum memasukkan buku yang akan dipinjam!')
      }else if(confirm('Pengajuan peminjaman akan disimpan. Lanjutkan?')){
        submitBtn.closest('form').submit();
      }
    })

    $('#nis').focus();
  });
</script>
@endsection
@section('content')
<strong id="debug"></strong>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" id="student-input">
        <div class="form-group">
          <label for="fine">SCAN KARTU ANGGOTA</label>
          <input maxlength="10" type="text" id="nis" class="form-control form-control-sm numberonlys" placeholder="Scan Kartu Anggota atau Input NIS Siswa">
          <small class="form-text text-danger" id="student-nis-info"></small>
        </div>
      </div>
      <div class="card-body pb-0" id="student-show" style="display: none">
        <button type="button" id="student-edit" class="mb-2 btn btn-inverse-danger btn-fw" style="position: absolute;right:0px;top:0px;">Ubah Siswa</button>
        <div class="table-responsive">
          <table>
            <tbody>
              <tr>
                <td rowspan="4" style="width: 180px"><img src="" alt="Photo" style="width: 120px" id="student-photo"></td>
                <td class="pr-3">Nama</td>
                <td class="pr-1">:</td>
                <td><strong id="student-name"></strong></td>
              </tr>
              <tr>
                <td class="pr-3">NIS</td>
                <td class="pr-1">:</td>
                <td><strong id="student-nis"></strong></td>
              </tr>
              <tr>
                <td class="pr-3">TTL</td>
                <td class="pr-1">:</td>
                <td><strong id="student-birth"></strong></td>
              </tr>
              <tr>
                <td class="pr-3">ALAMAT</td>
                <td class="pr-1">:</td>
                <td><strong id="student-address"></strong></td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr class="py-1">
      </div>
      <div class="card-body" id="book-show">
        <div class="table-responsive">
          <div class="form-group" id="isbn-input">
            <label for="fine">SCAN BUKU</label>
            <input maxlength="13" type="text" id="isbn" class="form-control form-control-sm numberonlys" placeholder="Scan Buku yang ingin dipinjam">
            <small class="form-text text-danger" id="book-isbn-info"></small>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Penerbit</th>
              </tr>
            </thead>
            <tbody id="book-row">
            </tbody>
          </table>
        </div>
      </div>
      
      <form action="{{ route('lends.store') }}" method="post">
        @csrf
        <input type="hidden" name="student" id="student" required>
        <div class="hidden" id="input-books"></div>
        <button type="submit" class="m-4 btn btn-primary mr-2" id="submit-button"> SUBMIT </button>
      </form>
    </div>
  </div>
</div>
@endsection