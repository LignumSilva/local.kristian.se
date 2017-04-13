<?php

$username = 'sketchings';
//Available roles: author, editor, admin
$role = 'editor';

//add conditional statement
if !isset ($username) && $role != 'admin') echo "You do not have access to this page. Please contact your administratior.";

?>