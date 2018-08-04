$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.likeBtn').on('click', function (event) {
        console.log(event);
        postId = event.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
        console.log(postId);

        $.ajax({
            type: 'POST',
            url: urlLike,
            data : { postId: postId, _token: token }

        })
            .done(function (data) {
                console.log(data);
                if(data.like === true){
                    event.target.classList.add('fa-thumbs-up', 'text-info');
                    event.target.classList.remove('fa-thumbs-up-o');
                    if(data.total <= 1){
                        $("#likeTxt").html(data.total+ ' like');
                    }else {
                        $("#likeTxt").html(data.total+ ' likes');
                    }
                }

                if(data.like === false){
                    event.target.classList.add('fa-thumbs-up-o');
                    event.target.classList.remove('fa-thumbs-up', 'text-info');
                    if(data.total <= 1){
                        $("#likeTxt").html(data.total+ ' like');
                    }else {
                        $("#likeTxt").html(data.total+ ' likes');
                    }

                }

            });
    });


    $('.goingBtn').on('click', function (event) {
        console.log(event);
        eventId = event.target.parentNode.parentNode.dataset['eventid'];
        console.log(eventId);

        $.ajax({
            type: 'POST',
            url: urlGoing,
            data : { eventId: eventId, _token: token }

        })
            .done(function (data) {
                console.log(data.interested);
                if(data.interested === true){
                    $("#eventTotal").html(data.total);
                    $("#goingTxt").html("Going ?");
                }

                if(data.interested === false){
                    $("#eventTotal").html(data.total);
                    $("#goingTxt").html("Not Going ?");
                }

            });
    });
    
});