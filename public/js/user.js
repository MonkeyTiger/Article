$(document).ready(function() {
    $('#search input').keypress(function(event) {
        if (event.keyCode === 13) {
            search();
        }
    });

    $('#search button').click(function(event) {
        search();
    });

    function search() {
        window.location.href = gSiteURL + 'search?g=' + $('#search input').val()
    }
});