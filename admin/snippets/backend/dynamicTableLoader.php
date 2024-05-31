<?php
    include_once 'mysqlConn.php';                       // mysql connection
?>
<script type='text/javascript'>

// SAVIOR
    var attendanceQueryPlaceholder = document.getElementById("attendanceQueryPlaceholder");
    var queryPlaceholderEmployeeTable = document.getElementById("queryPlaceholderEmployeeTable");
    var queryPlaceholderEmployeePayroll = document.getElementById("queryPlaceholderEmployeePayroll");

// TABLES

    var dashboardTable = document.getElementById('dashboardTable');
    var employeeTable = document.getElementById('employeeTable');
    var employeeSalaryTable = document.getElementById('employeeSalaryTable');

// MAIN TABS

    var employeeTab = document.getElementById('employeeTab');

// BUTTONS 

    var dashboardButton = document.getElementById('dashboardButton');
    var employeesButton = document.getElementById('employeesButton');
    var employeePayrollButton = document.getElementById('employeePayrollButton');

    dashboardButton.addEventListener("click", () => {

        document.location.href = "admin-dashboard-dashboard.php";
        employeeTab.style.display = "none";

    });

    employeesButton.addEventListener("click", () => {

        document.location.href = "admin-dashboard-employees.php";

    });

    employeePayrollButton.addEventListener("click", () => {

        document.location.href = "admin-dashboard-employeePayroll.php";
        employeeTab.style.display = "none";

    });

    // LOG OUT
        var logOutButton = document.getElementById('logOutButton');
        logOutButton.addEventListener('click', () => {

            if(confirm("Are you sure to Log Out?")){
                document.location.href = "../index.php";
            }

        })

    // PRESENT EMPLOYEE

        function presentEmployeeee(){
            if(highlightedRoww != ""){
                
                // get year, month, day
                <?php
                    $year = date("Y");
                    $month = date("M");
                    $day = date("d");
                ?>
                // insert into attendance_data

                let emp_id = highlightedRoww.children[0].innerText;

                let queryy = "insert into attendance_data(employee_id, att_year, att_month, att_day) values("+ emp_id +",'"+ "<?php echo $year ?>" +"','"+ "<?php echo $month ?>" +"',"+ "<?php echo $day ?>" +")";
                console.log(queryy);
                attendanceQueryPlaceholder.value = queryy;
            }
        }

// BUTTONS BUT PHP
<?php

    // mysql Query
    if(isset($_POST['presentEmployee'])){
        anyInsertQuery($_POST['attendanceQueryPlaceholder']);
    }

    if(isset($_POST['buttonPopUpEmployeeAddData'])){
        anyInsertQuery($_POST['queryPlaceholderEmployeeTable']);
    }

    if(isset($_POST['buttonPopUpEditPayroll'])){
        anyInsertQuery($_POST['queryPlaceholderEmployeePayroll']);
    }   

// DELETE DATA
    if(isset($_POST['deleteDataa'])){

        anyInsertQuery($_POST['attendanceQueryPlaceholder']);

    }

?>

// DELETE DATA

    function deleteDataaa(){

        if(highlightedRoww != ""){
        // insert into employee
            let emp_id = highlightedRoww.children[0].innerText;

            let queryy = "delete from employee where emp_id = " + emp_id + ";";
            console.log(queryy);

            if(confirm("Are you sure to delete this employee?")){
                attendanceQueryPlaceholder.value = queryy;
            }else{
                queryy = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id;";
                attendanceQueryPlaceholder.value = queryy;
            }
        }

    }

// DASHBOARD STATS
    function loadStats(){

        let statContainer = document.getElementsByClassName('stat-container');

        statContainer[0].children[1].innerText = <?php echo outputQueryAmountOfEmployees(); ?>;
        statContainer[1].children[1].innerText = <?php echo outputQueryAmountOfEmployeesPresent()?>;
        statContainer[2].children[1].innerText = "<?php echo date('d') . " " . date('M') . " " . date('Y') ?>";

    }

// FILTER TABLE DATA

    // placeholders
    var queryPlaceholderDashboardTab = document.getElementById('queryPlaceholderDashboardTab');
    var queryPlaceholderEmployeeTab = document.getElementById('queryPlaceholderEmployeeTab');
    var queryPlaceholderPayrollTab = document.getElementById('queryPlaceholderPayrollTab');

    var dashboardTabForm = document.getElementById('dashboardTabForm');
    var employeeTabForm = document.getElementById('employeeTabForm');
    var employeePayrollTabForm = document.getElementById('employeePayrollTabForm');

    // id filter
    var inputFilterFindID = document.getElementById('inputFilterFindID');

    // form query string

    function employeeTabFilter(x){
        let querry;
        if(x == 0){
            querry = "select employee.emp_id, concat(employee.emp_firstname, ' ',employee.emp_middlename, ' ',employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName, salary.job_department, salary.job_position, att_month, att_day, att_year from employee join attendance_data on employee.emp_id=attendance_data.employee_id join salary on employee.emp_jobid=salary.job_id where att_day = '" + <?php echo date('d')?> + "' and att_month = '" + "<?php echo date('M')?>" + "' and att_year = '" + <?php echo date('Y')?> + "'";
        }else if(x == 1){
            querry = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName , employee.emp_extension, salary.job_department, salary.job_position, salary.job_wage FROM employee JOIN salary WHERE employee.emp_jobid=salary.job_id";
        }else if(x == 2){
            querry = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id";
        }
        
        queryPlaceholderEmployeeTab.value = filterQueries(querry, x);
    }
    
    <?php
    // SEARCH FILTER BUTTON 
    if(isset($_POST['filterSearchEmployeeTab'])){           // DOESNT WORK
     
        if($_SESSION['whatTabAmI'] == "dashboard"){
            $_SESSION['dashboardSearchFiltered'] = "true";
        }else if($_SESSION['whatTabAmI'] == "employee"){
            $_SESSION['employeeSearchFiltered'] = "true";
        }else if($_SESSION['whatTabAmI']== "employeeSalary"){
            $_SESSION['employeeSalarySearchFiltered'] = "true";
        }

        $_SESSION['queryFilterPlaceholder'] = $_POST['queryPlaceholderEmployeeTab'];
        ?> renderFilteredTables('<?php echo $_SESSION['whatTabAmI'] ?>' + 'Table');  // $_SESSION[''] <?php

    }
    
    ?>

    function filterQueries(querry, x){

        let depart = departDropDownFilter.value;
        let jobPosi = jobPosiDropDownFilter.value;
        let emp_id = inputFilterFindID.value;

        if(emp_id != ""){
            querry = querry.concat(" and employee.emp_id = '" + emp_id);
            querry = querry.concat("';");
        }else if(depart != "" && depart != "All Department"){
            querry = querry.concat(" and salary.job_department = '" + depart);

            if(jobPosi != "Job Position"){
                querry = querry.concat("' and salary.job_position = '" + jobPosi);
            }

            querry = querry.concat("';");
        }else if(depart == "All Department" || depart == ""){
        // default
            if(x == 0){
                querry = "select employee.emp_id, concat(employee.emp_firstname, ' ',employee.emp_middlename, ' ',employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName, salary.job_department, salary.job_position, att_month, att_day, att_year from employee join attendance_data on employee.emp_id=attendance_data.employee_id join salary on employee.emp_jobid=salary.job_id where att_day = " + '<?php echo date('d')?>' + " and att_month = '" + '<?php echo date('M')?>' + "' and att_year = '" + '<?php echo date('Y')?>' +"';";
            }else if(x == 1){
                querry = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id;"
            }else if(x == 2){
                querry = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName , employee.emp_extension, salary.job_department, salary.job_position, salary.job_wage FROM employee JOIN salary WHERE employee.emp_jobid=salary.job_id;";
            }
        }
        
        return querry;
    };

// LOAD AUTO

    window.addEventListener('load', () =>{

        if("<?php echo $_SESSION['whatTabAmI']?>" == "dashboard"){
            loadStats();
 
            if("<?php echo $_SESSION['dashboardSearchFiltered']?>" == "false"){
                loadTable("<?php echo $_SESSION['whatTabAmI']?>");                                  // $_SESSION OF WHAT I PRESSED
            }        

        }else if("<?php echo $_SESSION['whatTabAmI']?>" == "employee"){

            if("<?php echo $_SESSION['employeeSearchFiltered']?>" == "false"){
                loadTable("<?php echo $_SESSION['whatTabAmI']?>");
            }        

        }else if("<?php echo $_SESSION['whatTabAmI']?>" == "employeeSalary"){

            if("<?php echo $_SESSION['employeeSalarySearchFiltered']?>" == "false"){
                loadTable("<?php echo $_SESSION['whatTabAmI']?>");
            }      

        }


    });

// CLEAR TABLE

    function clearTable(){

        let currentTab = employeeTable;

        let tableChildren = currentTab.children.length;
        for(let i = tableChildren - 1; i > -1; i--) {

            currentTab.children[i].remove();

        }

    }
    
// LOAD TABLE

    function loadTable(currentTabb){                         

        let currentTab;
        if(currentTabb === 'dashboard'){
            currentTab = dashboardTable;
            outputATTENDANCE(currentTab);
        }else if(currentTabb === 'employee'){
            currentTab = employeeTable;
            outputEMPLOYEE(currentTab);
        }else if(currentTabb === 'employeeSalary'){
            currentTab = employeeSalaryTable;
            outputPAYROLL(currentTab);
        }

    }

    function outputATTENDANCE(currentTab){              
        let field = [];
        <?php 
        $result = outputQueryEmployeesPresent();                     // PASS $_SESSION for php mysql queries

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
                            'att_day': 'Day',
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
                                        'emp_id': ''
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
        let employeeRegisArray = ["emp_firstname", "emp_middlename", "emp_lastname", "emp_extension", "emp_age", "emp_address", "emp_contactNumber", "emp_email", "emp_sex", "job_department", "job_position", "emp_id"];
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
            addquery += "VALUES ( '"  + x["Account Creation"]["emp_username"] + "', '" + x["Account Creation"]["emp_password"] + "', '" + x["Employee Registration"]["emp_firstname"] + "', '" + x["Employee Registration"]["emp_middlename"] + "', '" + x["Employee Registration"]["emp_lastname"];
            addquery += "', '" + x["Employee Registration"]["emp_extension"] + "', '" + x["Employee Registration"]["emp_age"] + "', '" + x["Employee Registration"]["emp_sex"] + "', '";
            addquery += x["Employee Registration"]["emp_address"] + "', '" + x["Employee Registration"]["emp_contactNumber"] + "', '" + x["Employee Registration"]["emp_email"] + "', '" +jobPosiID + "');"

        queryPlaceholderEmployeeTable.value = addquery;             // put query string to an input tag to send to php after submit
    }

    function alterQueryAdminEmployeeTable(x){

        // special case
        let jobPosiID;
        let arrayOfJobPosi = ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier', 'Top Laner', 'Mid Laner', 'Bot Laner', 'Jungler', 'Support', 'Gatherer', 'Builder', 'Crafter', 'Adventurer'];
        for(let i = 0; i < arrayOfJobPosi.length; i++){
            if(x["Employee Registration"]['job_position'] == arrayOfJobPosi[i]){

                jobPosiID = i + 1;              // because job_id in database starts at 1
                break;
            }
        }

        let addquery = "update employee SET emp_firstname ='" + x["Employee Registration"]["emp_firstname"] + "', emp_middlename = '" + x["Employee Registration"]["emp_middlename"] + "', emp_lastname = '" + x["Employee Registration"]["emp_lastname"] +  "', emp_extension = '" + x["Employee Registration"]["emp_extension"];
            addquery += "', emp_age = '" + x["Employee Registration"]["emp_age"] + "', emp_sex = '" + x["Employee Registration"]["emp_sex"] +  "', emp_address = '" + x["Employee Registration"]["emp_address"] + "', emp_email = '" +x["Employee Registration"]["emp_email"] + "', emp_contactNumber = '" + x["Employee Registration"]["emp_contactNumber"];
            addquery += "', emp_jobid = '" + jobPosiID + "' where emp_id = '" + x["Employee Registration"]["emp_id"]+ "';";

        queryPlaceholderEmployeeTable.value = addquery;
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

        queryPlaceholderEmployeePayroll.value = addquery;
    }  


    function renderFilteredTables(currentTabb){

        let currentTab;
        if(currentTabb === 'dashboardTable'){
            currentTab = dashboardTable;
        }else if(currentTabb === 'employeeTable'){
            currentTab = employeeTable;
        }else if(currentTabb === 'employeeSalaryTable'){
            currentTab = employeeSalaryTable;
        }
        
    // INPUT TABLE ROWS     

        let field = [];
        <?php 

            $result = anyOutputQuery($_SESSION['queryFilterPlaceholder']);
 
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

    function outputQueryEmployeesPresent(){
        $mysqlConn = mysqlCon();

        $day = date('d');
        $month = date('M');
        $year = date('Y');

        $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ',employee.emp_middlename, ' ',employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName, salary.job_department, salary.job_position, att_month, att_day, att_year from employee join attendance_data on employee.emp_id=attendance_data.employee_id join salary on employee.emp_jobid=salary.job_id where att_day = ". $day ." and att_month = '". $month ."' and att_year = '". $year ."';";

        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
        return $result;

    }

    function outputQueryAmountOfEmployees(){

        $mysqlConn = mysqlCon();

        $queryy = "select emp_id from employee";

        $result = $mysqlConn->query($queryy);

        $rowcount = mysqli_num_rows($result);

        $mysqlConn->close();
        return $rowcount;
    }

    function outputQueryAmountOfEmployeesPresent(){

        $mysqlConn = mysqlCon();

        $day = date('d');
        $month = date('M');
        $year = date('Y');
    
        $queryy = "select att_log from attendance_data where att_day = ". $day ." and att_month = '". $month ."' and att_year = '". $year ."' ;";

        $result = $mysqlConn->query($queryy);   

        $rowcount = mysqli_num_rows($result);

        $mysqlConn->close();
        return $rowcount;
    }

    function anyOutputQuery($queryy){
        // THIS IS FKIN ANNOYINNG (one time its fine, then it wont shut up)

        if($queryy == ""){
            if($_SESSION['whatTabAmI'] == "employee"){
            $queryy = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id;";
            }else if($_SESSION['whatTabAmI'] == "employeeSalary"){
                $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName , employee.emp_extension, salary.job_department, salary.job_position, salary.job_wage FROM employee JOIN salary WHERE employee.emp_jobid=salary.job_id;";
            }else if($_SESSION['whatTabAmI'] == "dashboard"){
                $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ',employee.emp_middlename, ' ',employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName, salary.job_department, salary.job_position, att_month, att_day, att_year from employee join attendance_data on employee.emp_id=attendance_data.employee_id join salary on employee.emp_jobid=salary.job_id where att_day = ". date('d') ." and att_month = '". date('M') ."' and att_year = '". date('Y') ."';";
            } 
        }

        $mysqlConn = mysqlCon();

        $result = $mysqlConn->query($queryy);// "select * from employee"
        
        $mysqlConn->close();

        return $result;
    }

    function anyInsertQuery($queryy){                                   // must already structured

        $mysqlConn = mysqlCon();

        $mysqlConn->query($queryy);   

        $mysqlConn->close();
    }

?>