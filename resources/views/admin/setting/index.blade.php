@extends('layouts.admin')

@section('js')
<script>
  $(document).ready(function(){
    @if($errors->any())
    $('#add-modal').modal('show');
    @endif
    
  });
</script>
@endsection
@section('content')
@php
// dd($bookcase)
@endphp
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#add-modal" class="btn btn-inverse-primary btn-fw">Edit</button>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Pengaturan</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Maximal Buku yang dapat dipinjam</td>
                <td>{{ $setting->max_item }} Buku</td>
              </tr>
              <tr>
                <td>Maximal Waktu peminjaman</td>
                <td>{{ $setting->max_day }} Hari</td>
              </tr>
              <tr>
                <td>Denda Keterlambatan</td>
                <td>Rp.{{ number_format($setting->fine_per_day) }} per hari</td>
              </tr>
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
        <form class="forms-sample" action="{{ route('setting.update', $setting->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="maxbook">Maximal Buku yang dapat dipinjam</label>
            <input type="text" class="form-control form-control-sm numberonly" name="max_item" id="maxbook" placeholder="Maximal Buku yang dapat dipinjam" value="{{ old('max_item') ?? $setting->max_item }}" required/>
            @error('max_item')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="maxday">Maximal Waktu peminjaman (hari)</label>
            <input type="text" class="form-control form-control-sm numberonly" name="max_day" id="maxday" placeholder="Maximal Waktu peminjaman dalam hari" value="{{ old('max_day') ?? $setting->max_day }}" required/>
            @error('max_day')
            <small class="form-text text-danger">{{ $message }}</small>    
            @enderror
          </div>
          <div class="form-group">
            <label for="fine">Denda Keterlambatan</label>
            <input type="text" class="form-control form-control-sm numberonly" name="fine" id="fine" placeholder="Denda keterlambatan (perhari)" value="{{ old('fine') ?? $setting->fine_per_day }}" required/>
            @error('fine')
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