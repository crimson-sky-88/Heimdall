<?php                                       // INPUT $var AS IS!! ITS ALLOWED

    //$_SESSION['id'];                                          // put in output data

?>
<script type='text/javascript'>

// CLOCK IN 

    var clockIn = document.getElementById('clockIn');
    var clockOut = document.getElementById('clockOut');

    clockIn.addEventListener("click", () =>{
        <?php
            date_default_timezone_set('Asia/Manila');

            $date = date('Y/m/d H:i:s');
        ?>

        alert("<?php echo $date ?>");
    })

    clockOut.addEventListener("click", () =>{

        let currentdate = new Date(); 
        // mysql query

    })

// ONCE PAGE LOADED

    window.addEventListener('load', () =>{
        alert("asd");
        let employeeDetails = document.getElementById('employeeDetails');
        let employeeDashboardTable = document.getElementById('employeeDashboardTable');

        //greetEmployeeStats();

    })

// BUTTON FUNCTIONS

    function buttonPressed(button){

        if(button.id == "employeeDashboardButton"){

            loadTable(employeeDashboardTable);

        }else if(button.id == "logOutButton"){



        }
        

    }

// EMPLOYEE DETAILS

    function greetEmployeeStats(){                                                // acc name

        let name = document.getElementById('greedingWName');
        let stats = document.getElementsByClassName('stats');

        // mysql query 


    }

</script>
<?php
?>