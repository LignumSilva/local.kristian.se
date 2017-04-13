<?php

$iceCream = array(
	'Alena' => 'Black Cherry', 
	'Treasure' => 'Chocolate', 
	'Dave McFarland' => 'Cookies and Cream', 
	'Rialla' => 'Strawberry'
	);
$iceCream['alena'] = 'Pistachio';
$iceCream['Dave Thomas'] = 'Cookie and Cream';
$iceCream[] = 'Vanilla';
$iceCream['Andrew'] = true;
var_dump($iceCream);

$keys = array(
	1 => 'a',
	'1' => 'b',
	1.5 => 'c',
	true => 'd'
	);
var_dump($keys);
?>