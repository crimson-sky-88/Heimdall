<?php

    echo"
    <div class='pop-up-wrapper'>
        <div class='form-container'>
            <div class='form-header'>
                <h3>Payroll Data</h3>
            </div>
            <form action=''>
                <div class='input-group-registration'>
                    <input type='number' placeholder='Employee Name' disabled>
                </div>
                <div class='input-group-registration'>
                    <input type='text' placeholder='Wage Per Hour' disabled>
                </div>
                <div class='input-group-registration'>
                    <input type='text' placeholder='Total Hours (Week)'>
                </div>
                <div class='input-group-registration'>
                    <input type='text' placeholder='Gross Pay (Week)'>
                </div>
                <div class='input-group-registration'>
                    <input type='number' placeholder='Total Hours (Month)'>
                </div>
                <div class='input-group-registration'>
                    <input type='text' placeholder='Gross Pay (Month)'>
                </div>
                
                <div class='input-group-registration-select'>
                    <select id='departments'>
                        <option value='' disabled selected>Department</option>
                        <option value='albion-online'>Albion Online</option>
                        <option value='league-of-legends'>League of Legends</option>
                        <option value='minecraft'>Minecraft</option>
                    </select>
                    <select id='positions'>
                        <option value='' disabled selected>Job Position</option>
                    </select>
                    <select name='' id='mode-of-payment'>
                        <option value='' disabled selected>Mode of Payment</option>
                        <option value='gcash'>Gcash</option>
                        <option value='paymaya'>Paymaya</option>
                        <option value='paypal'>PayPal</option>
                    </select>
                    <div class='input-group-registration'>
                        <input type='number' placeholder='Account ID'>
                    </div>
                </div>
                <div class='pop-up-form-control'>
                    <button>Confirm</button>
                    <button>Cancel</button>
                </div>
            </form>
        </div>
    </div>
    ";
?>