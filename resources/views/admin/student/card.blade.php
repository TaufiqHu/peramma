<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>{{ $title ?? 'Cetak Kartu Anggota' }} | SMPN 4 Palopo</title>
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
        margin: 10mm 5mm 20mm 5mm; 
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
    <table>
      <tbody>
        <tr>
          <td>
            <table style="border: 1px solid;width:100mm;height:70mm;" >
              <tbody>
                <tr>
                  <td style="width: 18mm;padding:10px 10px 6px 10px;"><img src="{{ asset('images/logo-smp4palopo.jpeg') }}" alt="Logo" style="width:15mm">
                  </td>
                  <td style="padding: 14px 10px 6px 10px;" colspan="3">
                    <h3 style="margin-bottom:1px;font-size: 1.05rem;">PERPUSTAKAAN SMPN 4 PALOPO</h3>
                    <p style="font-size: 11.5px;margin-bottom:0px;">Alamat : Jl. Andi Kambo, Malatuntung, Wara Timur, Kota Palopo</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: center;padding: 0px 5px;">
                    <hr style="margin-top: 0px;border-top: 2px solid;"/>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: center; padding-bottom:10px;">
                    <b style="font-size: 14px">
                      <u style="display: block">KARTU ANGGOTA</u>
                    </b>
                    <strong>NIS : {{ $student->nis }}</strong>
                  </td>
                </tr>
                <tr>
                  <td rowspan="5" class="pl-2"><img src="{{ asset('images/photos/'.$student->photo) }}" style="width: 60px; height: 80px">
                  </td>
                  <td>Nama</td>
                  <td style="px-1">&nbsp;:&nbsp;</td>
                  <td><b>{{ $student->name }}</b></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td style="px-1">&nbsp;:&nbsp;</td>
                  <td><b>{{ $student->classRoom->name ?? '-' }}</b></td>
                </tr>
                <tr>
                  <td>T T L</td>
                  <td style="px-1">&nbsp;:&nbsp;</td>
                  <td><b>{{ $student->birth_place.", ".date('d F Y', $student->birt_date) }}</b></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td style="px-1">&nbsp;:&nbsp;</td>
                  <td><b style="word-wrap: break-word;">{{ Str::limit($student->address ?? '-', 80, '..') }}</b></td>
                </tr>
                <tr>
                  <td>J K</td>
                  <td style="px-1">&nbsp;:&nbsp;</td>
                  <td><b>{{ $student->gender == 'FEMALE' ? 'PRIA' : "WANITA" }}</b></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center py-2 barcode">
                    {!! DNS1D::getBarcodeHTML($student->nis, 'C128',2,30) !!}
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td class="px-2"></td>
          <td>
            <table style="border: 1px solid;width:100mm;height:70mm;" >
              <tbody>
                <tr>
                  <td class="px-3 py-3">
                    <div>
                      <ul style="list-style-type: disclosure-closed;">
                        <li>
                          <p style="margin: 0;line-height:1.2;font-size:12px">Kartu ini wajib dibawa pada saat peminjaman atau pengembalian bahan pustaka</p>
                        </li>
                        <li>
                          <p style="margin: 0;line-height:1.2;font-size:12px">Kartu anggota hanya dapat dipergunakan oleh pemiliknya</p>
                        </li>
                        <li>
                          <p style="margin: 0;line-height:1.2;font-size:12px">Apabila kartu ini hilang atau rusak segera lapor ke perpustakaan. Untuk penggantian dikenakan biaya administrasi</p>
                        </li>
                      </ul>
                      <div class="text-center pt-2">
                        <h6 style="font-size: 12px;">KA Perpustakaan</h6>
                        <div style="padding-top: 50px">
                          <h6 style="font-size: 11px;margin-bottom:1px">Asmiati, S.Sos</h6>
                          <span>NIP. 19670316 198603 2 004</span>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    {{-- Nama : {{ $student->name }}
    Nama : {{ $student->nis }}
    Nama : {{ $student->photo }}
    Nama : {{ $student->name }} --}}
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js ')}}"></script>
</body>
</html>
