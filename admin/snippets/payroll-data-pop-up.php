<?php

    echo"
    <div class='pop-up-wrapper' id='popUpRowDataPayroll' style='display: none'>
        <div class='form-container'>
            <div class='form-header'>
                <h3>Payroll Data</h3>
            </div>
            <form action='admin-dashboard.php' method='post'>
                <div class='input-group-registration'>
                    <input name='queryPlaceholderEmployeePayroll' id='queryPlaceholderEmployeePayroll' type='text' style='display:none'>
                    <input class='popUpInputs' type='text' name='emp_employeeName' placeholder='Employee Name' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='job_wage' placeholder='Wage Per Hour'>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' class='popUpInputCalculate' type='text' name='Total Hours (Week)' placeholder='Total Hours (Week)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputCalculate' type='text' name='Gross Pay (Week)' placeholder='Gross Pay (Week)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputCalculate' type='text' name='Total Hours (Month)' placeholder='Total Hours (Month)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputCalculate' type='text' name='Gross Pay (Month)' placeholder='Gross Pay (Month)' disabled>
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
                    <select name='Mode of Payment'>
                        <option value='' disabled selected>Mode of Payment</option>
                        <option value='Gcash'>Gcash</option>
                        <option value='Paymaya'>Paymaya</option>
                        <option value='PayPal'>PayPal</option>
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