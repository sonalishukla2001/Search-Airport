jQuery(document).ready(function($) {
    $.getJSON(airportSearch.jsonFile, function(airportsData) {
        var availableAirports = [];

        $.each(airportsData, function(key, val) {
            availableAirports.push({
                label: val.name + " (" + val.icao + ")",
                value: val.icao
            });
        });

        $('#airport-search').autocomplete({
            source: availableAirports,
            minLength: 2,
            select: function(event, ui) {
                $('#airport-search-hidden').val(ui.item.value);
            }
        });
    });
});
