jQuery(document).ready(function () {



    $('button[name=like],button[name=dislike]').click(function (event) {
        event.preventDefault();

        var path = null;
        var method = 'POST';
        var like = false;

        if ($(this).attr('name') == 'like') {
            path = $(":hidden#like").attr('url'); // path set to like
            like = true;

        } else {
            path = $(":hidden#dislike").attr('url'); // path set to dislike
            method = $(':hidden[name=_method]').attr('value');
        }

        console.log($(this).attr('name'));
        console.log(method);
        console.log(path)
        console.log(like);
        console.log('csrf-token : ' + $(':hidden[name="_token"]').attr('value'));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $(':hidden[name="_token"]').attr('value'),
            }
        });
        $.ajax({
            url: path,
            method: method,
            data: {
                like: like,
            }

        }).done(function () {

        });
    });
});