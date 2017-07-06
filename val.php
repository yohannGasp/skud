<?php
$err = array();

if (!file_exists('d:\\work\\tools\\php5\\php.ini')) $err[] = 'Файл C:\\php5\\php.ini не существует';
	$path = php_ini_loaded_file();

if (!file_exists('d:\work\tools\php5\\ext\\'))
	$err[] = 'Папка C:\\php5\\ext\\ не существует';

if (!file_exists('d:\work\tools\php5\\tmp\\'))
	$err[] = 'Папка C:\\php5\\tmp\\ не существует';

if (!file_exists('d:\work\tools\php5\\includes\\'))
	$err[] = 'Папка C:\\php5\\includes\\ не существует';


$ext = ini_get("extension_dir");
if (strtolower($ext) !== 'd:/work/tools/php5/ext')
	$err[] = 'Проверьте значение директивы extension_dir';

$inc = ini_get('include_path');
if (strtolower($inc) !== '.;d:\\work\\tools\\php5\\includes')
	$err[] = 'Проверьте значение директивы include_path';

$ses = ini_get('session.save_path');
if (strtolower($ses) !== 'd:/work/tools/php5/tmp')
	$err[] = 'Проверьте значение директивы session.save_path';

$upl = ini_get('upload_tmp_dir');
if (strtolower($upl) !== 'd:/work/tools/php5/tmp')
	$err[] = 'Проверьте значение директивы upload_tmp_dir';

if (get_magic_quotes_gpc())
	$err[] = 'Проверьте значение директивы magic_quotes_gpc';
if (ini_get('register_globals'))
	$err[] = 'Проверьте значение директивы register_globals';
if (!extension_loaded('gd'))
	$err[] = 'Библиотека GD не подключена';
if (!extension_loaded('mbstring'))
	$err[] = 'Библиотека mbstring не подключена';
if (!extension_loaded('mysql'))
	$err[] = 'Библиотека mysql не подключена';
if (!extension_loaded('mysqli'))
	$err[] = 'Библиотека mysqli не подключена';
if (!extension_loaded('ntwdblib.dll'))
	$err[] = 'Библиотека mysqli не подключена';


$path = strtolower($_SERVER['PATH']);
if (strpos($path, 'd:\work\tools\php5') === false)
	$err[] = 'Не прописан путь к папке c:\php5 в Path';

if (count($err) == 0) echo 'Not error';
else {
	echo '<div style="color:red;">';
	echo implode('<br>', $err) . '</div>';
}

?>