<!doctype html>
<html>
    <head>
        <title>Display</title>
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
    </head>

    <body>

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
        <!-- <script type="text/javascript" src="/js/interactiveDisplay.js"></script> -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script type="text/javascript">

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $(document).ready(function () {
            $("#submit").click(function (event) {
                event.preventDefault();
                // 
                var $post = {};
                // $post.id = $('#id').val();
                // $post.name = $('#name').val();
                // $post.description = $('#description').val();
                // $post.phonenumber = $('#telephone').val();
                // $post.price = $('#price').val();
                // $post.roomcount = $('#rooms').val();
                // $post._token = $('#token').val();
                $.ajax({
                    url: 'accomodations',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token : $('meta[name="csrf-token"]').attr('content'), 
                        id: $('#id').val(),
                        name: $('#name').val(),
                        description: $('#description').val(),
                        phonenumber: $('#telephone').val(),
                        price: $('#price').val(),
                        roomcount: $('#rooms').val()
                    },
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
        </script>

        

        <div>
            <input type="text" name='name' placeholder='Acc. Name'>
        </div>

        <div>
            <textarea name="description" placeholder="Acc. Description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <input type="text" name='telephone' placeholder='Tel.'>
        </div>

        <div>
            <input type="number" name='price' step=0.01 placeholder='Price'>
        </div>

        <div>
            <input type="number" name='rooms' placeholder='Room Count'>
        </div>

        <button type="submit" id="submit">Save Accomodation to Server</button>

        <br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Desc.</th>
                <th>Phone</th>
                <th>Price</th>
                <th>Rooms</th>
            </tr>

            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->description }}</td>
                <td>{{ $user->phonenumber }}</td>
                <td>{{ $user->price }}</td>
                <td>{{ $user->roomcount }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>