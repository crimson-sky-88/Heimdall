<div class="employee-table-wrapper" style="display:block">              <!-- CAN REMOVE -->
                <div class="table-header">
                    <h3>Employees</h3>
                </div>
                <div class="table-container">
                    
                <?php
                
                    include 'backend/tableForAll.html';
                
                ?>

                </div>
                <div class="table-controls">
                    <form action="">
                        <button id="addEmployee">Add Employee</button>
                        <button id="editData">Edit Employee</button>
                        <button id="deleteData">Delete Employee</button>
                    </form>
                </div>
            </div>