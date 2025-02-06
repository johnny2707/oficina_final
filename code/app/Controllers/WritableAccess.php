<?php

namespace App\Controllers;
use App\Models\PrivateFolderModel;

class WritableAccess extends BaseController
{
    public function downloadFile($fileName){
    
        $filepath = WRITEPATH . "uploads/{$fileName}";

        $mime = mime_content_type($filepath);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: $mime");
        header('Content-Disposition: inline; filename="' . $fileName . '";');
        readfile($filepath);
        exit();

    }

}
