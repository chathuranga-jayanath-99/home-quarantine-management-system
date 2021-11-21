<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Enter Guardian NIC</h2>

    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
        <div>
            <label for="NIC">Guardian NIC: </label>
            <input type="text" name="NIC" 
                value="<?php echo $data['NIC']?>">
            <span><?php echo $data['name_err']?></span>
            <input type="hidden" name="id_checked" value="no">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

    
</body>
</html>