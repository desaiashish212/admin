<?php
$China = array("Beijing","Shanghai","Hong Kong","Xichang");
$India = array('Chennai','Delhi','Kolkata','Mumbai');
$UK = array('Cambridge','Derby','Liverpool','Oxford');
$US = array('Los Angeles','New York','Chicago','San Diego');
$country = $_GET["state"];
if($country == "Maharashtra"){
$cityJSON = json_encode($India);
}else if($country == "Andhra Pradesh"){
$cityJSON = json_encode($China);
}else if($country == "Kelal"){
$cityJSON = json_encode($UK);
}else if($country == "Karnataka"){
$cityJSON = json_encode($US);
}
 
echo "{Cities=".$cityJSON."}";
?>