<?php

include 'list.php';

$status = 'all';
$field = 'priority';
$action = 'week';

$order = array();
if ($status == 'all') {
	$order = array_keys($list);
} else {
	foreach ($list as $key => $item) {
		if ($item['complete'] == $status) {
			$order[] = $key;
		}
	}
}

switch ($action) {
	case 'sort':
	if ($field) {
		$sort = array();
		foreach ($order as $id) {
			$sort[$id] = $list[$id][$field];
		}
		asort($sort);
		$order = array_keys($sort);
	}
	break;
case 'week':
	foreach ($order as $key => $value) {
		if (strtotime($list[$value]['due']) > strtotime("+1 week") || !$list[$value]['due']) {
			unset($order[$key]);
		}
	}
	break;
}
//var_dump($sort);
//var_dump($list);

echo "<table>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Priority</th>";
echo "<th>Due Date</th>";
echo "<th>Complete</th>";
echo "</tr>";
foreach ($order as $id) {
	echo "<tr>";
	echo "<td>" . $list[$id]['title'] . "</td>\n";
	echo "<td>" . $list[$id]['priority'] . "</td>\n";
	echo "<td>" . $list[$id]['due'] . "</td>\n";
	echo "<td>";
	if ($list[$id]['complete']) {
		echo "Yes";
	} else {
		echo "No"; 
	}
	echo "</td>\n";
	echo "</tr>";
}
echo '</table>'
//var_dump($list);
//echo $list[0]['title'];
?>