<?php

    echo"
    <div class='pop-up-wrapper' id='popUpRowDataPayroll' style='display: none'>
        <div class='form-container'>
            <div class='form-header'>
                <h3>Payroll Data</h3>
            </div>
            <form action='backend/adminFunctions.js' method='post'>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Employee Name' placeholder='Employee Name' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Wage Per Hour' placeholder='Wage Per Hour' >
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Total Hours (Week)' placeholder='Total Hours (Week)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Gross Pay (Week)' placeholder='Gross Pay (Week)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Total Hours (Month)' placeholder='Total Hours (Month)' disabled>
                </div>
                <div class='input-group-registration'>
                    <input class='popUpInputs' type='text' name='Gross Pay (Month)' placeholder='Gross Pay (Month)' disabled>
                </div>
                
                <div class='input-group-registration-select'>
                    <select class='departDropDownPopUp' name='Department' onchange='departmentClicked()'>
                        <option value='' disabled selected>Department</option>
                        <option value='Albion Online'>Albion Online</option>
                        <option value='League of Legends'>League of Legends</option>
                        <option value='Minecraft'>Minecraft</option>
                    </select>
                        <select class='jobPosiDropDownPopUp' name='Job Position'>
                            <option value='' disabled selected>Job Position</option>
                        </select>
                    <select name='Mode of Payment'>
                        <option value='' disabled selected>Mode of Payment</option>
                        <option value='Gcash'>Gcash</option>
                        <option value='Paymaya'>Paymaya</option>
                        <option value='PayPal'>PayPal</option>
                    </select>
                    <div class='input-group-registration'>
                        <input type='text' name='Employee ID' class='popUpInputs' placeholder='Employee ID' disabled>
                    </div>
                </div>
                <div class='pop-up-form-control'>
                    <button type='button' onclick='executePopUpPayroll()'>Confirm</button>
                    <button type='button' onclick='closePopUpp(2)'>Cancel</button>
                </div>
            </form>
        </div>
    </div>
    ";
?>