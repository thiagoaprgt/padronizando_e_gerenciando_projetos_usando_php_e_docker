<?php

use Thiago_AP\Database\Connection;

class Database {

    public function __construct() {}


    public function saveForm(Array $data) {

        $conn = Connection::open("thiagoTeste");

        $sql = "";

        $conn->query($sql);


        $conn = null;

    }

}