<?php
    session_start();
    $_SESSION['whatTabAmI'] = "dashboard";
    $_SESSION['employeeSearchFiltered'] = "false";
    $_SESSION['employeeSalarySearchFiltered'] = "false";
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
                    <button id='dashboardButton' type="button">Dashboard</button>        <!-- REMOVE NAME ATTRIBUTE-->
                    <button id='employeesButton' type="button">Employees</button>
                    <button id='employeePayrollButton' name='employeePayrollButton' type="button">Employee Payroll</button>
                    <button id='logOutButton' type="button">Log Out</button>
                </form>
            </div>
        </div>
        <div class="dashboard-container">
    
<!-- DASHBOARD TAB -->
        <div class='dashboard-content-wrapper' id='dashboardTab' style='display: block'>
            <div class='employee-stat'>
                <div class='stat-container'>
                    <p>Total Employees</p>
                    <h4>999</h4>
                </div>
                <div class='stat-container'>
                    <p>Employees Present</p>
                    <h4>5</h4>
                </div>
                <div class='stat-container'>
                    <p>Date</p>
                    <h4>01 January 1943 </h4>
                </div>
            </div>
            <div class='attendance-table'>
                <div class='employee-table-wrapper'>
                    <div class='table-header'>
                        <h3>Attendance List</h3>
                        <form action='admin-dashboard-dashboard.php' method='post' id='dashboardTabForm'>
                            <input type='text' id='queryPlaceholderEmployeeTab' name='queryPlaceholderEmployeeTab'  style='display:none'>
                            <input type='number' id='inputFilterFindID' placeholder='Employee ID'>
                            <select id='departDropDownFilter' name='Department' onchange='departmentClik(0)'>
                                <option value='' disabled selected>Department</option>
                                <option value='All Department'>All Department</option>
                                <option value='Albion Online'>Albion Online</option>
                                <option value='League of Legends'>League of Legends</option>
                                <option value='Minecraft'>Minecraft</option>
                            </select>
                            <select id='jobPosiDropDownFilter' name='Job Position'>
                                <option value='Job Position' disabled selected>Job Position</option>
                            </select>
                            <button type='submit' onclick="employeeTabFilter(0)" name='filterSearchEmployeeTab'> SEARCH </button>
                        </form>
                    </div>
                    <div class='attendance-table-container'>
                        <table id='dashboardTable'>

                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- EMPLOYEE TAB -->
        
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