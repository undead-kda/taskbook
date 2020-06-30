$(document).ready(function() {
    var radiorel = 0;
    $('input[name="radio-1"]').on('change', function(e) {
        radiorel = e.target.value;
        $('.task-link').each(function() {
            var href = $(this).attr('href');
            var value = href.replace(/(sort=)[^&]+/ig, '$1' + radiorel);
            $(this).attr('href', value);
        });
    });
});