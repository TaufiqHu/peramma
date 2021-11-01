<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>{{ $title ?? 'Cetak Barcode Buku' }} | SMPN 4 Palopo</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}">
  <style>
    @page {
      size: 21cm 29.7cm;
      margin: 10mm 5mm 20mm 5mm;
      /* change the margins as you want them to be. */
    }
    body{
      padding: 20px 30px
    }
    @media print {
      body{
        width: 21cm;
        height: 29.7cm;
        margin: 5mm 5mm 10mm 5mm; 
        /* change the margins as you want them to be. */
      } 
    }
    table {
      font-size: 10px;
      font-family: arial
    }
    
    tr,td {
      vertical-align: top;
      padding: 0px
    }
    .barcode>div{
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <table class="text-center" style="border: 1px solid;width:50mm;height:20mm;">
      <tbody>
        <tr>
          <td class="pt-1">
            <strong>{{ $book->title }}</strong>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: bottom">
            <div class="barcode">{!! DNS1D::getBarcodeHTML($book->isbn, 'C128',1,30) !!}</div>
          </td>
        </tr>
        <tr>
          <td  style="vertical-align: top">{{ $book->isbn }}</td>
        </tr>
      </tbody>
    </table>
    {{-- Nama : {{ $book->name }}
    Nama : {{ $book->nis }}
    Nama : {{ $book->photo }}
    Nama : {{ $book->name }} --}}
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js ')}}"></script>
</body>
</html>
