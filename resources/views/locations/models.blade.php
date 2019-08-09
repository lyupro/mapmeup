<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div><br>
        @endif

        <table>
            <thead>
            <tr>
                <th>User ID:</th>
                <th>Name:</th>
                <th>Address:</th>
                <th>Latitude:</th>
                <th>Longitude:</th>
                <th>Type:</th>
            </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->user_id}}</td>
                        <td>{{$model->name}}</td>
                        <td>{{$model->address}}</td>
                        <td>{{$model->latitude}}</td>
                        <td>{{$model->longitude}}</td>
                        <td>{{$model->type}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('locations.show',$model->id)}}" title=""
                                    class="btn btn-primary" role="button">Show</a><br>
                                <a href="{{ route('locations.edit',$model->id)}}" title=""
                                    class="btn btn-primary" role="button">
                                    <i class="fa fa-pencil"></i>Edit</a><br>
{{--                                <a href="locations/{{$model->id}}/delete" title=""--}}
                                <form action="{{ route('locations.destroy', $model->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <div class="links">
            <a href="{{ url('/') }}">Home</a>
        </div>
    </div>
</div>
</body>
</html>
