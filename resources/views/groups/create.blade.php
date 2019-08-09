@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
        select{
            width: 170px;
            min-height: auto;
            border-radius: 5px 5px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New Group
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
            <form method="post" action="{{ route('groups.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Group Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Description:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                    <label for="price">Owner ID:</label>
                    <select name="owner_id" id="">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->getFullNameAttribute()}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
