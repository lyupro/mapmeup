@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New Location
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('locations.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="price">User ID:</label>
                    <select name="user_id" id="">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->getFullNameAttribute()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <input type="text" class="form-control" name="address"/>
                </div>
                <div class="form-group">
                    <label for="price">Latitude:</label>
                    <input type="text" class="form-control" name="latitude"/>
                </div>
                <div class="form-group">
                    <label for="price">Longitude:</label>
                    <input type="text" class="form-control" name="longitude"/>
                </div>
                <div class="form-group">
                    <label for="price">Type:</label>
                    <input type="text" class="form-control" name="type"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
