//Drop Down
var lookup = {
    'albion-online': ['Gatherer - Lumberjack', 'Gatherer - Harvester', 'Gatherer - Skinner', 'Gatherer - Fisherman', 'Gatherer - Miner', 'Gatherer - Quarrier'],
    'league-of-legends': ['Top Laner', 'Mid Laner', 'Jungler', 'Bot Laner', 'Support'],
    'minecraft': ['Gatherer', 'Builder', 'Crafter', 'Adventurer'],
    };

    $('#departments').on('change', function() {
   
    var selectValue = $(this).val();
   
    $('#positions').empty();
    
    for (i = 0; i < lookup[selectValue].length; i++) {
        $('#positions').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
});