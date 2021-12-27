<?php

namespace App\Controllers;

class Image extends \Core\Controller {

    public function showAction() {
        if (isset($_GET['img'])) {
            $imgPath = APPROOT.'/images/'.$_GET['img'];
            $fp = fopen($imgPath, 'rb');

            if($fp) {
                header("Content-Type: image/png");
                header("Content-Length: " . filesize($imgPath));
                fpassthru($fp);
            }
            
            exit;
        }
    }

}