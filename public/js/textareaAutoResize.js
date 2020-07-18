// $(document).ready(function () {
//     $('textarea').on('keyup keypress', function () {
//         $(this).height('45px');
//         $(this).height(this.scrollHeight);
//     });
// });

$(document).ready(function () {

    // console.log($(event.target).attr('id'));
    $('textarea').on('input', function (event) {

        // console.log($(event.target).attr('id'))

        var selector = $(event.target).attr('id')
        var textbox = selector.split('-');

        if ('comment' === textbox[0]) {
            $('#' + selector).css('height', '48px');
            $('#' + selector).css('height', this.scrollHeight + "px");
        }

        else if ('tweet' === textbox[0]) {
            console.log(textbox);
            $('#' + selector).css('height', '80px');
            $('#' + selector).css('height', this.scrollHeight + "px");
        }
    });
})

