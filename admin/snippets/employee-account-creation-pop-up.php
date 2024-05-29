<?php

    echo "
    <div class='account-pop-up-wrapper' id='popUpRowDataAccountCreate' style='display: none'>
        <div class='account-form-container'>
            <div class='form-header'>
                <h3>Account Creation</h3>
            </div>
            <div class='form-description'>
                <p>Please fill out the form to continue</p>
            </div>
            <form action='admin-dashboard.php' method='post'>
                <div class='input-group-creation'>
                    <input type='text' class='popUpInputs' name='emp_username' placeholder='Username' >
                </div>
                <div class='input-group-creation'>
                    <input type='password' class='popUpInputs' name='emp_password' placeholder='Password' >
                </div>
                <div class='input-group-creation'>
                    <input type='password' placeholder='Repeat Password' >
                </div>
                <div class='pop-up-form-control'>
                    <button type='button' onclick='executePopUpAccCreate()' name='popUpAccCreateButton'>Confirm</button>
                    <button type='button' onclick='closePopUpp(0)'>Cancel</button>
                </div>
            </form>
        </div>
    </div>
    ";
?>