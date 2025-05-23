<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (preg_match("/(etc|proc|opt|\.\.\/|%2F)/i", $page)) {
    die("Hacker detected!! 😠");
}

include($page . ".php");
?>