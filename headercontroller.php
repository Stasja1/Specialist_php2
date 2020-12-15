<?php

if ($_SERVER['REQUEST_URI'] === '/error.php') {
	header( header: 'HTTP/1.1 404 NOT Found');
}
