//Drop Down
var lookup = {
    'Albion Online': ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier'],
    'League of Legends': ['Top Laner', 'Mid Laner', 'Jungler', 'Bot Laner', 'Support'],
    'Minecraft': ['Gatherer', 'Builder', 'Crafter', 'Adventurer'],
    };

$('#departDropDownPopUp').on('change', function() {
   
    var selectValue = $(this).val();
   
    $('#jobPosiDropDownPopUp').empty();
    
    for (i = 0; i < lookup[selectValue].length; i++) {
        $('#jobPosiDropDownPopUp').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
});

