$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// LOAD IMAGES
    $("#gallery").change(function(){

        $('#image_preview').html("");

        var total_file=document.getElementById("gallery").files.length;

        for(var i=0;i<total_file;i++)

        {
            var html = "<div class='col-sm-3'>\n" +
                "<img class='img-responsive img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'width='98%' style=\"height: 150px !important\" alt='Photo'><br><br>\n" +
                "  </div>";

            $('#image_preview').append(html);

        }

    });



});