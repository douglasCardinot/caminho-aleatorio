<?php
$numberOfSteps = $_GET['numberOfSteps'];
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