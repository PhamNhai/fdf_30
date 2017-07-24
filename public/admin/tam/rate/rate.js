$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.input-3').rating({displayOnly: true, step: 0.5});


    $('#input-2').on('change', function () {

        // e.preventDefault();
        var route = $('.hide').data('route');
        var rate = $('input[name="rate"]').val();
        var productId = $('#product-id').val();
        // alert(route);
        var userId = $('#user_id').val();
        console.log(userId);
        $.ajax({
            type: 'POST',
            url: route,
            dataType: "JSON",
            data: {
                'product_id': productId,
                'rate' : rate,
                'user_id': userId,
            },
            success: function(data){
                if (data.success) {
                    console.log(route);
                }else alert("not");
            }});
    });

    $(document).on('click','.delete-comment', function(e) {
        return confirm("Do you want to delete this comment?");
    });

    $(document).on('click','.edit-comment', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        // alert(id);
        var content = $('#content-comment' + id).text();
        // alert(content);
        var html ="<li class='media'>" + "<textarea class='form-control aria-edit-comment' id=" + id + "></textarea>" + "</li>" ;
        $('#edit-comment-aria').html(html);
        $('.aria-edit-comment').focus().val(content);
    });

    $(document).on('keydown', '#comment1', function (e){
        if(e.keyCode == 13){
            var route2 = $('.urlcomment').data('route');
            // alert(route2);
            var content = $('#comment1').val();
            var productId = $('#product_id').val();
            var userId = $('#user_id').val();
            $.ajax({
            type: 'POST',
            url: route2,
            dataType: 'JSON',
            data: {
                'product_id': productId,
                'content' : content,
                'user_id': userId,
            },
            success: function(data){
                if (data.success) {
                var html = "<div id='location-comment" + data.commentId + "'>" + "<li class='media'><a href='#' class='pull-left'>" + '<img src ='+ data.avatarPath + " class = 'img-circle'" + " alt ='This is avatar'>" + '</a>' +
                "<span class='text-muted pull-right'>" + "<div class='dropdown'>" +
                "<button class='btn dropdown-toggle' type='button' data-toggle='dropdown' >" +
                " <span class='caret'></span></button>" + "<ul class='dropdown-menu'>" +
                "<li><a href='' class='edit-comment' " + "id=" + data.commentId + ">Edit</a></li>" +
                "<li><a href=" + data.deleteUrl + " class='delete-comment'>Delete</a></li>" + "</ul></div>" +'</span>' + "<div class='media-body'>" +
                "<strong class='text-success'>" + data.user + "</strong>" +
                '<small>' + data.created_at + '</small>' +
                "<p id='content-comment" + data.commentId + "'>" + data.content + '</p></div></li></div>' ;
                $('#comment2').prepend(html);
                $('#comment1').val('');
                } else {
                    alert("Sorry. Comment fail");
                    // $('#result').removeClass().addClass('alert alert-danger').html(data.message);
                }
            }});
        }
    });

    $(document).on('keydown', '.aria-edit-comment', function (e){
        if(e.keyCode == 13){
            var id = $(this).attr('id');
            var content = $(this).val();
            $.ajax({
            type: 'POST',
            url: '/editComment',
            dataType: 'JSON',
            data: {
                'id': id,
                'content' : content,
            },
            success: function(data){
                if (data.success) {
                var html = "<div id='location-comment" + id + "'>" + "<li class='media'><a href='#' class='pull-left'>" + '<img src ='+ data.avatarPath + " class = 'img-circle'" + " alt ='This is avatar'>" + '</a>' +
                "<span class='text-muted pull-right'>" + "<div class='dropdown'>" +
                "<button class='btn dropdown-toggle' type='button' data-toggle='dropdown' >" +
                " <span class='caret'></span></button>" + "<ul class='dropdown-menu'>" +
                "<li><a href='' class='edit-comment' " + "id=" + data.commentId + ">Edit</a></li>" +
                "<li><a href=" + data.deleteUrl + " class='delete-comment'>Delete</a></li>" + "</ul></div>" +'</span>' + "<div class='media-body'>" +
                "<strong class='text-success'>" + data.user + "</strong>" +
                '<small>' + data.created_at + '</small>' +
                "<p id='content-comment" + data.commentId + "'>" + data.content + '</p></div></li></div>' ;
                // alert(data.content);
                $('#location-comment' + id).html(html);
                $('.aria-edit-comment').remove();
                } else {
                    alert("Sorry. Comment fail");
                    // $('#result').removeClass().addClass('alert alert-danger').html(data.message);
                }
            }});
        }
    });
});
