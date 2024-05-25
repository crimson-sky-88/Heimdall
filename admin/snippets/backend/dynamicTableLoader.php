<?php                                               // HEAVILY MODIFIED

    include_once 'mysqlConn.php';                       // mysql connection

    // LOAD TABLE
        function loadTable($result){                        // this is for >> showing employee salary, employees, timeIn/timeOut = dashboard

            $departDropDownPopUp = $_POST["departDropDownPopUp"];
            $jobPosiDropDownPopUp = $_POST["jobPosiDropDownPopUp"];

            $fields = $result->fetch_field();                   // returns array of fields                      // just text
            
            echo "<thead id='tableHead' class='table-head'>";
                dynamicNewField($fields);          // put all fields in 
            echo "</thead>";

            echo "<tbody> id='tableBody'";
            while($row = $result->fetch_assoc()){               // loops until no more array/row data in $result
                echo "<tr onclick='highlightSelectedRow(this)'>";
                    dynamicNewRow($row);
                echo "</tr>";
            };
            echo "</tbody>";

        }

    // ADD NEW COLUMN
        function dynamicNewField($numColumn){

            for($i = 0; $i < sizeof($numColumn); $i++){

                echo "<td>" + $numColumn[$i] + "<td>";

            }

        }

    // ADD NEW ROW
        function dynamicNewRow($rowData){

            for($i = 0; $i < sizeof($rowData); $i++){

                echo "<td name=''>" + $rowData[$i] + "</td>";

            };

        }



    // EMPLOYEE SALARY COMPUTATION

        function employeeHourlyCounter(){   // use php to use date/time function
            
        }

        function employeeWeeklyCounter(){   // use hourlyCounter and add all hours for 7 days

        }

        function employeeMonthlyCounter(){  // use hourlyCounter and add all hours for 30 days

        }

    // QUERY TABLE DATA from database

    function outputQueryDashboard($table, $departValue, $jobPosiValue){                             // run if table is shown, table is updated/popUp data is modified

        $queryy = "select * from " . $table;
        if($departValue != "Department"){                                                  // should filter if selected nothing         / Department is default == nothing

            $queryy = $queryy . " where department = " . $departValue;

            if($jobPosiValue != "Job Position"){

                $queryy = $queryy . " and where job_position = " . $jobPosiValue;

            }
        }

        $result = mysqlConn()->query($queryy);
        
        return $result;
    }

    function outputQuerySalaries($table, $departValue, $jobPosiValue){

        $queryy = "";

        return $queryy;
    }

    // QUERY TABLE DATA to database

    function inputQuery(){

        

    }

    // UPDATE TABLE DATA to database

    function updateQuery(){                              // update database

        

    }
?>
