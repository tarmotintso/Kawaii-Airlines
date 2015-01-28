<?php
define('DATABASE_HOSTNAME', 'localhost');
define('DATABASE_USERNAME', 'root');
define('DATABASE_PASSWORD', 'aabits123');
define('DATABASE_DATABASE', 'lennud');
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']) . '/');
define('PROJECT_NAME', 'Kawaii Airlines');

function connect_db()
{
    global $db;
    @$db = new mysqli(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD);
    if ($connection_error = mysqli_connect_error()) {
        $errors[] = 'There was an error trying to connect to database at ' . DATABASE_HOSTNAME . ':<br><b>' . $connection_error . '</b>';
        require 'templates/error_template.php';
        die();
    }
    mysqli_select_db($db, DATABASE_DATABASE);
//    or error_out('<b>Error:</b><i> ' . mysqli_error($db) . '</i><br>
//		This usually means that MySQL does not have a database called <b>' . DATABASE_DATABASE . '</b>.<br><br>
//		Create that database and import some structure into it from <b>doc/database.sql</b> file:<br>
//		<ol>
//		<li>Open database.sql</li>
//		<li>Copy all the SQL code</li>
//		<li>Go to phpMyAdmin</li>
//		<li>Create a database called <b>' . DATABASE_DATABASE . '</b></li>
//		<li>Open it and go to <b>SQL</b> tab</li>
//		<li>Paste the copied SQL code</li>
//		<li>Hit <b>Go</b></li>
//		</ol>');
    mysqli_query($db, "SET NAMES utf8");
    mysqli_query($db, "SET CHARACTER utf8");

}

connect_db();

function get_one($sql, $debug = FALSE)
{
    global $db;

    if ($debug) { // kui debug on TRUE
        print "<pre>$sql</pre>";
    }
    switch (substr($sql, 0, 6)) {
        case 'SELECT':
            $q = mysqli_query($db, $sql) or db_error_out();
            $result = mysqli_fetch_array($q);
            return empty($result) ? NULL : $result[0];
        default:
            exit('get_one("' . $sql . '") failed because get_one expects SELECT statement.');
    }
}

function get_all($sql)
{
    global $db;
    $q = mysqli_query($db, $sql) or db_error_out();
    while (($result[] = mysqli_fetch_assoc($q)) || array_pop($result)) {
        ;
    }
    return $result;
}

function get_first($sql)
{
    global $db;
    $q = mysqli_query($db, $sql) or db_error_out();
    $first_row = mysqli_fetch_assoc($q);
    return empty($first_row) ? array() : $first_row;
}

function q($sql, & $query_pointer = NULL, $debug = FALSE)
{
    global $db;
    if ($debug) {
        print "<pre>$sql</pre>";
    }
    $query_pointer = mysqli_query($db, $sql) or db_error_out();
    switch (substr($sql, 0, 6)) {
        case 'SELECT':
            exit("q($sql): Please don't use q() for SELECTs, use get_one() or get_first() or get_all() instead.");
        case 'INSE':
            debug_print_backtrace();
            exit("q($sql): Please don't use q() for INSERTs, use insert() instead.");
        case 'UPDA':
            exit("q($sql): Please don't use q() for UPDATEs, use update() instead.");
        default:
            return mysqli_affected_rows($db);
    }
}

function insert($table, $data)
{
    global $db;
    if ($table and is_array($data) and !empty($data)) {
        $values = implode(',', escape($data));
        $sql = "INSERT INTO `{$table}` SET {$values} ON DUPLICATE KEY UPDATE {$values}";
        $q = mysqli_query($db, $sql) or db_error_out();
        $id = mysqli_insert_id($db);
        return ($id > 0) ? $id : FALSE;
    } else {
        return FALSE;
    }
}

function update($table, array $data, $where)
{
    global $db;
    if ($table and is_array($data) and !empty($data)) {
        $values = implode(',', escape($data));

        if (isset($where)) {
            $sql = "UPDATE `{$table}` SET {$values} WHERE {$where}";
        } else {
            $sql = "UPDATE `{$table}` SET {$values}";
        }
        $id = mysqli_query($db, $sql) or db_error_out();
        return ($id > 0) ? $id : FALSE;
    } else {
        return FALSE;
    }
}
