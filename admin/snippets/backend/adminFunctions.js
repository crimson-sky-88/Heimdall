// SELECTION TAB
    var blockAndBlur = document.getElementById('blockAndBlur');

// EMPLOYEES TAB

    // UP FOR CHANGE
        var rowClicked = "red";
        var rowUnClicked = "yellow";
        var popUpLabelAddEmployee = "Add Employee";
        var popUpLabelProfileEdit = "Profile Edit";
        var popUpLabelPayoutEdit = "Payroll Data";
    
    // POPUP close/open
        var popUpRowDataEmployee = document.getElementById("popUpRowDataEmployee");

        function closePopUpp(passed){

            let popUpData;                                              // passed parameter from onlick
            if(passed === 0){
                popUpData = popUpRowDataAccountCreate;
            }else if(passed === 1){
                popUpData = popUpRowDataEmployee;
                }else if(passed === 2){
                popUpData = popUpRowDataPayroll;
            }
            
            blockAndBlur.style.display = "none";
            popUpData.style.display = "none";

            

        }

    // LOAD POP UP DATA

        var departDropDownPopUp = document.getElementsByClassName("departDropDownPopUp");
        var jobPosiDropDownPopUp = document.getElementsByClassName("jobPosiDropDownPopUp");
        var dropDownID;

        function loadPopUp(highlightedRow, popUpRowData, mode){

            blockAndBlur.style.display = "block";
            popUpRowData.style.display = "block";
            popUpOpen = true;

        // array of pop up values
            let popUpValuesInputText = popUpRowData.getElementsByClassName("popUpInputs");    

            // input values

            if(highlightedRow != ""){

            // only take the vialble fields in highlighted row


            var popUpValuesCounter = -1;
            for(let i = 0; i < highlightedRow.children.length; i++){                                                // i = 1 because we dont want id to show
                popUpValuesCounter++;
                
                if(!isDepartOrJobPos(highlightedRow.children[i].innerText)){                                                                    // checks if for inputText
                // put clicked row data to pop up
                // text inputs
                    if(highlightedRow.children[i].id != "emp_sex"){
                    
                        for(let k = 0; k < highlightedRow.children.length; k++){            // dynamic search to search for all value fit
                            if(popUpValuesInputText[popUpValuesCounter].name == highlightedRow.children[k].id){

                                popUpValuesInputText[popUpValuesCounter].value = highlightedRow.children[k].innerText;
                                break;
                            }    
                        }
                        
                    }else{
                    // radio inputs
                        // only one must be active
                        
                        if(highlightedRow.children[i].innerText == "M"){

                            document.getElementById("MaleInput").checked = true;
                            document.getElementById("FemaleInput").checked = false;
                            
                        }else if(highlightedRow.children[i].innerText == "F"){

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

            }
        // change label
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

            if(departValue != "job_department"){
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

        function departmentClik(){

            // mysql query
            departmentSelect(departDropDownFilter[0].value);

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
        departmentSelectChanged('job_department');
        jobPosiDropDownPopUp[dropDownID].selectedIndex = 0;
        
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
    
    var popUpRowDataAccountCreate = document.getElementById("popUpRowDataAccountCreate");

        function addEmployeee(){

            dropDownID = 0;
            blockAndBlur.style.display = "block";
            popUpRowDataAccountCreate.style.display = "block";

            // mysql query
        }

    // EDIT DATA

        function editDataa(){

            if(highlightedRoww != ""){

                dropDownID = 0;
                blockAndBlur.style.display = "block";
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
    
    var departDropDownFilter = document.getElementsByClassName('departDropDownFilter');             // 3 elements
    var jobPosiDropDownFilter = document.getElementsByClassName('jobPosiDropDownFilter');
    //var dropDownIDD;

function departmentSelect(departValue){

    let dropDownIDDd = 0;

    jobPosiDropDownFilter[dropDownIDDd].selectedIndex = 0;

    for(let i = 1; i < jobPosiDropDownFilter[dropDownIDDd].length; i++){                           // remove previous options

        jobPosiDropDownFilter[dropDownIDDd].remove(i);

    }

    let lookupp = {

        'Albion Online': ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier'],
        'League of Legends': ['Top Laner', 'Mid Laner', 'Jungler', 'Bot Laner', 'Support'],
        'Minecraft': ['Gatherer', 'Builder', 'Crafter', 'Adventurer']
    };

    for(let i = 1; i < jobPosiDropDownFilter[dropDownIDDd].length; i++){                           // remove previous options

        jobPosiDropDownFilter[dropDownIDDd].remove(i);

    }

    if(departValue != "job_department"){
        for(let i = 0; i < lookupp[departValue].length; i++){
        
            var option = document.createElement('option');
            option.value = lookupp[departValue][i];
            option.innerHTML = lookupp[departValue][i];

            jobPosiDropDownFilter[dropDownIDDd].appendChild(option);

        }
    }
    
    if(x){                                              // cheap ahh solution       // select seems to be buggy af

        jobPosiDropDownFilter[dropDownIDDd].remove(1);
    
    }
    
    x = true;

}

    var popUpRowDataPayroll = document.getElementById("popUpRowDataPayroll");

    // EDIT PAYROLL DATA
        function editPayrollDataa(){
            if(highlightedRoww != ""){

                dropDownID = 1;
                blockAndBlur.style.display = "block";
                loadPopUp(highlightedRoww, popUpRowDataPayroll, "editPayroll");

            }
    
        }

    // PRINT PAYROLL DATA
        function printPayrollDataa(){

            window.print();

        }

// MYSQL

    function getPopUpData(popUpData){

        //let popUpValuesInputText = document.getElementsByClassName("popUpInputs");  
        popUpRowDataPayroll
        let popUpId;
        
        // popUpData id parser                                                          // im in too deep, im not changing sht
        if(popUpData.id === popUpRowDataAccountCreate.id){
            popUpId = 'Account Creation';
        }else if(popUpData.id === popUpRowDataEmployee.id){
            popUpId = 'Employee Registration';
        }else if(popUpData.id === popUpRowDataPayroll.id){
            popUpId = 'Payroll Data';
        }

        let parseInputClass = popUpData.getElementsByClassName('popUpInputs');

        let popUpDataInput = {
            
            'Account Creation': {
                                    'emp_username': '',
                                    'emp_password': '',
                                },
            'Employee Registration': {                                              // can be Profile Edit
                                        'emp_firstname': '',
                                        'emp_middlename': '',
                                        'emp_lastname': '',
                                        'emp_extension': '',
                                        'emp_age': '',
                                        'emp_address': '',
                                        'emp_contactNumber': '',
                                        'emp_email': '',
                                        'emp_sex': '',
                                        'job_department': '',
                                        'job_position': '',
                                        'emp_id': ''
                                     },
            'Payroll Data': {
                                'emp_employeeName': '',
                                'job_wage': '',
                                'Total Hours (Week)': '',
                                'Gross Pay (Week)': '',
                                'Total Hours (Month)': '',
                                'Gross Pay (Month)': '',
                                'job_department': '',
                                'job_position': '',
                                'Mode of Payment': '',
                                'emp_id': ''
                            }
        };
        // parse input data
            // text / password / email
        for(let i = 0; i < parseInputClass.length; i++){                                            // no need to check popUpDataInput is guaranteed to exist
            console.log(parseInputClass[i].name + " " + parseInputClass[i].value);
            popUpDataInput[popUpId][parseInputClass[i].name] = parseInputClass[i].value;

        };

        // parse sex
        let parseSex = popUpData.getElementsByClassName('Sex');
        for(let i = 0; i < parseSex.length; i++){

            if(parseSex[i].checked){                                            // checks if radio is true

                popUpDataInput[popUpId][parseSex[i].name] = parseSex[i].value;

            }

        }
        
        // parse dropDown data
        let parseDepartDropDown = popUpData.getElementsByClassName('departDropDownPopUp');
        let parseJobPosiDropDown = popUpData.getElementsByClassName('jobPosiDropDownPopUp');

        if(parseDepartDropDown.length != 0){
            popUpDataInput[popUpId][parseDepartDropDown[0].name] = parseDepartDropDown[0].value;                                                                       // 0 for it is only one popUp at a time
            popUpDataInput[popUpId][parseJobPosiDropDown[0].name] = parseJobPosiDropDown[0].value;
        }

        
        return popUpDataInput;
    }

    var whereAddingNow = false;
    function executePopUpAccCreate(){
        highlightedRoww = "";                       //create function remove highlight

        collectQuery(getPopUpData(popUpRowDataAccountCreate));

        closePopUpp(0);

        whereAddingNow = true;

        clearPopUpsInputs();
        loadPopUp(highlightedRoww, popUpRowDataEmployee, "addEmployee");
    }

    function executePopUpEmployeeAddData(){
        if(whereAddingNow){
            inputQueryAdminEmployeeTable(collectQuery(getPopUpData(popUpRowDataEmployee)));
        }else{
            alterQueryAdminEmployeeTable(collectQuery(getPopUpData(popUpRowDataEmployee)));
        }

        resetObjectPlaceholder();

        clearPopUpsInputs();

        whereAddingNow = false
        
        closePopUpp(1);
    }

    function executePopUpEditPayroll(){
        alert("ADFDD");

        alterQueryAdminPayroll(collectQuery(getPopUpData(popUpRowDataPayroll)));
        resetObjectPlaceholder();                                                       // FINAL INPUT
        clearPopUpsInputs();

        closePopUpp(2);
    }