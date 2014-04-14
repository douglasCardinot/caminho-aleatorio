<?php
$numberOfSteps = $_GET['numberOfSteps'];
$numberOfDrunks = $_GET['numberOfDrunks'];

if($numberOfDrunks > 2000){
	die("Não permitido. Limite máximo de 2000 bêbados");
}

if($numberOfSteps > pow(10, 4)){
	die("Não permitido. Limite máximo de ".pow(10, 4)." passos");
}

$id = $_GET['id'];
$position = 0;
$count = 0;
for($count = 0; $count < $numberOfSteps; $count++){
	$random = mt_rand(1, 10000);
	if($random > 5000){
		$position++;
	}else{
		$position--;
	}
}
echo "{\"id\":${id},\"position\":${position}}";
?>