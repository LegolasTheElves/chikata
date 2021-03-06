var postId;
var postBodyElement = null;
//to show modal form
$('.post').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-post').modal();
});
//get the value of data that need to edit
$('#modal-save').on('click', function () {
    $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {
                body: $('#post-body').val(),
                postId: postId,
                _token: token
            }
        })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-post').modal('hide');
        });
});
//like and dislike ajax function
$('.like').on('click', function (event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
            method: 'POST',
            url: urlLike,
            data: {
                isLike:isLike,
                postId: postId,
                _token: token
            }
        })
    .done(function(){
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
        if(isLike){
            event.target.nextElementSibling.innerText = 'Dislike';
        }else{
            event.target.previousElementSibling.innerText = 'Like';
        }
    });
});