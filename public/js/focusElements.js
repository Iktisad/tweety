function focusOn(id) {

    document.getElementById("comment" + '-' + id).focus();
}

function focusOnRetweetComment(authId, id) {

    // console.log('inside retweet focus');
    // console.log(authId + ' ' + id);
    document.getElementById("comment" + '-' + authId + '-' + id).focus();
}
