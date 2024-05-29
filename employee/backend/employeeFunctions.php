<?php                                       // INPUT $var AS IS!! ITS ALLOWED

$_SESSION['username'];                                          // put in output data
$_SESSION['password'];                                          // put in output data

// MYSQL QUERIES

include_once 'dynamictTableLoad.php';

$fieldss = ['bitch1', 'bitch2', 'bitch3', 'bitch5'];
                                                                                                // i dont like this, but it must be done for i have to time
$roww = ['data1', 'data2', 'data3', 'data4', 'data5'];

?>
<script type='text/javascript'>

// ONCE PAGE LOADED

    window.addEventListener('load', () =>{

        let employeeDetails = document.getElementById('employeeDetails');
        let employeeDashboardTable = document.getElementById('employeeDashboardTable');

        pushEmployeeStats(employeeDetails);
        greetWName('mysqlQuery');

    })

// BUTTON FUNCTIONS

    function buttonPressed(button){

        if(button.id == "employeeDashboardButton"){

            loadTable(employeeDashboardTable);

        }else if(button.id == "logOutButton"){



        }
        

    }

// PUSH EMPLOYEE DETAILS

    function pushEmployeeStats(employeeStats){

        let stats = employeeStats.getElementsByClassName('stat');

        // parse mysql query
        //result = mysqlOutputQuery();             // output query inteded for this
        //fields = result->fetch_field();           // needs to be exactly fields = [Job Position, Wage Per Hour, Hours Worked (Month), Gross Pay (Total)]

        for(let i = 0; i < stats.length; i++){

            //stats[i].children[1].innerHTML = fields[i];
            stats[i].children[1].innerHTML = 'bitch ass';
        }

    }

    function greetWName(mysqlQuery){                                                // acc name

        let name = document.getElementById('greedingWName');
    
        // mysql query 
        <?php 
        
        outputQueryDashboard("attendance_data", "","", "", "");

        ?>
        name.innerText = mysqlQuery
    
    }

// CLOCK IN 

    function clockInn(){
        <?php
            
            date_default_timezone_set('Asia/Manila');

            $date = date('Y/m/d H:i:s');
        ?>

        alert("<?php echo $date ?>");
    }

    function clockOutt(){

        let currentdate = new Date(); 
        // mysql query

    }

</script>
<?php
?>