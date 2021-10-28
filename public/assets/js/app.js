$(document).ready(function() {
    $(".numberonly").keydown(function(event) {
        // 46 for delete
        // 8 for backspace
        // 48-57 for 0-9 numbers
        // 9 for tab
        // 37, 39 left and right arrow
        if (
            event.keyCode == 46 ||
            event.keyCode == 9 ||
            event.keyCode == 37 ||
            event.keyCode == 39 ||
            event.keyCode == 8 ||
            (event.keyCode >= 48 && event.keyCode <= 57 && !event.shiftKey)
        ) {
            // let it happen, don't do anything
        } else {
            // Ensure that it is a number and stop the keypress
            event.preventDefault();
        }
    });

    $(".datepicker").datepicker({
        uiLibrary: "bootstrap4",
        format: "yyyy-mm-dd"
    });
});
