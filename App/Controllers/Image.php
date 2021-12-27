<?php

namespace App\Controllers;

class Image extends \Core\Controller {

    public function showAction() {
        if (isset($_GET['img'])) {
            $imgPath = APPROOT.'/images/'.$_GET['img'];
            // open the file in a binary mode
            $fp = fopen($imgPath, 'rb');

            // send the right headers
            header("Content-Type: image/png");
            header("Content-Length: " . filesize($imgPath));

            // dump the picture and stop the script
            fpassthru($fp);
            exit;
        }
    }

}