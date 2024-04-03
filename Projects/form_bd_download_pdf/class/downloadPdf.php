<?php

use Thiago_AP\Database\Connection;


class downloadPdf {

    public function __construct() {}

    public function teste() {
       print_r(downloadPdf::maxId());
    }

    
    public function saveForm(Array $data) { 

        

        if($data['name'] == null || $data['cellphone'] == null || $data['email'] == null) {

            $path = 'http://localhost:9000/Projects/form_bd_download_pdf/';
            header("Location:" . $path);
            return false;
        }

        
        
        if(!empty(downloadPdf::findUser($data) )) {
            return downloadPdf::downloadPdfScreen($data);
        }

        extract($data);

        $conn = Connection::open("config");        

        $sql = "INSERT INTO formulario (
                name,
                number,
                email,
                data_cadastro
            )
            VALUES (
                '$name',
                $cellphone,
                '$email',
                NOW()
            )            
        ";     

        $conn = null; 
        
        return downloadPdf::directDownloadPdf($data);

    }

    public function findUser($data) {

        $conn = Connection::open("config");

        extract($data);
       
        $sql = "SELECT * FROM formulario WHERE email = '$email' AND number = $cellphone";

        $query = $conn->query($sql); 

        $obj = $query->fetchObject();

        $conn = null;

        return $obj;
        
        

    } 


    public function maxId() {
        $conn = Connection::open("config");        
       
        $sql = "SELECT * FROM formulario WHERE id IN (SELECT MAX(id) FROM formulario)";

        $query = $conn->query($sql); 
        
        $obj = $query->fetchObject();       

        $conn = null; 

        return $obj;
    }


    public function downloadPdfScreen(Array $obj) {
        

        $content = file_get_contents(__DIR__ . "/../views/downloadPdf.html");

        $downloadPath = "http://localhost:9000/Projects/form_bd_download_pdf/pdf/Documento.pdf";

        $content = str_replace("%link%", $downloadPath, $content);

        echo $content;


    }


    private function directDownloadPdf() {       
    
    $fileName = 'Documento.pdf'; 
    $filePath = str_replace('class', 'pdf/' . $fileName, __DIR__);
  
    if (!file_exists($filePath)) {  
        echo $filePath; 
    exit;
    }    

    $newFileName = 'Teste.pdf';
   
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="'.$newFileName.'"');
    header("Content-type:application/pdf");  
    header('Content-Length: ' . filesize($fileName));
   
    // Envia o arquivo para o cliente
    readfile($filePath);

    


    }

}