<?php

    include_once 'mysqlConn.php';                       // mysql connection

    // MAIN BUTTON
    ?>
<script type='text/javascript'>

// LOAD TABLE
    function loadTable(currentTab){                           // PASS $_SESSION for php mysql queries
        let field = [];

        <?php 
        $result = outputQueryEmployeeDashboard();
        
        while($field = $result->fetch_field()){?>                   // THE SAME AS FETCH ASSOC
        
            field.push("<?php echo $field->name ?>");

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

        // find tables
            var dashboardTable = document.getElementById('dashboardTable');
            var employeeTable = document.getElementById('employeeTable');
            var employeeSalaryTable = document.getElementById('employeeSalaryTable');

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

</script>
<?php
    function outputQueryEmployeeDashboard(){

        $mysqlConn = mysqlCon();

        // $_SESSION['id'];         // find the id of the employee logged in

        $queryy = "select employee.emp_id, employee.emp_firstname, employee.emp_middlename, employee.emp_lastname, employee.emp_extension, employee.emp_age, employee.emp_sex, employee.emp_address, employee.emp_email, employee.emp_contactNumber, salary.job_department, salary.job_position from employee join salary where employee.emp_jobid=salary.job_id;";

        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
        return $result;

    }

    function outputQueryWelcomeEmployee(){

        $mysqlConn = mysqlCon();

        // $_SESSION['id'];         // find the id of the employee logged in
    
        // find emp_employeeName, Job Position, wage per hour  where = $_SESSION['id']
        
        $queryy = "select employee.emp_id, concat(employee.emp_firstname, ' ', employee.emp_middlename, ' ', employee.emp_lastname, ' ', employee.emp_extension) as emp_employeeName , employee.emp_extension,
        salary.job_department, salary.job_position, salary.job_wage FROM employee join salary where employee.emp_jobid=salary.job_id;";

        $result = $mysqlConn->query($queryy);                                           // must only return 1

        $mysqlConn->close();

        return $result;
    }

    function anyInsertQuery($queryy){                                   // must already structured

        $mysqlConn = mysqlCon();

        $mysqlConn->query($queryy);   

        $mysqlConn->close();
    }
?>

