<?php
    //include_once 'dynamicTableLoader.php';

    // DYNAMIC TAB
    {   // disgusting                                                           // no time for cool lookin code 

        ob_start();                                                             // for detecting and removing echo values

        if(isset($_POST["dashboardButton"])){
            ob_end_clean();                                                     // remove all echo values from cache
            
            //$result = outputQueryDashboard("employee", $departDropDownPopUp, $jobPosiDropDownPopUp);
                // might need to change for joins
            //loadTable($result);
            
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
                        <select class='departDropDownFilter'>
                            <option value='Department'> Department </option>
                            <option value='Lumberjack'> Lumberjack </option>
                            <option value='Miner'> Miner </option>
                            <option value='Skinner'> Skinner </option>
                            <option value='Harverster'> Harverster </option>
                        </select>
                        <select class='jobPosiDropDownFilter'>
                            <option value='Job Position'> Job Position </option>
                            <option value='Top Laner'> Top Laner </option>
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
                
            <table>
            <thead id='tableHead' class='table-head'>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Extension</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Job Position</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id='tableBody'>  
                <tr onclick='highlightSelectedRow(this)'>
                    <td id='First Name'>Jefferson</td>
                    <td id='Middle Name'>Manglicmot</td>
                    <td id='Last Name'>Franco</td>
                    <td id='Extension'>N/A</td>
                    <td id='Age'>21</td>
                    <td id='Sex'>Male</td>
                    <td id='Address'>Purok 3, Brgy. West Dirita, San Antonio, Zambales</td>
                    <td id='Department'>Albion Online</td>
                    <td id='Job Position'>Gatherer - Lumberjack</td>
                    <td id='Contact Number'>00000000000</td>
                    <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                </tr>
                <tr onclick='highlightSelectedRow(this)'>
                    <td id='First Name'>Justin Chris</td>
                    <td id='Middle Name'>Apostol</td>
                    <td id='Last Name'>De Leon</td>
                    <td id='Extension'>N/A</td>
                    <td id='Age'>21</td>
                    <td id='Sex'>Male</td>
                    <td id='Address'>Ibang planeta</td>
                    <td id='Department'>Albion Online</td>
                    <td id='Job Position'>Gatherer - Skinner</td>
                    <td id='Contact Number'>00000000000</td>
                    <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                </tr>
                <tr onclick='highlightSelectedRow(this)'>
                    <td id='First Name'>Marvine Ray</td>
                    <td id='Middle Name'>Abarra</td>
                    <td id='Last Name'>Fernandez</td>
                    <td id='Extension'>N/A</td>
                    <td id='Age'>21</td>
                    <td id='Sex'>Male</td>
                    <td id='Address'>Ibang planeta</td>
                    <td id='Department'>Albion Online</td>
                    <td id='Job Position'>Gatherer - Lumberjack</td>
                    <td id='Contact Number'>00000000000</td>
                    <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                </tr>
                <tr onclick='highlightSelectedRow(this)'>
                    <td id='First Name'>Alhine Stephen</td>
                    <td id='Middle Name'>Presto</td>
                    <td id='Last Name'>Baliton</td>
                    <td id='Extension'>N/A</td>
                    <td id='Age'>21</td>
                    <td id='Sex'>Male</td>
                    <td id='Address'>Ibang planeta</td>
                    <td id='Department'>Albion Online</td>
                    <td id='Job Position'>Gatherer - Miner</td>
                    <td id='Contact Number'>00000000000</td>
                    <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                </tr>
                <tr onclick='highlightSelectedRow(this)'>
                    <td id='First Name'>Kyle Daniel</td>
                    <td id='Middle Name'>Gatpandan</td>
                    <td id='Last Name'>Javines</td>
                    <td id='Extension'>N/A</td>
                    <td id='Age'>21</td>
                    <td id='Sex'>Male</td>
                    <td id='Address'>Ibang planeta</td>
                    <td id='Department'>Albion Online</td>
                    <td id='Job Position'>Gatherer - Miner</td>
                    <td id='Contact Number'>00000000000</td>
                    <td id='Email'>chronicallypuyat9to5@gmail.com</td>
            </tr>
            </tbody>
        </table>

            

            
            
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
            <div class='table-container'>
            <table>
                <thead id='tableHead' class='table-head'>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Extension</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Job Position</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id='tableBody'>
                    <tr onclick='highlightSelectedRow(this)'>
                        <td id='First Name'>Jefferson</td>
                        <td id='Middle Name'>Manglicmot</td>
                        <td id='Last Name'>Franco</td>
                        <td id='Extension'>N/A</td>
                        <td id='Age'>21</td>
                        <td id='Sex'>Male</td>
                        <td id='Address'>Purok 3, Brgy. West Dirita, San Antonio, Zambales</td>
                        <td id='Department'>Albion Online</td>
                        <td id='Job Position'>Gatherer - Lumberjack</td>
                        <td id='Contact Number'>00000000000</td>
                        <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                    </tr>
                    <tr onclick='highlightSelectedRow(this)'>
                        <td id='First Name'>Justin Chris</td>
                        <td id='Middle Name'>Apostol</td>
                        <td id='Last Name'>De Leon</td>
                        <td id='Extension'>N/A</td>
                        <td id='Age'>21</td>
                        <td id='Sex'>Male</td>
                        <td id='Address'>Ibang planeta</td>
                        <td id='Department'>Albion Online</td>
                        <td id='Job Position'>Gatherer - Skinner</td>
                        <td id='Contact Number'>00000000000</td>
                        <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                    </tr>
                    <tr onclick='highlightSelectedRow(this)'>
                        <td id='First Name'>Marvine Ray</td>
                        <td id='Middle Name'>Abarra</td>
                        <td id='Last Name'>Fernandez</td>
                        <td id='Extension'>N/A</td>
                        <td id='Age'>21</td>
                        <td id='Sex'>Male</td>
                        <td id='Address'>Ibang planeta</td>
                        <td id='Department'>League of Legends</td>
                        <td id='Job Position'>Top Laner</td>
                        <td id='Contact Number'>00000000000</td>
                        <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                    </tr>
                    <tr onclick='highlightSelectedRow(this)'>
                        <td id='First Name'>Alhine Stephen</td>
                        <td id='Middle Name'>Presto</td>
                        <td id='Last Name'>Baliton</td>
                        <td id='Extension'>N/A</td>
                        <td id='Age'>21</td>
                        <td id='Sex'>Male</td>
                        <td id='Address'>Ibang planeta</td>
                        <td id='Department'>Minecraft</td>
                        <td id='Job Position'>Builder</td>
                        <td id='Contact Number'>00000000000</td>
                        <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                    </tr>
                    <tr onclick='highlightSelectedRow(this)'>
                        <td id='First Name'>Kyle Daniel</td>
                        <td id='Middle Name'>Gatpandan</td>
                        <td id='Last Name'>Javines</td>
                        <td id='Extension'>N/A</td>
                        <td id='Age'>21</td>
                        <td id='Sex'>Male</td>
                        <td id='Address'>Ibang planeta</td>
                        <td id='Department'>Albion Online</td>
                        <td id='Job Position'>Gatherer - Miner</td>
                        <td id='Contact Number'>00000000000</td>
                        <td id='Email'>chronicallypuyat9to5@gmail.com</td>
                </tr>
                </tbody>
            </table>
            </div>
            <div class='table-controls'>
                <form action='admin-dashboard.php'>
                    <button id='addEmployee' type='button' onclick='addEmployeee()'>Add Employee</button>
                    <button id='editData' type='button' onclick='editDataa()'>Edit Employee</button>
                    <button id='deleteData' type='button' onclick='deleteDataa()'>Delete Employee</button>
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
                        <select class='departDropDownFilter'>
                            <option value='Department'> Department </option>
                            <option value='Lumberjack'> Lumberjack </option>
                            <option value='Miner'> Miner </option>
                            <option value='Skinner'> Skinner </option>
                            <option value='Harverster'> Harverster </option>
                        </select>
                        <select class='jobPosiDropDownFilter'>
                            <option value='Job Position'> Job Position </option>
                            <option value='Top Laner'> Top Laner</option>
                            <option value='Jungler'> Jungler </option>
                            <option value='Mid'> Mid </option>
                            <option value='Bottom'> Bottom </option>
                            <option value='Support'> Support </option>
                        </select>
                    </form>

                    <div class='table-container'>
                
                    <table>
                    <thead id='tableHead' class='table-head'>
                        <tr>
                            <td>Employee ID</td>
                            <td>Employee Name</td>
                            <td>Department</td>
                            <td>Job Position</td>
                            <td>Wage Per Hour</td>
                            <td>Total Hours (Week)</td>
                            <td>Gross Pay (Week)</td>
                            <td>Total Hours (Month)</td>
                            <td>Gross Pay (Month)</td>
                        </tr>
                    </thead>
                    <tbody id='tableBody'>
                        <tr onclick='highlightSelectedRow(this)'>
                            <td id='Employee ID'>1</td>
                            <td id='Employee Name'>Jefferson Manglicmot Franco</td>
                            <td id='Department'>League of Legends</td>
                            <td id='Job Position'>Top Laner</td>
                            <td id='Wage Per Hour'>$5</td>
                            <td id='Total Hours (Week)'>72</td>
                            <td id='Gross Pay (Week)'>$360</td>
                            <td id='Total Hours (Month)'>288</td>
                            <td id='Gross Pay (Month)'>$1440</td>
                        </tr>
                        <tr onclick='highlightSelectedRow(this)'>
                            <td id='Employee ID'>2</td>
                            <td id='Employee Name'>Justin Chris Apostol De Leon</td>
                            <td id='Department'>Albion Online</td>
                            <td id='Job Position'>Gatherer - Skinner</td>
                            <td id='Wage Per Hour'>$5</td>
                            <td id='Total Hours (Week)'>72</td>
                            <td id='Gross Pay (Week)'>$360</td>
                            <td id='Total Hours (Month)'>288</td>
                            <td id='Gross Pay (Month)'>$1440</td>
                        </tr>
                        <tr onclick='highlightSelectedRow(this)'>
                            <td id='Employee ID'>3</td>
                            <td id='Employee Name'>Marvine Ray Abarra Fernandez</td>
                            <td id='Department'>Albion Online</td>
                            <td id='Job Position'>Gatherer - Lumberjack</td>
                            <td id='Wage Per Hour'>$5</td>
                            <td id='Total Hours (Week)'>72</td>
                            <td id='Gross Pay (Week)'>$360</td>
                            <td id='Total Hours (Month)'>288</td>
                            <td id='Gross Pay (Month)'>$1440</td>
                        </tr>
                        <tr onclick='highlightSelectedRow(this)'>
                            <td id='Employee ID'>4</td>
                            <td id='Employee Name'>Alhine Stephen Presto Baliton</td>
                            <td id='Department'>Minecraft</td>
                            <td id='Job Position'>Builder</td>
                            <td id='Wage Per Hour'>$5</td>
                            <td id='Total Hours (Week)'>72</td>
                            <td id='Gross Pay (Week)'>$360</td>
                            <td id='Total Hours (Month)'>288</td>
                            <td id='Gross Pay (Month)'>$1440</td>
                        </tr>
                        <tr onclick='highlightSelectedRow(this)'>
                            <td id='Employee ID'>5</td>
                            <td id='Employee Name'>Kyle Daniel Gatpandan Javines</td>
                            <td id='Department'>Minecraft</td>
                            <td id='Job Position'>Gatherer</td>
                            <td id='Wage Per Hour'>$5</td>
                            <td id='Total Hours (Week)'>72</td>
                            <td id='Gross Pay (Week)'>$360</td>
                            <td id='Total Hours (Month)'>288</td>
                            <td id='Gross Pay (Month)'>$1440</td>
                        </tr>
                    </tbody>
                </table>

                    </div>
                    <div class='table-controls'>
                        <form action=''>
                            <button type='button' onclick='editPayrollDataa()'>Edit Payroll Data</button>
                            <button type='button' onclick='printPayrollDataa()'>Print Payroll Data</button>
                        </form>
                    </div>
                </div>
            ";
    
        }

        ob_end_clean();
    }
   

?>