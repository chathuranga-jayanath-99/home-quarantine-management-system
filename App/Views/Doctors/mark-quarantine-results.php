<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

<h1>Recent Quarantine Ending Patients</h1>
    <br>
    
    <table id= "table" class="table">
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Quarantine End Date</td>
            <td>Actions</td>
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
                            <input type="date" placeholder="Extended Date" id="extended_date">

                            <button class="btn btn-primary" onclick="extendRoutine(this,
                            <?php echo $patient->id.',\''.$patient->type.'\'';?>)">Extend Period</button>
                            
                            <button class="btn btn-secondary" 
                            onclick="removeRoutine(this.parentElement.parentElement.rowIndex, 
                            <?php echo $patient->id.',\''.$patient->type.'\'';?>)">End Period</button>
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
    
           <div class="container">
               <div class="row">
                   <div class="col-md-12">

                       <div class="modal fade" id="myModal">
                           <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1>Title</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="text" value="Close">
                                    </div>
                                </div>
                           </div>
                       </div>

                       <a href="#" data-toggle="modal" data-target="#myModal">Open Model</a>
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
        var today = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
        var res = false;

        if (today < extendedDate){
            res = extendQuarantineDate(extendedDate, patientId, patientType);
            table.deleteRow(row.rowIndex);
            
        }
        else{
            alert('Enter a valid date');
        }
    }
    
</script>

</body>
</html>