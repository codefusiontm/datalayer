<?php
/*
    If OCI selected
    host = optional
    port = optional
    database = (description= (retry_count=20)(retry_delay=3)(address=(protocol=tcps)(port=<PORT>)(host=<HOST>))(connect_data=(service_name=<SERVICE_NAME>))(security=(ssl_server_cert_dn=\"<SSL_SERVER_CERT_DN>\")))
 */

define("DLC", [
    "engine" => "??", /* mysql, pgsql, oci */
    "host" => "??",
    "port" => "??",
    "dbname" => "??",
    "username" => "??",
    "passwd" => "??",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ]
]);
