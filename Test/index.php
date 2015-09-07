<!--  Test file -->
<?php
include_once '../Format.php';

$Format = new Format;

echo $Format->format("~Test~ *test2* test3 *test4* ** /test/ ^jdks^ :test:", ["bold", "italic", "strike", "sup", "sub"]);
