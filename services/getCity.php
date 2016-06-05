<?php
$China = array("Beijing","Shanghai","Hong Kong","Xichang");
$India = array('Chennai','Delhi','Kolkata','Mumbai');
$UK = array('Cambridge','Derby','Liverpool','Oxford');
$US = array('Los Angeles','New York','Chicago','San Diego');
$country = $_GET["district"];
if($country == "Mumbai"){
$cityJSON = json_encode($India);
}else if($country == "Chennai"){
$cityJSON = json_encode($China);
}else if($country == "Delhi"){
$cityJSON = json_encode($UK);
}else if($country == "Beijing"){
$cityJSON = json_encode($US);
}
 
echo "{Cities=".$cityJSON."}";
?>