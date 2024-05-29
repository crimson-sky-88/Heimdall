<?php

    echo"
        <div class='pop-up-wrapper' id='popUpRowDataEmployee' style='display: none'>
            <div class='form-container'>
                <div class='form-header'>
                    <h3>Employee Registration</h3>
                </div>
                <form action='admin-dashboard.php' method='post'>
                    <div class='input-group-registration'>
                        <input name='queryPlaceholderEmployeeTable' id='queryPlaceholderEmployeeTable' type='text' style='display:none'>
                        <input class='popUpInputs' name='emp_firstname' type='text' placeholder='First Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_middlename' type='text' placeholder='Middle Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_lastname' type='text' placeholder='Last Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_extension' type='text' placeholder='Extension'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_age' type='text' placeholder='Age'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_address' type='text' placeholder='Address'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_contactNumber' type='text' placeholder='Contact Number'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='emp_email' type='email' placeholder='Email'>
                    </div>
                    <div class='input-group-registration-radio'>
                        <label><input class='Sex' type='radio' name='emp_sex' id='MaleInput' value='Male'>Male</label>
                        <label><input class='Sex' type='radio' name='emp_sex' id='FemaleInput' value='Female'>Female</label>
                    </div>
                    <div class='input-group-registration-select'>
                        <select class='departDropDownPopUp' name='job_department' onchange='departmentClicked()'>
                            <option value='' disabled selected>Department</option>
                            <option value='Albion Online'>Albion Online</option>
                            <option value='League of Legends'>League of Legends</option>
                            <option value='Minecraft'>Minecraft</option>
                        </select>
                        <select class='jobPosiDropDownPopUp' name='job_position'>
                            <option value='' disabled selected>Job Position</option>
                        </select>
                        <div class='input-group-registration'>
                            <input type='text' class='popUpInputs' name='emp_id' placeholder='Employee ID' disabled>
                        </div>
                    </div>
                    <div class='pop-up-form-control'>
                        <button type='submit' onclick='executePopUpEmployeeAddData()' name='buttonPopUpEmployeeAddData'>Confirm</button>          <!-- ONLY THE FINAL PUSH IS SUBMIT -->
                        <button type='button' onclick='closePopUpp(1)'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    ";

?>