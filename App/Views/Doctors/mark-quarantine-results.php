<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
    <?php
    $page = 'mark-quarantine-results';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>

<section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class=" order-2 order-lg-1">

                        <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Recent Quarantine Ending Patients</h1>
    
    <table id= "table" class="table">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Quarantine End Date</th>
            <th>Actions</th>
        </tr>
            
        <?php
           if (sizeof($sorted_patients) > 0){
                foreach($sorted_patients as $patient){
                    ?>
                    <tr>
                        <td><?php echo $patient->name; ?></td>
                        <td><?php echo $patient->age; ?></td>
                        <td><?php echo $patient->end_quarantine_date; ?></td>
                        
                        <td>
                            <a href="<?php echo URLROOT.'/doctor/view-patient-records?id='.$patient->id.'&type='.$patient->type.'&name='.$patient->name; ?>" class="btn btn-primary">View Records</a>
                                                      
                            <button class="btn btn-secondary" 
                            onclick="removeRoutine(this.parentElement.parentElement.rowIndex, 
                            <?php echo $patient->id.',\''.$patient->type.'\'';?>)">End Period</button>

                            <button class="btn btn-secondary" onclick="extendPopUp(this)">Want to extend?</button>
                        </td>

                        <td style="display: none;" >
                            <input type="date" placeholder="Extended Date" id="extended_date">

                            <button class="btn btn-primary" onclick="extendRoutine(this,
                            <?php echo $patient->id.',\''.$patient->type.'\'';?>)">Extend Period</button>
                        </td>

                    </tr>
                    <?php
                }
           }
           else{
               ?>
               <tr>
                   <td>No Patitents.</td>
               </tr>
               <?php
           }
        ?>
    </table>


                        </div>
                    </div>  
                </div>
            </div>

            <div class="text-center mt-5 text-muted">
            <a href="<?php echo URLROOT?>/doctor/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
            </div>

        </div>
    </div>
</div>


</section>
<script src="../static/js/doctor-script.js"></script>
<script>
    var table = document.getElementById("table");
    function removeRoutine(rowIndex, patientId, patientType){
        
        endQuarantinePeriod(patientId, patientType);

        table.deleteRow(rowIndex);
    }

    function extendRoutine(element, patientId, patientType){
        var row = element.parentElement.parentElement;
        var extendedDate = row.getElementsByTagName('input')[0].value;
        
        var date = new Date();

        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1).padStart(2, '0');
        var yy = date.getFullYear();
        var today = yy+'-'+mm+'-'+dd;

        var res = false;
        console.log(today);
        console.log(extendedDate);
        if (today < extendedDate){
            res = extendQuarantineDate(extendedDate, patientId, patientType);
            table.deleteRow(row.rowIndex);
            
        }
        else{
            alert('Enter a valid date');
        }
    }
    
    function extendPopUp(element){

        var row = element.parentElement.parentElement;
        if (row.cells[4].style.display == 'table-row'){
            row.cells[4].style.display = 'none';
        }
        else{
            row.cells[4].style.display = 'table-row'
        }
    }
</script>

</body>
</html>