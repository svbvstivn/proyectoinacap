<?php
include "conexion.php";

$columns = array( 
// datatable column index  => database column name
    0 => 'id',
    1 => 'name',
    2 => 'email',
    3 => 'email',
    4 => 'email',
    5 => 'email',
    6 => 'email',
    7 => 'email',
);

$sql = "SELECT * FROM test_table";
$rest = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
$dataArray = array();
while( $row = mysqli_fetch_array($rest) ) {


    $dataArray[] = $row["Id"];
    $dataArray[] = $row["usuario"];
    $dataArray[] = $row["email"];
    $dataArray[] = $row["email"];
    $dataArray[] = $row["email"];
    $dataArray[] = $row["email"];
    $dataArray[] = $row["email"];
    $dataArray[] = $row["email"];


}

echo json_encode($dataArray);

?>