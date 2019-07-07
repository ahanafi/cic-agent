<?php

function setSession($index, $value) {
	return $_SESSION[$index] = $value;
}

function getSession($index) {
	return $_SESSION[$index];
}

function cekSessionUser() {
	if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['fullname'])) {
		return true;
	} else {
		return false;
	}
}

function cekSessionSiswa() {
	if(isset($_SESSION['NIS']) && isset($_SESSION['KELAS_ID'])) {
		return true;
	} else {
		return false;
	}
}

function getSessionUser($index) {
	$data = $_SESSION['user'][$index];
	echo $data;
}

function setSessionUser($data = []) {
	$data = (array) $data;
	foreach ($data as $key => $value) {
		$_SESSION['user'][$key] = $value;
	}
}

function resetSessionUser() {
	unset($_SESSION['user']);
	session_destroy();
}