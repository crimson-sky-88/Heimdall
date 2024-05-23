<?php
    include_once 'dynamicTableLoader.php';

    // DYNAMIC TAB
    {   // disgusting                                                           // including/linking to another file doesnt seem to work

        ob_start();                                                             // for detecting and removing echo values

        if(isset($_POST["dashboardButton"])){
            ob_end_clean();                                                     // remove all echo values from cache
    
            echo"
                <div class='dashboard-content-wrapper'>
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

                    <form action='admin-dashboard.php' method='post'>
                        <select id='departDropDownPopUp'>
                            <option value='Department'> Department </option>
                            <option value='Lumberjack'> Lumberjack </option>
                            <option value='Miner'> Miner </option>
                            <option value='Skinner'> Skinner </option>
                            <option value='Harverster'> Harverster </option>
                        </select>
                        <select id='jobPosiDropDownPopUp'>
                            <option value='Job Position'> Job Position </option>
                            <option value='Top'> Top </option>
                            <option value='Jungler'> Jungler </option>
                            <option value='Mid'> Mid </option>
                            <option value='Bottom'> Bottom </option>
                            <option value='Support'> Support </option>
                        </select>
                    </form>

                    <div class='attendance-table'>
                        <div class='employee-table-wrapper'>
                            <div class='table-header'>
                                <h3>Attendance List</h3>
                            </div>
                            <div class='attendance-table-container'>
                
            ";

            loadTable();

            echo"
            
                            </div>
                        </div>
                    </div>
                </div>
            ";

        }
    
        if(isset($_POST["employeesButton"])){
    
            ob_end_clean();
    
            echo"
                <div class='employee-table-wrapper'>
                    <div class='table-header'>
                        <h3>Employees</h3>
                    </div>

                    <form action='admin-dashboard.php' method='post'>
                        <select id='departDropDownPopUp'>
                            <option value='Department'> Department </option>
                            <option value='Lumberjack'> Lumberjack </option>
                            <option value='Miner'> Miner </option>
                            <option value='Skinner'> Skinner </option>
                            <option value='Harverster'> Harverster </option>
                        </select>
                        <select id='jobPosiDropDownPopUp'>
                            <option value='Job Position'> Job Position </option>
                            <option value='Top'> Top </option>
                            <option value='Jungler'> Jungler </option>
                            <option value='Mid'> Mid </option>
                            <option value='Bottom'> Bottom </option>
                            <option value='Support'> Support </option>
                        </select>
                    </form>

                    <div class='table-container'>
                ";
                
                loadTable();

                echo"
                    </div>
                    <div class='table-controls'>
                        <form action=''>
                            <button id='addEmployee'>Add Employee</button>
                            <button id='editData'>Edit Employee</button>
                            <button id='deleteData'>Delete Employee</button>
                        </form>
                    </div>
                </div>
                ";  
    
        }
    
        if(isset($_POST["employeePayrollButton"])){
    
            ob_end_clean();
    
            echo"
                <div class='employee-table-wrapper'>
                    <div class='table-header'>
                        <h3>Employee Payroll</h3>
                    </div>

                    <form action='admin-dashboard.php' method='post'>
                        <select id='departDropDownPopUp'>
                            <option value='Department'> Department </option>
                            <option value='Lumberjack'> Lumberjack </option>
                            <option value='Miner'> Miner </option>
                            <option value='Skinner'> Skinner </option>
                            <option value='Harverster'> Harverster </option>
                        </select>
                        <select id='jobPosiDropDownPopUp'>
                            <option value='Job Position'> Job Position </option>
                            <option value='Top'> Top </option>
                            <option value='Jungler'> Jungler </option>
                            <option value='Mid'> Mid </option>
                            <option value='Bottom'> Bottom </option>
                            <option value='Support'> Support </option>
                        </select>
                    </form>

                    <div class='table-container'>
                ";

                loadTable();

                echo"
                    </div>
                    <div class='table-controls'>
                        <form action=''>
                            <button>Edit Payroll Data</button>
                            <button>Print Payroll Data</button>
                        </form>
                    </div>
                </div>
            ";
    
        }

        ob_end_clean();
    }
   

?>