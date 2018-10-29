<?php


$array = range('a', 'A');

foreach ($array as &$value) {
    $value = "'\{$value}'";
}

for($i = 1; $i < 12; $i++) {
    $array = array_merge($array,  $array);
}

$str = '<?php ini_set("memory_limit", "-1"); set_time_limit(0); $array = [';

$str .= implode(',', $array);

$str .= '];';
file_put_contents('direct_concat.php', $str);

$str = '$start = microtime(true);';
foreach ($array as $key =>  $item) {
    $str .= '$array["' . $key . '"].';
}
$str = rtrim($str, '.');
$str .= ';';
$str .= 'print("Eval time:" . (microtime(true) - $start) . "\r\n");';
file_put_contents('direct_concat.php', $str, FILE_APPEND);


$str = '<?php ini_set("memory_limit", "-1");set_time_limit(0); $string = "";$start = microtime(true);';
file_put_contents('line_concat.php', $str);
$str = '';
foreach ($array as $value) {
    $str .= '$string .= ' . $value . ';' . "\r\n";
}
$str .= 'print("Eval time:" . (microtime(true) - $start) . "\r\n");';
file_put_contents('line_concat.php', $str, FILE_APPEND);
