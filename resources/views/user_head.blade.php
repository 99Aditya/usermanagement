@extends('header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>User Head List</h2>
                <a href="{{url('add-members')}}" class="btn btn-primary">Add Members</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>BirthDate</th>
                            <th>Mobile No</th>
                            <th>Martial Status</th>
                            <th>Image</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($all_data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->first_name}} {{$data->last_name}}</td>
                            <td>{{$data->birthdate}}</td>
                            <td>{{$data->mobile}}</td>
                            <td>@if($data->martial_status == 1) Married @elseif($data->martial_status ==2) Unmarried @endif</td>
                            <td><img src ="{{$data->getPhoto()}}" width="50px"></td>
                            <td><a href="{{url('get-users',base64_encode($data->id))}}">{{$data->users_count}}</a> </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    <ul class="pagination">
                        @if(count($all_data) > 0)
                        @for ($i = 1; $i <= $all_data->lastPage(); $i++)
                            <li class="{{ $i == $all_data->currentPage() ? 'active' : '' }}">
                                <a href="{{ $all_data->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        @endif
                    </ul>
                </div>

            </div>

        </div>
    </div>
@endsection