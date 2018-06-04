
<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require_once __DIR__ . "/vendor/autoload.php";

$mpdf = new \Mpdf\Mpdf();
$table="<table style='width: 100%; border-collapse: collapse;'>
  <tr style='border:1px solid'>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr style='border:1px solid'>
    <td >Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr style='border:1px solid'>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>";
$stylesheet = file_get_contents('pdf.php');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($table,2);
$mpdf->Output();
?>