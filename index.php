<?php
include('functions.php');

// Include the database configuration
require 'config.php';

setupRouter('/mahasiswa', $conn)->run();