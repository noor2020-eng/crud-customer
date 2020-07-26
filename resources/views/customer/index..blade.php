@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center ">Customer table</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Customer.create') }}"> Create New Customer</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th> </th>
            <th> image</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ ++$i }}</td>
                <td> <img src="{{$customer->image}} "width="100"></td>
                <td>{{ $customer->name }}</td>
                <td>
                    <form action="{{ route('Customer.destroy',$customer->id) }}" method="POST">

                        {{--                        <a class="btn btn-info" href="{{ route('Customer.show',$customer->id) }}">Show</a>--}}

                        <a class="btn btn-primary" href="{{ route('Customer.edit',$customer->id) }}">Edit</a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>

@stop

@section('footer')

@stop



