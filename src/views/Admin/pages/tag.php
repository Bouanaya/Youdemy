<?php
require_once '../../../Classes/Tag.php';
 
$tag = new Tag();
$tags = $tag->gettags();
var_dump($tags);
?>


 