// EMPLOYEES TAB

    // UP FOR CHANGE
        var rowClicked = "red";
        var rowUnClicked = "yellow";
        var popUpLabelAddEmployee = "Add Employee";
        var popUpLabelProfileEdit = "Profile Edit";
        var popUpLabelProfileDelete = "Profile Delete";
    
    // POPUP close/open
        let displayValue;
        let popUpOpen = false;
        var popUpRowData = document.getElementById("pop-up-wrapperr");

        function closePopUpp(){
            alert("closed popUp");
            if(popUpOpen){
                displayValue = "none";
            }else{
                displayValue = "block";
            }

            popUpRowData.style.display = displayValue;

            popUpOpen = !popUpOpen;                                 // returns opposite value

        }

    // LOAD POP UP DATA

        var departDropDownPopUp = document.getElementById("departDropDownPopUp");
        var jobPosiDropDownPopUp = document.getElementById("jobPosiDropDownPopUp");

        function loadPopUp(highlightedRow, mode){

            popUpRowData.style.display = "block";
            popUpOpen = true;

        // array of pop up values
            let popUpValuesInputText = document.getElementsByClassName("popUpInputs");    

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

                    if(departDropDownPopUp.name == highlightedRow.children[i].id){

                        let index = selectIndex(departDropDownPopUp, highlightedRow.children[i].innerText);
                        departmentSelectChanged(departDropDownPopUp.value);

                        departDropDownPopUp.selectedIndex = index;

                    }
                    if(jobPosiDropDownPopUp.name == highlightedRow.children[i].id){

                        let index = selectIndex(jobPosiDropDownPopUp, highlightedRow.children[i].innerText);

                        jobPosiDropDownPopUp.selectedIndex = index;

                    }
                    popUpValuesCounter--;
                }

            }

        // button visiblity
            if(mode === "employee"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelAddEmployee;                                               // change title of Pop Up
                
                jobPosiDropDownPopUp.readOnly = false;
                departDropDownPopUp.readOnly = false;

            }else if(mode === "edit"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelProfileEdit;

                jobPosiDropDownPopUp.readOnly = false;
                departDropDownPopUp.readOnly = false;

            }else if(mode === "delete"){

                popUpRowData.children[0].children[0].children[0].innerText = popUpLabelProfileDelete;

                jobPosiDropDownPopUp.readOnly = true;
                departDropDownPopUp.readOnly = true;

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

            jobPosiDropDownPopUp.selectedIndex = 0;

            for(let i = 1; i < jobPosiDropDownPopUp.length; i++){                           // remove previous options

                jobPosiDropDownPopUp.remove(i);

            }

            var lookup = {

                'Albion Online': ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier'],
                'League of Legends': ['Top Laner', 'Mid Laner', 'Jungler', 'Bot Laner', 'Support'],
                'Minecraft': ['Gatherer', 'Builder', 'Crafter', 'Adventurer']
            };

            for(let i = 1; i < jobPosiDropDownPopUp.length; i++){                           // remove previous options

                jobPosiDropDownPopUp.remove(i);

            }

            for(let i = 0; i < lookup[departValue].length; i++){
                
                var option = document.createElement('option');
                option.value = lookup[departValue][i];
                option.innerHTML = lookup[departValue][i];

                jobPosiDropDownPopUp.appendChild(option);

            }

            if(x){                                              // cheap ahh solution       // select seems to be buggy af

                jobPosiDropDownPopUp.remove(1);
            
            }
            
            x = true;

        }

        function departmentClicked(){

            departmentSelectChanged(departDropDownPopUp.value);

        }

    // check if department / jobPosition
        function isDepartOrJobPos(x){

            for(let i = 1; i < departDropDownPopUp.length; i++){                          // start at 1 for 0 is default value

                if (departDropDownPopUp.children[i].value == x){

                    return true;
                }

            }
            
            for(let i = 1; i < jobPosiDropDownPopUp.length; i++){

                if(jobPosiDropDownPopUp.children[i].value == x){

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

            if(popUpValuesInputText[i].type == text){
                popUpValuesInputText[i].value = "";
            }
            
        }

        document.getElementById("MaleInput").checked = false;
        document.getElementById("FemaleInput").checked = false;

        departDropDownPopUp.selectedIndex = 0;
        departmentSelectChanged('Department');
        jobPosiDropDownPopUp.selectedIndex = 0;
        
    }

    // Add Employee
    function addEmployi(){
        let popUpValuesInputText = document.getElementsByClassName("popUpInputs");    

        // clear popUp inputs
        clearPopUpsInputs();
        
        // show popUp
        popUpRowData.style.display = "block";
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
        var highlightedRow = "", oldHighlightedRow;
        var oneTimeSwitch = false;
        
        function highlightSelectedRow(x) {

            if(oneTimeSwitch){                                  // dont run this at first execute

                oldHighlightedRow = highlightedRow;
                oldHighlightedRow.style.backgroundColor = rowUnClicked;

            }
        
            highlightedRow = x;                    // get parent/row of selected cell
            highlightedRow.style.backgroundColor = rowClicked;

            oneTimeSwitch = true;
            
        }

    // ADD EMPLOYEE
    
        function addEmployeee(){
            //popUpRowData.blur();

            addEmployi();
            // mysql query
        }

    // EDIT DATA

        function editDataa(){

            if(highlightedRow != ""){

                loadPopUp(highlightedRow, "edit");
                // mysql query

            }
            
        }

    // DELETE DATA

        function deleteDataa(){

            // mysql query

            // load table

        }

// EMPLOYEE PAYROLL TAB
    
    // EDIT PAYROLL DATA
        function editPayrollDataa(){

            

        }

    // PRINT PAYROLL DATA
        function printPayrollDataa(){



        }