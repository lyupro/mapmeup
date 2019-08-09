@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New Phone
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
            <form method="post" action="{{ route('phones.store') }}">
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
                    <label for="price">Number:</label>
                    <input type="text" class="form-control" name="number"/>
                </div>
                <div class="form-group">
                    <label for="price">Primary:</label>
                    <select name="primary" id="">
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Model:</label>
                    <input type="text" class="form-control" name="model"/>
                </div>
                <div class="form-group">
                    <label for="price">Company:</label>
                    <input type="text" class="form-control" name="company"/>
                </div>
                <div class="form-group">
                    <label for="price">OS:</label>
                    <input type="text" class="form-control" name="os"/>
                </div>
                <div class="form-group">
                    <label for="price">OS Version:</label>
                    <input type="text" class="form-control" name="os_version"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
