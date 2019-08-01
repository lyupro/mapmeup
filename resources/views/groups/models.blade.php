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
        <table>
            <thead>
            <tr>
                <th>Group Name:</th>
                <th>Description:</th>
                <th>Owner ID:</th>
                <th>Actions:</th>
            </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->name}}</td>
                        <td><textarea name="" id="" cols="30" rows="10" disabled>{{$model->description}}</textarea></td>
                        <td>{{$model->owner_id}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('groups.show',$model->id)}}" title=""
                                   class="btn btn-primary">Show</a><br>
                                <a href="{{ route('groups.edit',$model->id)}}" title="" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>Edit</a><br>
{{--                                <a href="users/{{$model->id}}/delete" title=""--}}
                                <form action="{{ route('groups.destroy', $model->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="links">
            <a href="{{ url('/') }}">Home</a>
        </div>
    </div>
</div>
</body>
</html>
