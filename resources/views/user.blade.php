@extends('header')
@section('content')
    <div class="container">
        <p class="text-right"> <a href="{{url('/')}}">Back </a></p>

        <div class="row">
            <div id="detailPage" class="mt-5">
                <h2>Head Member Details</h2>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>User Name</th>
                      <th>{{$data->first_name}} {{$data->last_name}}</th>
                    </tr>
                    <tr>
                        <th>BirthDate</th>
                        <th>{{$data->birthdate}}</th>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th>{{$data->mobile}}</th>
                    </tr>
                    <tr>
                        <th>State</th>
                        <th>@if($data->state){{$data->state_name->name}}@endif</th>
                    </tr>
                    <tr>
                        <th>City</th>
                        <th>@if($data->city){{$data->city_name->name}}@endif</th>
                    </tr>
                    <tr>
                        <th>Martial Status</th>
                        <th>@if($data->martial_status == 1) Married @elseif($data->martial_status ==2) Unmarried @endif</th>
                    </tr>
                    <tr>
                        <th>Married Date</th>
                        <th>{{$data->married_date}}</th>
                    </tr>
                    <tr>
                        <th>Hobbies</th>
                        <th>{{$data->hobbies}}</th>
                    </tr>
                </tbody>
               
                </table>
              </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Member List</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>BirthDate</th>
                        <th>Martial Status</th>
                        <th>Married Date</th>
                        <th>Education</th>
                        <th>Photo</th>
                    </tr>
                   
                </thead>
                <tbody>
                   @forelse ($data->users as $val)
                   <tr>
                        <td>{{$val->name}}</td>
                        <td>{{$val->birthdate}}</td>
                        <td>@if($val->martial_status == 1) Married @elseif($val->martial_status ==2) Unmarried @endif</td>
                        <td>@if(!empty($val->married_date)) {{$val->married_date}} @endif</td>
                        <td>{{$val->education}}</td>
                        <td><img src ="{{asset('uploads/user_photos/'.$val->photos)}}" width="50px"></td>
                    </tr>
                   @empty
                       
                   @endforelse
                </tbody>
            </table>
            </div>

        </div>
    </div>
@endsection