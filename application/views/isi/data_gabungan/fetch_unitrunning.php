<?php
//fetch.php
//panggil koneksi
include 'conn.php';
$column = ["id", "nim", "namam", "jnsm", "jurusanm","kelas","kehadiran","tugasm","utsm","uasm"];
 
$query = "SELECT * FROM mahasiswa ";
 
if (isset($_POST["search"]["value"])) {
    $query .=
        '
     WHERE nim LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
    OR namam LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
    OR jnsm LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
    OR jurusanm LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
    OR kelas LIKE "%' .
        $_POST["search"]["value"] .
        '%"
    OR kehadiran LIKE "%' .
        $_POST["search"]["value"] .
        '%"
    OR tugasm LIKE "%' .
        $_POST["search"]["value"] .
        '%"
    OR utsm LIKE "%' .
        $_POST["search"]["value"] .
        '%"
    OR uasm LIKE "%' .
        $_POST["search"]["value"] .
        '%"
 ';
}
 
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id ASC ';
}
$query1 = '';
 
if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
 
$statement = $connect->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $connect->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
 
$data = [];
foreach ($result as $row) {
    $sub_array = [];
    $sub_array[] = $row['id'];
    $sub_array[] = $row['nim'];
    $sub_array[] = $row['namam'];
    $sub_array[] = $row['jnsm'];
    $sub_array[] = $row['jurusanm'];
    $sub_array[] = $row['kelas'];
    $sub_array[] = $row['kehadiran'];
    $sub_array[] = $row['tugasm'];
    $sub_array[] = $row['utsm'];
    $sub_array[] = $row['uasm'];
    $data[] = $sub_array;
}
 
function count_all_data($connect)
{
    $query = "SELECT * FROM mahasiswa";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
 
$output = [
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
];
 
echo json_encode($output);