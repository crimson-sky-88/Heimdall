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
            <form action=''>
                <div class='input-group-creation'>
                    <input type='text' placeholder='Username' required>
                </div>
                <div class='input-group-creation'>
                    <input type='password' placeholder='Password' required>
                </div>
                <div class='input-group-creation'>
                    <input type='password' placeholder='Repeat Password' required>
                </div>
                <div class='pop-up-form-control'>
                    <button type='button' onclick='executePopUpAccCreate()'>Confirm</button>
                    <button type='button' onclick='closePopUpp(0)'>Cancel</button>
                </div>
            </form>
        </div>
    </div>
    ";
?>