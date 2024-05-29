<?php

    include_once 'mysqlConn.php';                       // mysql connection

    // MAIN BUTTON
    ?>
<script type='text/javascript'>


// LOAD TABLE
    function loadTable(currentTab){                           // PASS $_SESSION for php mysql queries
        let field = [];

        <?php 
        $result = outputQueryDashboard("attendance_data", "", "", "");
        
        while($field = $result->fetch_field()){?>                   // THE SAME AS FETCH ASSOC
            
            field.push("<?php echo $field->name ?>");

        <?php } ?>;

        loadTableData(field, currentTab);

        <?php 
        while ($row = $result->fetch_assoc()){?>

            let row = <?php echo $row ?>
            loadTableData(row, currentTab);

        <?php } ?>;

    }

        // find tables
            var dashboardTable = document.getElementById('dashboardTable');
            var employeeTable = document.getElementById('employeeTable');
            var employeeSalaryTable = document.getElementById('employeeSalaryTable');

            function loadTableData(newField, tableToUpdate){
                let thead = document.createElement('thead');
                thead.id = 'tableHead';
                thead.class = 'table-head';

                let tbody = document.createElement('tbody');
                tbody.id = 'tableBody';

            // append to html table
                let x = tableToUpdate.children[0];                                          // check if field exist
                if(x == undefined){
                    tableToUpdate.appendChild(dynamicNewRow(thead, newField));
                }else{
                    tableToUpdate.appendChild(dynamicNewRow(tbody, newField));
                }

            }

        // CRAETE NEW FIELD OR ROW
            function dynamicNewRow(container, newField){              // container = thead/tbody

                let tr = document.createElement('tr');
                //tr.onclick = 'highlightSelectedRow(this)';

                for(let i = 0; i < newField.length; i++){
                    let td = document.createElement('td');
                    td.innerText = newField[i];
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
    function outputQueryDashboard($table, $emp_username, $att_year, $att_month, $joins){                             // run if table is shown, table is updated/popUp data is modified

        $mysqlConn = mysqlCon();

        $queryy = 'select * from ' . $table;
        
        /*
        if($emp_username != ""){                                                  // should filter if selected nothing         / Department is default == nothing

            $queryy = $queryy . ' where emp_username = ' . $emp_username;

            if($att_year != "Year" || $att_year != ""){

                $queryy = $queryy . ' and where att_year = ' . $att_year;

            }
            
            if($att_month != 'Month' || $att_month != ""){

                $queryy = $queryy . ' and where att_month = ' . $att_month;

            }
            
        }

        if($joins != ""){

            $queryy = $queryy

        }
        */
        $result = $mysqlConn->query($queryy);   

        $mysqlConn->close();
        return $result;
    }

    function outputQuerySalaries($table, $departValue, $jobPosiValue){

        $queryy = '';


        return $queryy;
    }

    // QUERY TABLE DATA to database

    function inputQuery(){

        

    }

    // UPDATE TABLE DATA to database

    function updateQuery(){                              // update database

        

    }
?>

