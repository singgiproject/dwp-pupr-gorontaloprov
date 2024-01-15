<?php
// FORMAT TANGGAL INDONESIA
function date_id($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// FORMAT MONTH ID
$monthId = array(
  1 =>   'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember'
);


// Date Id Short
function date_id_short($date)
{
  $timestamp = strtotime($date);
  $day = date('d', $timestamp);
  $month = date('M', $timestamp);
  $year = date('Y', $timestamp);

  $monthMap = array(
    'Jan' => 'Januari',
    'Feb' => 'Februari',
    'Mar' => 'Maret',
    'Apr' => 'April',
    'May' => 'Mei',
    'Jun' => 'Juni',
    'Jul' => 'Juli',
    'Aug' => 'Agustus',
    'Sep' => 'September',
    'Oct' => 'Oktober',
    'Nov' => 'November',
    'Dec' => 'Desember'
  );

  $abbreviatedMonthMap = array(
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mar',
    'Apr' => 'Apr',
    'May' => 'Mei',
    'Jun' => 'Jun',
    'Jul' => 'Jul',
    'Aug' => 'Ags',
    'Sep' => 'Sep',
    'Oct' => 'Okt',
    'Nov' => 'Nov',
    'Dec' => 'Des'
  );

  $formattedMonth = $abbreviatedMonthMap[$month];

  return "$day $formattedMonth $year";
}
