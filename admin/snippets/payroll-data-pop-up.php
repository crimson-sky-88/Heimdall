<?php

    echo"
    <div class='pop-up-wrapper' id='popUpRowDataPayroll' style='display: none'>
        <div class='form-container'>
            <div class='form-header'>
                <h3>Payroll Data</h3>
            </div>
            <form action='admin-dashboard-employeePayroll.php' method='post'>
                <div class='input-group-registration'>
                    <input name='queryPlaceholderEmployeePayroll' id='queryPlaceholderEmployeePayroll' type='text' style='display:none'>
                    <input class='popUpInputs' type='text' name='emp_employeeName' placeholder='Employee Name' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='job_wage' placeholder='Wage Per Hour'>
                </div>

                <div class='input-group-registration-select'>
                    <select class='departDropDownPopUp' name='job_department' onchange='departmentClicked()' disabled>
                        <option value='' disabled selected>Department</option>
                        <option value='Albion Online'>Albion Online</option>
                        <option value='League of Legends'>League of Legends</option>
                        <option value='Minecraft'>Minecraft</option>
                    </select>
                        <select class='jobPosiDropDownPopUp' name='job_position' disabled>
                            <option value='' disabled selected>Job Position</option>
                        </select>
                    <div class='input-group-registration'>
                        <input type='text' class='popUpInputs' name='emp_id' placeholder='Employee ID' disabled>
                    </div>
                </div>
                <div class='pop-up-form-control'>
                    <button type='submit' onclick='executePopUpEditPayroll()' name='buttonPopUpEditPayroll'>Confirm</button>
                    <button type='button' onclick='closePopUpp(2)'>Cancel</button>
                </div>
            </form>
        </div>
    </div>
    ";
?>