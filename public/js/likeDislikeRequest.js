

function likeComment(formPassed) {
    // console.log(formPassed.action);

    // console.log('did it change?');
    let likeBtn = getFormProperties(formPassed);
    // console.log(likeBtn);
    // console.log(likeBtn.formElement.children[0]);
    // console.log(likeBtn.formElement.children[0].className);

    ajaxAction(likeBtn);


}

function disLikeComment(formPassed) {

    // likeBtn = getButtonProperties(id, type, 'true');
    let dislikeBtn = getFormProperties(formPassed);
    // console.log('inside DIslike');
    // console.log(likeBtn);
    // console.log(dislikeBtn);

    ajaxAction(dislikeBtn);

}

function getFormProperties(formPassed) {
    let method;
    // let form;
    let formElement;
    let toggleFormElement;
    let numberOfLikesOrDislikes;
    let res = formPassed.id.split("-");

    /*
        like-id-tweet | like-id-retweet
        res[0] = like or dislike signal
        res[1] = id of the element
        res[2] = tweet or retweet
    */
    if (res[0] == 'like') {
        // form = document.getElementById('like-' + id + '-' + type);
        formElement = formPassed.elements['like'];
        toggleFormElement = document.getElementById('dislike-' + res[1] + '-' + res[2]).elements['dislike'];
        method = 'POST';
        numberOfLikesOrDislikes = document.getElementById('count-like-' + res[1] + '-' + res[2]).innerHTML;

    } else {
        // form = document.getElementById('dislike-' + id + '-' + type);
        formElement = formPassed.elements['dislike'];
        toggleFormElement = document.getElementById('like-' + res[1] + '-' + res[2]).elements['like'];
        method = formPassed.elements[1].value;
        numberOfLikesOrDislikes = document.getElementById('count-dislike-' + res[1] + '-' + res[2]).innerHTML;
    }




    return dataObject = {
        id: res[1],
        type: res[2],
        path: formPassed.action,
        method: method,
        formElement: formElement,
        toggleFormElement: toggleFormElement,

    }
}

function ajaxAction(values) {

    // console.log(values);
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
                $('#count-like-' + values.id + '-' + values.type).html(data.likeCount);
                $('#count-dislike-' + values.id + '-' + values.type).html(data.dislikeCount);
            }
            switch (data.success) {
                case 'likeAdded':
                    values.formElement.children[0].className = 'fas fa-thumbs-up';
                    updateLikeDislike();

                    break;
                case 'likeRemoved':
                    values.formElement.children[0].className = 'far fa-thumbs-up';
                    updateLikeDislike();
                    break;
                case 'toggledToLike':
                    values.formElement.children[0].className = 'fas fa-thumbs-up';
                    values.toggleFormElement.children[0].className = 'far fa-thumbs-down';
                    updateLikeDislike();
                    break;
                case 'dislikeAdded':
                    values.formElement.children[0].className = 'fas fa-thumbs-down';
                    updateLikeDislike();
                    break;
                case 'dislikeRemoved':
                    values.formElement.children[0].className = 'far fa-thumbs-down';
                    updateLikeDislike();
                    break;
                case 'toggledToDislike':
                    values.formElement.children[0].className = 'fas fa-thumbs-down';
                    values.toggleFormElement.children[0].className = 'far fa-thumbs-up';
                    updateLikeDislike();
                    break;
                default:
                    break;
            }



        }

    });
}



// // function ajaxActionDislike(values) {
// //     $.ajaxSetup({
// //         headers: {
// //             // 'X-CSRF-TOKEN': $(':hidden[name="_token"]').attr('value'),
// //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //         }
// //     });

// //     $.ajax({
// //         url: values.path,
// //         method: values.method,
// //         data: {
// //             like: values.likeSignal,
// //         },
// //         success: function (data) {
// //             console.log(typeof (data.success));
// //             // console.log(jQuery.isEmptyObject(data.success.attached));
// //             if (typeof (data.success) == 'object') {
// //                 console.log(data.success.like);
// //                 if (values.likedBefore == 'false' && values.dislikedBefore == 'false') {

// //                     console.log('Initial Condition : ' + values.likedBefore + '-' + values.dislikedBefore);

// //                     if (data.success.like) {
// //                         // this is the like form part

// //                         $('#' + 'count-like-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) + 1);
// //                         values.form.elements['dislike'].setAttribute('data-like', 'true');



// //                     } else {
// //                         $('#' + 'count-dislike-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) + 1);
// //                         values.form.elements['dislike'].setAttribute('data-dislike', 'true');
// //                     }

// //                 } else if (values.likedBefore == 'false' && values.dislikedBefore == 'true') {

// //                     $('#' + 'count-like-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) + 1);
// //                     $('#' + 'count-dislike-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) - 1);

// //                     values.form.elements['dislike'].setAttribute('data-like', 'true');
// //                     values.form.elements['dislike'].setAttribute('data-dislike', 'false');


// //                 } else if (values.likedBefore == 'true' && values.dislikedBefore == 'false') {

// //                     $('#' + 'count-like-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) - 1);
// //                     $('#' + 'count-dislike-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) + 1);

// //                     values.form.elements['dislike'].setAttribute('data-like', 'false');
// //                     values.form.elements['dislike'].setAttribute('data-dislike', 'true');
// //                 }


// //             }
// //             else {
// //                 if (values.likeSignal) {

// //                     $('#' + 'count-like-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) - 1);
// //                     values.form.elements['dislike'].setAttribute('data-like', 'false');
// //                     //     // $(cObj).addClass("like-post");

// //                 } else {
// //                     $('#' + 'count-dislike-' + values.id).html(parseInt(values.numberOfLikesOrDislikes) - 1);
// //                     values.form.elements['dislike'].setAttribute('data-dislike', 'false');
// //                 }
// //             }

// //         }

// //     });
// // }

// document.addEventListener('submit', (e) => {
    //     e.preventDefault();
    // })
    // $("#like-button" + id).click(function () {

    //     event.preventDefault();
    // });
    // document.getElementById('like-button-' + id).addEventListener('submit', function (event) { event.preventDefault() });
    // $('button[name="like"]').on('click', function (event) {
    //     event.preventDefault();
    // });