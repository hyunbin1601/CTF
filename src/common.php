<?php
ini_set('display_errors', '0');
error_reporting(0);

session_start();

if (empty($_SESSION["bulletin_board"]))
	$_SESSION["bulletin_board"] = [];

if (empty($_SESSION["post_id_counter"]))
	$_SESSION["post_id_counter"] = 1;

