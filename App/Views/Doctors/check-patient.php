<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Paitnet Details</h1>
    <br>
    <table>
        <?php 
            foreach($patient as $key => $value):
                if ($key == 'id' || $key == 'password' ||$key == 'doctor_id'){
                    continue;
                }
                ?>
                    <tr>
                        <td><?php echo $key?></td>
                        <td><?php echo $value?></td>
                    </tr>
                <?php
            endforeach;
        ?>

    </table>
</body>
</html>