$(
    $('#submit-button').click(
        function () {
            var markup = '<tr>' +
                '<td>' + '-' + '</td>' +
                '<td>' + $('#name').val() + '</td>' +
                '<td>' + $('#description').val() + '</td>' +
                '<td>' + $('#telephone').val() + '</td>' +
                '<td>' + $('#price').val() + '</td>' +
                '<td>' + $('#rooms').val() + '</td>' +
                '</tr>';
            $('table tbody').append(markup);
        }
    )
);