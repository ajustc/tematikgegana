<?php
include "koneksi.php";

function query($query)
{
    global $koneksi;
    $rows = array();
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($rows, $row);
    }

    return $rows;
}
