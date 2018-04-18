$(document).ready(function () {
    // Confirm clicks
    $('.confirm').click(function () {
        if (!window.confirm('Are you sure?')) {
            return false;
        }
    });

    // Create all the WYSIWYG editors
    var editors = [];

    $('.simplemde').each(function () {
        editors[$(this).attr('id')] = new SimpleMDE({
            autoDownloadFontAwesome: true,
            element: $(this)[0],
            tabSize: 4
        });
    });

    // Date/time pickers
    $.datetimepicker.setLocale('en');
    $('.datetimepicker').datetimepicker({
        format:'Y-m-d H:i:s'
    });
});
