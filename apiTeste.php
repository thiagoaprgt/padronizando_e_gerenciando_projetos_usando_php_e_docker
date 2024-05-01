<?php

if($_POST) {
    echo json_encode($_POST);
}else {
    echo json_encode(
        [
            "msg" => "erro",
            "post" => $_POST
        ]
    );
}
