@extends('layouts.header')

@section('content')

<div class="flex-center">
    <table border="1" cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
            <td align="right" colspan="6" style="font-weight:bold"><a href="customer">Add Customer</a></td>
        </tr>
        <tr>
            <td>Id</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone No.</td>
            <td>Actions</td>
        </tr>
        @foreach($customers as $cust)
        <tr>
            <td>{{$cust->id}}</td>
            <td>{{$cust->firstname}}</td>
            <td>{{$cust->lastname}}</td>
            <td>{{$cust->email}}</td>
            <td>{{$cust->phone}}</td>
            <td><a href="customer/{{$cust->id}}">Edit</a> | <a href="customerdelete/{{$cust->id}}">Delete</a></td>
        </tr>
        @endforeach
        @if(Session::has('message'))
            <tr>
                <td class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</td>
            </tr>
        @endif
    </table>
</div>

@endsection

@extends('layouts.footer')