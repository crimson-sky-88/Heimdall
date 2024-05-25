// SELECTION TAB
    function changeTab(){

        clearPopUpsInputs();

    };

// EMPLOYEES TAB

    // UP FOR CHANGE
        var rowClicked = "red";
        var rowUnClicked = "yellow";
        var popUpLabelAddEmployee = "Add Employee";
        var popUpLabelProfileEdit = "Profile Edit";
        var popUpLabelPayoutEdit = "Payroll Data";
    
    // POPUP close/open
        let displayValue;
        let popUpOpen = false;
        var popUpRowDataEmployee = document.getElementById("popUpRowDataEmployee");

        function closePopUpp(){
            alert("closed popUp");
            if(popUpOpen){
                displayValue = "none";
            }else{
                displayValue = "block";
            }

            popUpRowDataEmployee.style.display = displayValue;

            popUpOpen = !popUpOpen;                                 // returns opposite value

        }

    // LOAD POP UP DATA

        var departDropDownPopUp = document.getElementsByClassName("departDropDownPopUp");
        var jobPosiDropDownPopUp = document.getElementsByClassName("jobPosiDropDownPopUp");
        var dropDownID;

        function loadPopUp(highlightedRow, popUpRowData, mode){

            popUpRowData.style.display = "block";
            popUpOpen = true;

        // array of pop up values
            let popUpValuesInputText = popUpRowData.getElementsByClassName("popUpInputs");    

            // input values

            var popUpValuesCounter = -1;
            for(let i = 0; i < highlightedRow.children.length; i++){

                popUpValuesCounter++;

                if(!isDepartOrJobPos(highlightedRow.children[i].innerText)){                                                                    // checks if for inputText
                // put clicked row data to pop up
                        // text inputs
                
                    if(highlightedRow.children[i].id != "Sex"){

                        for(let k = 0; k < highlightedRow.children.length; k++){            // dynamic search to search for all value fit
                           
                            if(popUpValuesInputText[popUpValuesCounter].name == highlightedRow.children[k].id){
                                console.log(popUpValuesInputText[popUpValuesCounter].name);

                                popUpValuesInputText[popUpValuesCounter].value = highlightedRow.children[k].innerText;

                            }    
                        }
                        
                    }else{
                    // radio inputs
                        // only one must be active

                        if(highlightedRow.children[i].innerText == "Male"){

                            document.getElementById("MaleInput").checked = true;
                            document.getElementById("FemaleInput").checked = false;
                            
                        }else if(highlightedRow.children[i].innerText == "Female"){

                            document.getElementById("MaleInput").checked = false;
                            document.getElementById("FemaleInput").checked = true;

                        }
                        
                        popUpValuesCounter--;
                    }

                }else{  

                    if(departDropDownPopUp[dropDownID].name == highlightedRow.children[i].id){

                        let index = selectIndex(departDropDownPopUp[dropDownID], highlightedRow.children[i].innerText);
                        departmentSelectChanged(departDropDownPopUp[dropDownID].value);

                        departDropDownPopUp[dropDownID].selectedIndex = index;

                    }
                    if(jobPosiDropDownPopUp[dropDownID].name == highlightedRow.children[i].id){

                        let index = selectIndex(jobPosiDropDownPopUp[dropDownID], highlightedRow.children[i].innerText);

                        jobPosiDropDownPopUp[dropDownID].selectedIndex = index;

                    }
                    popUpValuesCounter--;
                }

            }

        // button visiblity
            if(mode === "addEmployee"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelAddEmployee;                                               // change title of Pop Up

            }else if(mode === "editEmployee"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelProfileEdit;

            }else if(mode === "editPayroll"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelPayoutEdit;

            } 

        }

    // find index of select value
        function selectIndex(dropDown, value){
            for(let i = 0; i < dropDown.length; i++){

                dropDown.selectedIndex = i;

                if(dropDown.value === value){
                    return i;
                }               

            }

            return -1;
        }

        var x = false;
    // change values of jobPositionDropDown
        function departmentSelectChanged(departValue){

            jobPosiDropDownPopUp[dropDownID].selectedIndex = 0;

            for(let i = 1; i < jobPosiDropDownPopUp[dropDownID].length; i++){                           // remove previous options

                jobPosiDropDownPopUp[dropDownID].remove(i);

            }

            var lookup = {

                'Albion Online': ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier'],
                'League of Legends': ['Top Laner', 'Mid Laner', 'Jungler', 'Bot Laner', 'Support'],
                'Minecraft': ['Gatherer', 'Builder', 'Crafter', 'Adventurer']
            };

            for(let i = 1; i < jobPosiDropDownPopUp[dropDownID].length; i++){                           // remove previous options

                jobPosiDropDownPopUp[dropDownID].remove(i);

            }

            if(departValue != "Department"){
                for(let i = 0; i < lookup[departValue].length; i++){
                
                    var option = document.createElement('option');
                    option.value = lookup[departValue][i];
                    option.innerHTML = lookup[departValue][i];

                    jobPosiDropDownPopUp[dropDownID].appendChild(option);

                }
            }
            

            if(x){                                              // cheap ahh solution       // select seems to be buggy af

                jobPosiDropDownPopUp[dropDownID].remove(1);
            
            }
            
            x = true;

        }

        function departmentClicked(){

            departmentSelectChanged(departDropDownPopUp[dropDownID].value);

        }

    // check if department / jobPosition
        function isDepartOrJobPos(x){

            for(let i = 1; i < departDropDownPopUp[dropDownID].length; i++){                          // start at 1 for 0 is default value
                if (departDropDownPopUp[dropDownID].children[i].value == x){

                    return true;

                }

            }
            
            for(let i = 1; i < jobPosiDropDownPopUp[dropDownID].length; i++){

                if(jobPosiDropDownPopUp[dropDownID].children[i].value == x){

                    return true;

                }

            }
            return false;

        }

    // clear popUp inputs
    function clearPopUpsInputs(){

        // clear inputs
        let popUpValuesInputText = document.getElementsByClassName("popUpInputs");    

        for(let i = 0; i < popUpValuesInputText.length; i++){

            if(popUpValuesInputText[i].type == "text" || popUpValuesInputText[i].type == "email"){
                popUpValuesInputText[i].value = "";
            }
            
        }

        document.getElementById("MaleInput").checked = false;
        document.getElementById("FemaleInput").checked = false;

        departDropDownPopUp[dropDownID].selectedIndex = 0;
        departmentSelectChanged('Department');
        jobPosiDropDownPopUp[dropDownID].selectedIndex = 0;
        
    }

    // Add Employee
    function addEmployi(){
        let popUpValuesInputText = document.getElementsByClassName("popUpInputs");    

        // clear popUp inputs
        clearPopUpsInputs();
        
        // show popUp
        popUpRowDataEmployee.style.display = "block";
        popUpOpen = true;

        // execute / return query string 
        let queryString;
        queryString += "insert into employee";

        for(let i = 0; i < popUpValuesInputText.length; i++){

            queryString += "";

        }

        return queryString;
    }

    // HIGHLIGHT SELECTED ROW
        var highlightedRoww = "", oldHighlightedRow;
        var oneTimeSwitch = false;
        
        function highlightSelectedRow(x) {

            if(oneTimeSwitch){                                  // dont run this at first execute

                oldHighlightedRow = highlightedRoww;
                oldHighlightedRow.style.backgroundColor = rowUnClicked;

            }
        
            highlightedRoww = x;                    // get parent/row of selected cell
            highlightedRoww.style.backgroundColor = rowClicked;

            oneTimeSwitch = true;
            
        }

    // ADD EMPLOYEE
    
        function addEmployeee(){
            //popUpRowDataEmployee.blur();
            dropDownID = 0;
            loadPopUp(highlightedRoww, popUpRowDataEmployee, "addEmployee");
            addEmployi();
            // mysql query
        }

    // EDIT DATA

        function editDataa(){

            if(highlightedRoww != ""){

                dropDownID = 0;
                loadPopUp(highlightedRoww, popUpRowDataEmployee, "editEmployee");
                // mysql query
                
            }
            
        }

    // DELETE DATA

        function deleteDataa(){

            // mysql query

            // load table

        }

// EMPLOYEE PAYROLL TAB
    
    var popUpRowDataPayroll = document.getElementById("popUpRowDataPayroll");

    // EDIT PAYROLL DATA
        function editPayrollDataa(){

            if(highlightedRoww != ""){

                dropDownID = 1;
                loadPopUp(highlightedRoww, popUpRowDataPayroll, "editPayroll");

            }
    
        }

    // PRINT PAYROLL DATA
        function printPayrollDataa(){



        }