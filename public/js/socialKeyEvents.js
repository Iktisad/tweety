class LikeDislikeRequest {
    /*
       *like or dislike
        id
        type : tweet or retweet
        path
        btn
        toggleSpan
        toggleBtn
       */

    constructor(event) {
        let idOfEl = event.id.split("-");
        let method;
        if (idOfEl[0] == 'like') {
            method = 'POST';
        } else {
            method = 'PATCH';
        }
        this.id = idOfEl[0];
        this.type = idOfEl[2];
        this.method = method;
        this.path = event.action;
        this.btn = event.lastChild;
        this.likeOrDislikeSpan = event.nextElementSibling;
        this.toggleSpan = document.querySelector('#' + this.likeOrDislikeSpan.nextElementSibling.value);
        this.toggleBtn = this.toggleSpan.previousElementSibling.lastChild;
    }
}

class RetweetRequest {

    constructor(event) {
        this.method = 'POST';
        this.path = event.action;
        this.btn = event.children[1];
    }
}


class ManageRequest {

    static likeAction(values) {

        $.ajaxSetup({
            headers: {
                // 'X-CSRF-TOKEN': $(':hidden[name="_token"]').attr('value'),
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: values.path,
            method: values.method,
            // data: {
            //     like: values.likeSignalStatus,
            // },
            success: function (data) {
                console.log(data);
                function updateLikeDislike() {

                    if (values.likeOrDislikeSpan.id.split('-')[1] == 'like') {
                        values.likeOrDislikeSpan.textContent = data.likeCount;
                        values.toggleSpan.textContent = data.dislikeCount;

                    } else {
                        values.likeOrDislikeSpan.textContent = data.dislikeCount;
                        values.toggleSpan.textContent = data.likeCount;
                    }

                    // $('#count-like-' + values.id + '-' + values.type).html(data.likeCount);
                    // $('#count-dislike-' + values.id + '-' + values.type).html(data.dislikeCount);

                }
                switch (data.success) {
                    case 'likeAdded':
                        values.btn.firstChild.className = 'fas fa-thumbs-up text-blue-600';
                        updateLikeDislike();

                        break;
                    case 'likeRemoved':
                        values.btn.firstChild.className = 'far fa-thumbs-up';
                        updateLikeDislike();
                        break;
                    case 'toggledToLike':
                        values.btn.firstChild.className = 'fas fa-thumbs-up text-blue-600';
                        values.toggleBtn.firstChild.className = 'far fa-thumbs-down';
                        updateLikeDislike();
                        break;
                    case 'dislikeAdded':
                        values.btn.firstChild.className = 'fas fa-thumbs-down text-blue-600';
                        updateLikeDislike();
                        break;
                    case 'dislikeRemoved':
                        values.btn.firstChild.className = 'far fa-thumbs-down';
                        updateLikeDislike();
                        break;
                    case 'toggledToDislike':
                        values.btn.firstChild.className = 'fas fa-thumbs-down text-blue-600';
                        values.toggleBtn.firstChild.className = 'far fa-thumbs-up';
                        updateLikeDislike();
                        break;
                    default:
                        break;
                }



            }

        });
    }

    static retweetAction(values) {
        $.ajaxSetup({
            headers: {
                // 'X-CSRF-TOKEN': $(':hidden[name="_token"]').attr('value'),
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: values.path,
            method: 'POST',
            // data: {
            //     retweet: values.message,
            // },
            success: function (data) {
                if (data.success == 'retweeted') {
                    return alert('Retweet Successful');
                } else {
                    return alert('Retweet Removed');
                }

            }

        });

    }
}


// this is the event listener for like and dislike
document.addEventListener('submit', (e) => {
    const socialKeys = ['like', 'dislike', 'retweet'];

    if (socialKeys.includes(e.target.className)) {

        e.preventDefault();
        // get form elements and also get its parent
        console.log(e.target.nextElementSibling);

        let request;
        if (socialKeys[0] == e.target.className || socialKeys[1] == e.target.className) {

            request = new LikeDislikeRequest(e.target);
            request.btn.disabled = true;
            setTimeout(() => { request.btn.disabled = false; }, 2000);

            ManageRequest.likeAction(request);

        }

        else {

            // console.log(e.target);
            request = new RetweetRequest(e.target);
            request.btn.disabled = true;
            setTimeout(() => { request.btn.disabled = false; }, 2000);

            ManageRequest.retweetAction(request);
            console.log(request.btn);
        }





    }
});
