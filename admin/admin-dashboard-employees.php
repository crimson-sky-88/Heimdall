<?php
    session_start();
    $_SESSION['whatTabAmI'] = "employee";
    $_SESSION['employeeSalarySearchFiltered'] = "false";
    $_SESSION['dashboardSearchFiltered'] = "false";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heimdall - DASHBOARD</title>
    <link rel="stylesheet" href="../stylesheets/shared-resources.css">
    <link rel="stylesheet" href="../admin/admin-stylesheet/admin-resources.css">
    <link rel="icon" type="image/x-icon" href="../assets/project-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<body>
    <div class="main-container">
        <div class="nav-tab">
            <h2 class="site-name">Heimdall</h2>
            <div class="function-nav">
                <h3>Navigation</h3>
                <form action="admin-dashboard.php" method="post">
                    <button  id='dashboardButton' type="button">Dashboard</button>        <!-- REMOVE NAME ATTRIBUTE-->
                    <button id='employeesButton' name='employeesButton' type="button">Employees</button>
                    <button id='employeePayrollButton' type="button">Employee Payroll</button>
                    <button id='logOutButton' type="button">Log Out</button>
                </form>
            </div>
        </div>
        <div class="dashboard-container">
    
<!-- DASHBOARD TAB -->
        

<!-- EMPLOYEE TAB -->
        <div class='employee-table-wrapper' id='employeeTab' style='display: block'>            
            <div class='table-header'>
                <h3 id='lemao'>Employees</h3>
            </div>
            <form action='admin-dashboard-employees.php' method='post' id='employeeTabForm'>
                <input type='text' id='queryPlaceholderEmployeeTab' name='queryPlaceholderEmployeeTab' style='display: none'>
                <input type='number' id='inputFilterFindID' placeholder='Employee ID'>
                <select id='departDropDownFilter' name='Department' onchange='departmentClik(1)'>
                    <option value='' disabled selected>Department</option>
                    <option value='All Department'>All Department</option>
                    <option value='Albion Online'>Albion Online</option>
                    <option value='League of Legends'>League of Legends</option>
                    <option value='Minecraft'>Minecraft</option>
                </select>
                <select id='jobPosiDropDownFilter' name='Job Position'>
                    <option value='Job Position' disabled selected>Job Position</option>
                </select>
                <button type='submit' onclick="employeeTabFilter(1)" name='filterSearchEmployeeTab'> SEARCH </button>
            </form>
            <div class='table-container'>
            <table id='employeeTable'>

            </table>
            </div>
            <div class='table-controls'>
                <form action='admin-dashboard-employees.php' method="post">
                    <input type='text' name='attendanceQueryPlaceholder' id='attendanceQueryPlaceholder' style="display: none;">
                    <button type='submit' onclick='presentEmployeeee()' name='presentEmployee'>Present Employee</button>            <!-- first execute onclick then name (name is being tracked by php)  THIS SHITS CRAAAZZYYYY-->
                    <button id='addEmployee' type='button' onclick='addEmployeee()'>Add Employee</button>
                    <button id='editData' type='button' onclick='editDataa()'>Edit Employee</button>
                    <button id='deleteData' onclick='deleteDataaa()' type='submit' name='deleteDataa'>Delete Employee</button>
                </form>
            </div>
        </div>

<!-- EMPLOYEE PAYROLL TAB -->
        

        </div>
    </div>

    <div id='blockAndBlur' style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px;
            background: rgba(0,0,0, 0.3); display: none">
    </div>

    <?php 
        
        include_once 'snippets/employee-account-creation-pop-up.php';
        include_once 'snippets/employee-data-pop-up.php';
        include_once 'snippets/payroll-data-pop-up.php';
    
    ?>

    <footer>
        <?php 
            require '../admin/snippets/footer.php';
        ?>
    </footer>
    
    <script src="snippets/backend/adminFunctions.js" type='text/javascript'> </script>

    <?php 
    include_once 'snippets/backend/dynamicTableLoader.php';
    ?>

</body>


</html>