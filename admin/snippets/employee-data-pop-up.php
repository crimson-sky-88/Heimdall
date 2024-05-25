<?php

    echo"
        <div class='pop-up-wrapper' id='popUpRowDataEmployee' style='display: none'>
            <div class='form-container'>
                <div class='form-header'>
                    <h3>Employee Registration</h3>
                </div>
                <form action='backend/adminFunctions.js' method='post'>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='First Name' type='text' placeholder='First Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Middle Name' type='text' placeholder='Middle Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Last Name' type='text' placeholder='Last Name'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Extension' type='text' placeholder='Extension'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Age' type='text' placeholder='Age'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Address' type='text' placeholder='Address'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Contact Number' type='text' placeholder='Contact Number'>
                    </div>
                    <div class='input-group-registration'>
                        <input class='popUpInputs' name='Email' type='email' placeholder='Email'>
                    </div>
                    <div class='input-group-registration-radio'>
                        <label><input class='y' type='radio' name='Sex' id='MaleInput' value='Male'>Male</label>
                        <label><input class='' type='radio' name='Sex' id='FemaleInput' value='Female'>Female</label>
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
                    </div>
                    <div class='pop-up-form-control'>
                        <button type='button' onclick='executePopUpEmployeeData()'>Confirm</button>
                        <button type='button' onclick='closePopUpp(1)'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    ";

?>