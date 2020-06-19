retweetCurrent = function retweetCurrent(val) {
    // console.log(val.value);
    // let tweetValues = val.value.split('-');
    console.log(val.dataset.url);
    // console.log(val.action);
    // let tweetVal = val.id.split('-');
    let data = {
        method: 'POST',
        path: val.dataset.url,
        message: 'greate work'

    }
    ajaxAction(data);

}

function ajaxAction(values) {
    $.ajaxSetup({
        headers: {
            // 'X-CSRF-TOKEN': $(':hidden[name="_token"]').attr('value'),
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: values.path,
        method: 'POST',
        data: {
            retweet: values.message,
        },
        success: function (data) {
            if (data.success == 'retweeted') {
                return alert('Retweet Successful');
            } else {
                return alert('Retweet Removed');
            }

        }

    });
}