<?php
const MYSQL_SERVER = 'localhost';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';
const MYSQL_DB = 'artbox';

function connexion()
{
    return new PDO(sprintf('mysql:dbname=%s;host=%s', MYSQL_DB, MYSQL_SERVER), MYSQL_USER, MYSQL_PASSWORD);
}
