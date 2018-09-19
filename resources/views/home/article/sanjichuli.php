<?php
include("../DBDA.class.php");
$db = new DBDA();
$pcode = $_POST["pcode"];
$sql = "select * from chinastates where parentareacode='{$pcode}'";
echo $db->strquery($sql,1);