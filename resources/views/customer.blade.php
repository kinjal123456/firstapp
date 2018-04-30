@extends('layouts.header')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex-center">
    @if (!empty($customer))
        {{ Form::open(array('url' => 'customerupdate')) }}
    @else
        {{ Form::open(array('url' => 'customeradd')) }}
    @endif
    <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
            <td>
                <div>First Name:</div> 
                <div><input type="text" name="firstname" id="firstname" value="@if(!empty($customer)){{$customer->firstname}}@endif"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div>Last Name:</div> 
                <div><input type="text" name="lastname" id="lastname" value="@if(!empty($customer)){{$customer->lastname}}@endif"></div>
            </td>
        </tr>                                   
        <tr>
            <td>
                <div>Email:</div> 
                <div><input type="text" name="email" id="email" value="@if(!empty($customer)){{$customer->email}}@endif"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div>Phone Number:</div> 
                <div><input type="text" name="phnno" id="phnno" value="@if(!empty($customer)){{$customer->phone}}@endif"></div>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="save" id="save" value="Save"></td>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="custid" id="custid" value="@if(!empty($customer)){{$custid}}@endif">
        </tr>
    </table>
    {{ Form::close() }}
</div>

@endsection

@extends('layouts.footer')