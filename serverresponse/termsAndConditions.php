<?php
include("../include/dbconnection.php");
// `city`.`cityName`,
$aColumns = array("rowNumber", "title", "value",  "action",);
$businessRow = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `termsandcondition`"));
$sIndexColumn = "rowNumber";
$sTable = "
		(
			SELECT
				(SELECT @rownum := @rownum + 1 FROM ( SELECT @rownum := 0 ) AS `rowtable`) AS `rowNumber`,
				`termsandcondition`.*
				FROM
				(
					SELECT
				
					`termsandcondition`.`title`,`termsandcondition`.`value` , 
			
				

			
				CONCAT('
				<a href=\"../Terms-And-Conditions/?Id=',`termsandcondition`.`termsandconditionId`,'\" style=\"width: 30px;height: 30px;\" title=\"edit\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-info\"><i class=\"fas fa-edit\"></i></a>
				<button onclick=\"deleteT(',`termsandcondition`.`termsandconditionId`,')\" style=\"width: 30px;height: 30px; margin-right:5px;\" title=\"delete\" data-toggle=\"tooltip\" data-theme=\"dark\" data-placement=\"right\" class=\"btn btn-icon btn-danger\"><i class=\"fa fa-trash\"></i></button>')			
			 AS `action`
						FROM `termsandcondition`
					
					
						WHERE
						`termsandcondition`.`delete`!='1'   ORDER BY `termsandcondition`.`termsandconditionId` DESC

				) AS `termsandcondition`
		) AS `termsandcondition`";


$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
	$sLimit = "LIMIT " . mysqli_real_escape_string($connection, $_GET['iDisplayStart']) . ", " . mysqli_real_escape_string($connection, $_GET['iDisplayLength']);
}

if (isset($_GET['iSortCol_0'])) {
	$sOrder = "ORDER BY  ";
	for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
		if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
			$sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . mysqli_real_escape_string($connection, $_GET['sSortDir_' . $i]) . ", ";
		}
	}

	$sOrder = substr_replace($sOrder, "", -2);
	if ($sOrder == "ORDER BY") {
		$sOrder = "";
	}
}

$sWhere = "";
if ($_GET['sSearch'] != "") {
	$sWhere = "WHERE (";
	for ($i = 0; $i < count($aColumns); $i++) {
		$sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($connection, $_GET['sSearch']) . "%' OR ";
	}
	$sWhere = substr_replace($sWhere, "", -3);
	$sWhere .= ')';
}

for ($i = 0; $i < count($aColumns); $i++) {
	if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
		if ($sWhere == "") {
			$sWhere = "WHERE ";
		} else {
			$sWhere .= " AND ";
		}
		$sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($connection, $_GET['sSearch_' . $i]) . "%' ";
	}
}

$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
$rResult = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));

$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable
	";
$rResultTotal = mysqli_query($connection, $sQuery) or die(mysqli_error($connection));
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];

$output = array(
	"sEcho" => intval($_GET['sEcho']),
	"iTotalRecords" => $iTotal,
	"iTotalDisplayRecords" => $iFilteredTotal,
	"aaData" => array()
);

$sr = 1;
while ($aRow = mysqli_fetch_array($rResult)) {
	$row = array();
	for ($i = 0; $i < count($aColumns); $i++) {
		if ($aColumns[$i] != ' ') {
			$row[] = $aRow[$aColumns[$i]];
		}
	}
	$output['aaData'][] = $row;
}

echo json_encode($output);
