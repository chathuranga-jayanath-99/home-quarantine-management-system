<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
    <form action="#" method="POST">
        <input type="password" id="pass" placeholder="password">
        <input type="password" id="confirm_pass" placeholder="confirm password">
        <input type="submit" name="Submit" id="submit" onclick="submitRoutine(event)">
    </form>

    <script src="../../static/js/encrypt.js"></script>
    <script>
        var pass = Document.getElementById('pass').value;
        var confirm_pass = Document.getElementById('confirm_pass').value;
        console.log()   ;
        function submitRoutine(e){
            e.preventDefault();

            if ( pass == confirm_pass && pass != ''){
                alert(pass);
            }
            else{

            }
        }
    </script>
</body>
</html>