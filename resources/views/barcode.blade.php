<table border="1">
  <tr>
    <td style="spadding-bottom: 400px">C128</td>
    <td>{!! DNS1D::getBarcodeHTML('QASA4123232323', 'C128',2,10, '#e22', true) !!}</td>
  </tr>
  <tr>
    <td>C128</td>
    <td>{!! DNS1D::getBarcodeHTML('QASA4123232323', 'C128',2,20, '#e22', true) !!}</td>
  </tr>
  <tr>
    <td>C128</td>
    <td>{!! DNS1D::getBarcodeHTML('QASA4123232323', 'C128',2,30, '#e22', true) !!}</td>
  </tr>
  <tr>
    <td>C128</td>
    <td>{!! DNS1D::getBarcodeHTML('QASA4123232323', 'C128',2,40, '#e22', true) !!}</td>
  </tr>
  
</table>
<table border="1">
<tr>
  <td>PNG</td>
  <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG('QASA4123232323', 'c128', 2,30, array(243,2,2), true)}}" alt="barcode"   /></td>
</tr>
</table>