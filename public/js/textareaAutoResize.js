$(document).ready(function () {
    $('textarea').on('keyup keypress', function () {
        $(this).height('auto');
        $(this).height(this.scrollHeight);
    });
});