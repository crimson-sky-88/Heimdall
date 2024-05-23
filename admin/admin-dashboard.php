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
                <form action="admin-dashboard.php" method="post" class="">
                    <button name="dashboardButton" type="submit">Dashboard</button>
                    <button name="employeesButton" type="submit">Employees</button>
                    <button name="employeePayrollButton" type="submit">Employee Payroll</button>
                    <button name="logOutButton">Log Out</button>
                </form>
            </div>
        </div>
        <div class="dashboard-container">
            <!-- PHP script to display tab contents upon click goes here -->
            
            <!--

                // wait for button pressed          // Dashboard, Employees, Employees Payroll, Log Out
                    // create an identifyer (on what button is pressed) then only that tab/table is live(where query data is put)

                // load right tab                 // hide/show
                    // load dynamic table
                
                // query default values into table
                    // default: load everything unfiltered            // ex. load all employee record in employee table from database
                        // can be filtered?
                
                // 

            -->

            <?php 

                //
                include_once 'snippets/backend/tabLoader.php';

            ?>

        </div>
    </div>
</body>

</html>