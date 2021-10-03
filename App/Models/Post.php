<?php

namespace App\Models;

class Post extends \Core\Model
{
    public static function getAll()
    {
        $conn = \Core\Model::getDB();

        $sql = "SELECT * FROM posts";
        $res = mysqli_query($conn, $sql);

        return $res;
    }
}