<?php
    include_once 'mysqlConn.php';                       // mysql connection
?>
<script type='text/javascript'>

// SAVIOR
    queriesPlaceholderInput = document.getElementById("queriesPlaceholderInput");

// TABLES
    var dashboardTable = document.getElementById('dashboardTable');
    var employeeTable = document.getElementById('employeeTable');
    var employeeSalaryTable = document.getElementById('employeeSalaryTable');

// MAIN TABS

    var dashboardTab = document.getElementById('dashboardTab');
    var employeeTab = document.getElementById('employeeTab');
    var employeeSalaryTab = document.getElementById('employeeSalaryTab');

// BUTTONS 

    var dashboardButton = document.getElementById('dashboardButton');
    var employeesButton = document.getElementById('employeesButton');
    var employeePayrollButton = document.getElementById('employeePayrollButton');

    dashboardButton.addEventListener("click", () => {

        dashboardTab.style.display = "block";
        employeeTab.style.display = "none";
        employeeSalaryTab.style.display = "none";

    });

    employeesButton.addEventListener("click", () => {

        dashboardTab.style.display = "none";
        employeeTab.style.display = "block";
        employeeSalaryTab.style.display = "none";

    });

    employeePayrollButton.addEventListener("click", () => {

        dashboardTab.style.display = "none";
        employeeTab.style.display = "none";
        employeeSalaryTab.style.display = "block";

    });

// BUTTONS BUT PHP
<?php

    // mysql Query
    if(isset($_POST['buttonPopUpEmployeeAddData'])){
        insertEmployee($_POST['queriesPlaceholderInput']);
    }

    if(isset($_POST['buttonPopUpEditPayroll'])){
        alterQueryEmployeeTable($_POST['queriesPlaceholderInput']);

    }

?>

// LOAD AUTO

    window.addEventListener('load', () =>{

        loadTable(dashboardButton);
        loadTable(employeesButton);
        loadTable(employeePayrollButton);

    });

// LOAD TABLE

    function loadTable(currentTabb){                         

        let currentTab;
        if(currentTabb.id === 'dashboardButton'){
            currentTab = dashboardTable;
            outputATTENDANCE(currentTab);
        }else if(currentTabb.id === 'employeesButton'){
            currentTab = employeeTable;
            outputEMPLOYEE(currentTab);
        }else if(currentTabb.id === 'employeePayrollButton'){
            currentTab = employeeSalaryTable;
            outputPAYROLL(currentTab);
        }
        
    }

    function outputATTENDANCE(currentTab){              
        let field = [];
        <?php 
        $result = outputQueryAdminDashboard();                     // PASS $_SESSION for php mysql queries

        while($field = $result->fetch_field()){?>                   // THE SAME AS FETCH ASSOC FOR ITTERATING

            field.push("<?php echo $field->name ?>");                       // only get column name for display purposes

        <?php } ?>;
        loadTableData(field, currentTab, "");

        let row = [];
        <?php 
        while ($row = $result->fetch_array()){ ?>                                   // loop for all record/row
            row = [];
            <?php
            for($i = 0; $i < $result->field_count; $i++){ ?>                                // get array from php to js             // cant pass value staight
                row.push("<?php echo $row[$i] ?>");
            <?php } ?>
            
            loadTableData(row, currentTab, field);

        <?php } ?>;
    }


    function outputEMPLOYEE(currentTab){                                                                                                 // YOU CAN SELECTIVELY RUN PHP FUNCTIONS WITH JAVASCRIPT FUNCTION????? WASTED MORE THAN 48 HOURS FOR THIS BULLSHIT
        let field = [];
        <?php 
        $result = outputQueryEmployeeTable();                     // PASS $_SESSION for php mysql queries

        while($field = $result->fetch_field()){?>                   // THE SAME AS FETCH ASSOC FOR ITTERATING

            field.push("<?php echo $field->name ?>");                       // only get column name for display purposes

        <?php } ?>;
        loadTableData(field, currentTab, "");

        let row = [];
        <?php 
        while ($row = $result->fetch_array()){ ?>                                   // loop for all record/row
            row = [];
            <?php
            for($i = 0; $i < $result->field_count; $i++){ ?>                                // get array from php to js             // cant pass value staight
                row.push("<?php echo $row[$i] ?>");
            <?php } ?>
            
            loadTableData(row, currentTab, field);

        <?php } ?>;

    }

    
    function outputPAYROLL(currentTab){                                                                                                 // YOU CAN SELECTIVELY RUN PHP FUNCTIONS WITH JAVASCRIPT FUNCTION????? WASTED MORE THAN 48 HOURS FOR THIS BULLSHIT
        let field = [];
        <?php 
        $result = outputQueryEmployeeSalary();                    // PASS $_SESSION for php mysql queries

        while($field = $result->fetch_field()){?>                   // THE SAME AS FETCH ASSOC FOR ITTERATING

            field.push("<?php echo $field->name ?>");                       // only get column name for display purposes

        <?php } ?>;
        loadTableData(field, currentTab, "");

        let row = [];
        <?php 
        while ($row = $result->fetch_array()){ ?>                                   // loop for all record/row
            row = [];
            <?php
            for($i = 0; $i < $result->field_count; $i++){ ?>                                // get array from php to js             // cant pass value staight
                row.push("<?php echo $row[$i] ?>");
            <?php } ?>
            
            loadTableData(row, currentTab, field);

        <?php } ?>;

    }

            function loadTableData(newField, tableToUpdate, columnNames){
                let thead = document.createElement('thead');
                thead.id = 'tableHead';
                thead.class = 'table-head';

                let tbody = document.createElement('tbody');
                tbody.id = 'tableBody';

            // append to html table
                let x = tableToUpdate.children[0];                                          // check if field exist
                if(x == undefined){
                    tableToUpdate.appendChild(dynamicNewRow(thead, newField, ""));
                }else{
                    tableToUpdate.appendChild(dynamicNewRow(tbody, newField, columnNames));
                }

            }

        // CRAETE NEW FIELD OR ROW
            function dynamicNewRow(container, newField, columnNames){                           // container = thead/tbody          // columnNames only for Tbody
                let tr = document.createElement('tr');

                if(container.id == "tableBody" && Array.isArray(columnNames)){
                    tr.setAttribute("onclick", "highlightSelectedRow(this)");               // only clickable for body
                    
                }

                // create table data
                for(let i = 0; i < newField.length; i++){
                    let td = document.createElement('td');

                    if(container.id == "tableBody" && Array.isArray(columnNames)){                 // 2nd condition is just incase i fcked up
                    // ONLY FOR TBODY !!

                        td.innerText = newField[i];
                        td.setAttribute("id", columnNames[i]);
                       
                    }else if(container.id == "tableHead" && !Array.isArray(columnNames)){
                    // ONLY FOR THEAD !!
                        // change values to show in table as fields
                        // FILTER !!

                        let filter = {
                            'emp_username': "Username",
                            'emp_password': "Password",
                            'emp_firstname': "First Name",
                            'emp_middlename': "Middle Name",
                            'emp_lastname': "Last Name",
                            'emp_extension': "Extension",
                            'emp_age': "Age",
                            'emp_address': "Address",
                            'emp_contactNumber': "Contact Number",
                            'emp_email': "Email",
                            'emp_sex': "Sex",
                            'emp_jobid': 'Job ID',
                            'job_id': '',
                            'job_department': "Department",
                            'job_position': "Job Position",
                            'emp_employeeName': "Employee Name",
                            'job_wage': "Wage Per Hour",
                            'emp_id': "Employee ID",
                            'employee_id': "Employee ID",
                            'att_present': '',
                            'att_year': 'Year',
                            'att_month': 'Month',
                            'att_day': '',
                            'att_clockin': 'CLOCK IN TIME',
                            'att_clockout': 'CLOCK OUT TIME',
                            'att_total': 'Hours Worked'
                        }

                        td.innerText = filter[newField[i]];
                        
                    }
                    
                    tr.appendChild(td);
                }
                
                container.appendChild(tr);

                return container;
            }

            function removeTable(){                                             // run first if changing to new tab

                

            };

    // EMPLOYEE SALARY COMPUTATION

        function employeeHourlyCounter(){   // use php to use date/time function
            
        }

        function employeeWeeklyCounter(){   // use hourlyCounter and add all hours for 7 days

        }

        function employeeMonthlyCounter(){  // use hourlyCounter and add all hours for 30 days

        }

    // QUERY TABLE DATA from database

        // QUERY TABLE DATA to database
    var departmentJobs = {
            
            'Account Creation': {
                                    'emp_username': '',
                                    'emp_password': '',
                                },
            'Employee Registration': {                                              // can be Profile Edit
                                        'emp_firstname': '',
                                        'emp_middlename': '',
                                        'emp_lastname': '',
                                        'emp_extension': '',
                                        'emp_age': '',
                                        'emp_address': '',
                                        'emp_contactNumber': '',
                                        'emp_email': '',
                                        'emp_sex': '',
                                        'job_department': '',
                                        'job_position': '',
                                     },
            'Payroll Data': {
                                'emp_employeeName': '',
                                'job_wage': '',
                                'Total Hours (Week)': '',
                                'Gross Pay (Week)': '',
                                'Total Hours (Month)': '',
                                'Gross Pay (Month)': '',
                                'job_department': '',
                                'job_position': '',
                                'Mode of Payment': '',
                                'emp_id': ''
                            }
        };
    function resetObjectPlaceholder(){
        departmentJobs = {
            
            'Account Creation': {
                                    'emp_username': '',
                                    'emp_password': '',
                                },
            'Employee Registration': {                                              // can be Profile Edit
                                        'emp_firstname': '',
                                        'emp_middlename': '',
                                        'emp_lastname': '',
                                        'emp_extension': '',
                                        'emp_age': '',
                                        'emp_address': '',
                                        'emp_contactNumber': '',
                                        'emp_email': '',
                                        'emp_sex': '',
                                        'job_department': '',
                                        'job_position': '',
                                     },
            'Payroll Data': {
                                'emp_employeeName': '',
                                'job_wage': '',
                                'Total Hours (Week)': '',
                                'Gross Pay (Week)': '',
                                'Total Hours (Month)': '',
                                'Gross Pay (Month)': '',
                                'job_department': '',
                                'job_position': '',
                                'Mode of Payment': '',
                                'emp_id': ''
                            }
        };
        
    }

    function collectQuery(x){                           // concatinate all collected data

            // only for the loops
        let accCreateArray = ["emp_username", "emp_password"];
        let employeeRegisArray = ["emp_firstname", "emp_middlename", "emp_lastname", "emp_extension", "emp_age", "emp_address", "emp_contactNumber", "emp_email", "emp_sex", "job_department", "job_position"];
        let payrollDataArray = ["job_wage", "Total Hours (Week)", "Gross Pay (Week)", "Total Hours (Month)", "Gross Pay (Month)", "job_department", "job_position", "Mode of Payment", "emp_id"];
                // ^ removed emp_employeeName for this is only for show
        for(let i = 0; i < accCreateArray.length; i++){
            if(x["Account Creation"][accCreateArray[i]] != ''){
                departmentJobs["Account Creation"][accCreateArray[i]] = x["Account Creation"][accCreateArray[i]];
            }
        }
        for(let i = 0; i < employeeRegisArray.length; i++){
            if(x["Employee Registration"][employeeRegisArray[i]] != ''){
                departmentJobs["Employee Registration"][employeeRegisArray[i]] = x["Employee Registration"][employeeRegisArray[i]];
            }
        }
        for(let i = 0; i < payrollDataArray.length; i++){
            if(x["Payroll Data"][payrollDataArray[i]] != ''){
                departmentJobs["Payroll Data"][payrollDataArray[i]] = x["Payroll Data"][payrollDataArray[i]];
            }
        }

        return departmentJobs;
    }

    function inputQueryAdminEmployeeTable(x){                                 // concatinate all collected data and parse here

        // special case
        let jobPosiID;
        let arrayOfJobPosi = ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier', 'Top Laner', 'Mid Laner', 'Bot Laner', 'Jungler', 'Support', 'Gatherer', 'Builder', 'Crafter', 'Adventurer'];
        for(let i = 0; i < arrayOfJobPosi.length; i++){
            if(x["Employee Registration"]['job_position'] == arrayOfJobPosi[i]){

                jobPosiID = i + 1;              // because job_id in database starts at 1
                break;
            }
        }

        let addquery = "INSERT INTO employee (emp_username, emp_password, emp_firstname, emp_middlename, emp_lastname, emp_extension, emp_age, emp_sex, emp_address, emp_contactNumber, emp_email ,emp_jobid)";
            addquery += "VALUES ( '"  + x["Employee Registration"]["emp_username"] + "', '" + x["Employee Registration"]["emp_password"] + "', '" + x["Employee Registration"]["emp_firstname"] + "', '" + x["Employee Registration"]["emp_middlename"] + "', '" + x["Employee Registration"]["emp_lastname"];
            addquery += "', '" + x["Employee Registration"]["emp_extension"] + "', '" + x["Employee Registration"]["emp_age"] + "', '" + x["Employee Registration"]["emp_sex"] + "', '";
            addquery += x["Employee Registration"]["emp_address"] + "', '" + x["Employee Registration"]["emp_contactNumber"] + "', '" + x["Employee Registration"]["emp_email"] + "', '" +jobPosiID + "');"

        queriesPlaceholderInput.value = addquery;             // put query string to an input tag to send to php after submit
    }

    function alterQueryAdminEmployeeTable(x){

        let addquery = "update employee SET emp_firstname =" + x["Employee Registration"]["emp_firstname"] + ", emp_middlename = " + x["Employee Registration"]["emp_middlename"] + ", emp_lastname = " + x["Employee Registration"]["emp_lastname"] +  ", emp_extension = " + x["Employee Registration"]["emp_extension"];
            addquery += ", emp_age = " + x["Employee Registration"]["emp_age"] + ", emp_sex = " + x["Employee Registration"]["emp_sex"] +  ", emp_address = " .x["Employee Registration"]["emp_address"] + ", emp_email = " +x["Employee Registration"]["emp_email"] + ", emp_contactNumber = " + x["Employee Registration"]["emp_contactNumber"] + ", emp_jobid = " .x["Employee Registration"]["emp_jobid"] + "where emp_id = " + x["Employee Registration"]["emp_id"]+ ";";

        queriesPlaceholderInput.value = addquery;
    }

    function alterQueryAdminPayroll(x){

        let jobPosiID;
        let arrayOfJobPosi = ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier', 'Top Laner', 'Mid Laner', 'Bot Laner', 'Jungler', 'Support', 'Gatherer', 'Builder', 'Crafter', 'Adventurer'];
        for(let i = 0; i < arrayOfJobPosi.length; i++){
            if(x["Payroll Data"]['job_position'] == arrayOfJobPosi[i]){

                jobPosiID = i + 1;              // because job_id in database starts at 1
                break;
            }
        }

        let addquery = "UPDATE salary SET job_wage = " + x['Payroll Data']['job_wage'] + " where job_id = " + jobPosiID + ";";

        queriesPlaceholderInput.value = addquery;
    }

</script>
<?php

// MYSQL QUERIES

    function outputQueryEmployeeTable(){
        $mysqlConn = mysqlCon();
        $queryy = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id;";

        $result = $mysqlConn->query($queryy);

        $mysqlConn->close();
        return $result;
    }

    function outputQueryEmployeeSalary(){
        $mysqlConn = mysqlCon();

        $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName , employee.emp_extension, salary.job_department, salary.job_position, salary.job_wage FROM employee JOIN salary WHERE employee.emp_jobid=salary.job_id;";

        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
        return $result;
    }

    function outputQueryAdminDashboard(){

        $mysqlConn = mysqlCon();

        $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as Name, salary.job_department, salary.job_position FROM employee join salary where employee.emp_jobid = salary.job_id";

        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
        return $result;

    }


    function insertEmployee($queryy){                                               // must already structured

        $mysqlConn = mysqlCon();

        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
    }

    function alterQueryEmployeeTable($queryy){                              // update database

        $mysqlConn = mysqlCon();

        $mysqlConn->query($queryy);   

        $mysqlConn->close();
    }

?>