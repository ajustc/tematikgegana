<?php

function getTableData($koneksi, $tableName, $page = 1, $limit = 20)
{
	$dataTable = array();
	$startRow = ($page - 1) * $limit;
	$query = mysqli_query($koneksi, "SELECT * FROM " . $tableName . " LIMIT " . $startRow . ", " . $limit);

	while ($data = mysqli_fetch_assoc($query))
		array_push($dataTable, $data);

	return $dataTable;
}

function showPagination($koneksi, $tableName, $limit = 20)
{
	$countTotalRow = mysqli_query($koneksi, 'SELECT COUNT(*) AS total FROM `' . $tableName . '`');
	$queryResult = mysqli_fetch_assoc($countTotalRow);
	$totalRow = $queryResult['total'];

	$totalPage = ceil($totalRow / $limit);

	$page = 1;
	while ($page <= $totalPage) {
		echo '<li><a href="?page=' . $page . '&perPage=' . $limit . '">' . $page . '</a></li>';
		if ($page < $totalPage)
			echo "&nbsp";
		$page++;
	}
}
