<?php
 
// echo file_get_contents('Directories.html');
// header('Content-Type: application/json');

require_once __DIR__ . "/Projects.php";

echo Projects::getProjects();

 

 