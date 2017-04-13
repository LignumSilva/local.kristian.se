<?php

function hello($arr){
	if (is_array($arr)) {
		foreach ($arr as $name) {
			echo "Hello, $name, how's it going?</br>\n";
		}
	} else {
		echo 'Hello, friends!';
	}
}
$names = array(
	'Hampton',
	'Mike',
	'Charlie'
	);
hello($names);

?>