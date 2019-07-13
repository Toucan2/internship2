$(document).ready(function () {
    $("#submit").click(function (event) {
        event.preventDefault();
        var $post = {};
        $post.id = $('#id').val();
        post.name = $('#name').val();
        $post.description = $('#description').val();
        $post.phonenumber = $('#telephone').val();
        $post.price = $('#price').val();
        $post.roomcount = $('#rooms').val();
        $post._token = document.getElementsByName("_token")[0].value;
        $.ajax({
            url: 'api/accomodations',
            type: 'POST',
            data: $post,
            cache: false,
            success: function (data) {
                alert('Your data updated');
                return data;
            },
            error: function () {
                alert('error handing here');
            }
        });
    });
})