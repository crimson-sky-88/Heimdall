<?php
    session_start();
    $_SESSION['whatTabAmI'] = "employeeSalary";
    $_SESSION['dashboardSearchFiltered'] = "false";
    $_SESSION['employeeSearchFiltered'] = "false";
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
                    <button id='dashboardButton' name='dashboardButton' type="button">Dashboard</button>
                    <button id='employeesButton' name='employeesButton' type="button">Employees</button>
                    <button id='employeePayrollButton' name='employeePayrollButton' type="button">Employee Payroll</button>
                    <button id='logOutButton' type="button">Log Out</button>
                </form>
            </div>
        </div>
        <div class="dashboard-container">
    
<!-- DASHBOARD TAB -->
        

<!-- EMPLOYEE TAB -->
        

<!-- EMPLOYEE PAYROLL TAB -->
        <div class='employee-table-wrapper' id='employeeSalaryTab' style='display: block'>
            <div class='table-header'>
                <h3>Employee Payroll</h3>
            </div>

            <form action='admin-dashboard-employeePayroll.php' method='post' id='employeeTabForm' class="search-bar">
            <div class="search-filters">
                    <div >
                        <input type='text' id='queryPlaceholderEmployeeTab' name='queryPlaceholderEmployeeTab' style='display: none'>
                    </div>
                    <div class="search-input">
                        <input type='number' id='inputFilterFindID' placeholder='Employee ID'>
                    </div>
                    <div class="search-filters-select">
                        <select id='departDropDownFilter' name='Department' onchange='departmentClik(0)'>
                            <option value='' disabled selected>Department</option>
                            <option value='All Department'>All Department</option>
                            <option value='Albion Online'>Albion Online</option>
                            <option value='League of Legends'>League of Legends</option>
                            <option value='Minecraft'>Minecraft</option>
                        </select>
                    </div>
                    <div class="search-filters-select">
                        <select id='jobPosiDropDownFilter' name='Job Position'>
                            <option value='Job Position' disabled selected>Job Position</option>
                        </select>
                    </div>
                </div>
                <button type='submit' onclick='employeeTabFilter(2)' name='filterSearchEmployeeTab' class="search-button"> SEARCH </button>
            </form>
            <div class='table-container'>        
            <table id = 'employeeSalaryTable'>

            </table>

            </div>
            <div class='table-controls'>
                <form action=''>
                    <button type='button' onclick='editPayrollDataa()'>Edit Payroll Data</button>
                    <button type='button' onclick='printPayrollDataa()'>Print Payroll Data</button>
                </form>
            </div>
        </div>

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