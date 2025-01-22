{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body>
        <h2>Post list Data</h2>
        <table class="table table-striped">
            <tr>ID</tr>
            <tr>Email</tr>
            <tr>first_name</tr>
            <tr>last_name</tr>
            <tr>avatar</tr>
            <tr>
                @foreach ($data['data'] as $user)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['first_name'] }}</td>
                    <td>{{ $user['last_name'] }}</td>
                    <td><img src= "{{ $user['avatar'] }}" alt="" width="100px"> </td>
                @endforeach

            </tr>
        </table>
    </body>

    </html>

</body>

</html> --}}
