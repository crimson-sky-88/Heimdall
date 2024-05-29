<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heimdall - DASHBOARD</title>
    <link rel="stylesheet" href="../stylesheets/shared-resources.css">
    
    <link rel="icon" type="image/x-icon" href="../assets/project-logo.png">
    <link rel="stylesheet" href="./employee-stylesheet/employee-resources.css">
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
                <form action="" class="">
                    <button type='button' id='employeeDashboardButton'>Dashboard</button>
                    <button type='button' id='logOutButton'>Log Out</button>                                                                            <!-- CLOSE SESSION -->
                </form>
            </div>
        </div>
        <div class="dashboard-container">
            <!-- PHP script to display tab contents upon click goes here -->
            <div class="content-container">
                <div class="greeting-container">
                    <div class="greeting">
                        <h3 id='greedingWName'>Hello, (Employee First Name)</h3>
                    </div>
                    <div class="clock-in-clock-out">
                        <button type='button' id='clockIn'>CLOCK IN</button>
                        <button type='button' id='clockOut'>CLOCK OUT</button>
                    </div>
                </div>
                <div class="stat-container" id='employeeDetails'>
                    <div class="stat">
                        <p>Job Position</p>
                        <h4>Gatherer - Lumberjack</h4>
                    </div>
                    <div class="stat">
                        <p>Wage Per Hour</p>
                        <h4>$5</h4>
                    </div>
                    <div class="stat">
                        <p>Hours Worked (Month)</p>
                        <h4>32</h4>
                    </div>
                    <div class="stat">
                        <p>Gross Pay (Total)</p>
                        <h4>$160</h4>
                    </div>
                </div>
                <div class="attendance-table-container">
                    <div class="header-tab">
                        <h3>Attendance Sheet</h3>
                        <form action="">
                            <h3>Sort By:</h3>
                            <select name="year" id="">
                                <option value="" disabled selected>Year</option>
                                <option value="2024">2024</option>
                                <option value="2024">2025</option>
                                <option value="2024">2026</option>
                                <option value="2024">2027</option>
                                <option value="2024">2028</option>
                            </select>
                            <select name="month" id="">
                                <option value="" disabled selected>Month</option>
                                <option value="2024">January</option>
                                <option value="2024">February</option>
                                <option value="2024">March</option>
                                <option value="2024">April</option>
                                <option value="2024">May</option>
                                <option value="2024">June</option>
                                <option value="2024">July</option>
                                <option value="2024">August</option>
                                <option value="2024">September</option>
                                <option value="2024">October</option>
                                <option value="2024">November</option>
                                <option value="2024">December</option>
                            </select>
                        </form>
                    </div>
                    <div class="table-container">
                        <table id='employeeDashboardTable'>                                                     <!-- REMOVE CHILDREN, ADD THEM DYNAMICALLY -->

                        </table>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <footer>
        <?php 
            require '../admin/snippets/footer.php';
        ?>
    </footer>
    <?php

    include_once 'backend/employeeFunctions.php';

    ?>
</body>

</html>