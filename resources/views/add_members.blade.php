@extends('header')
@section('content')
<div class="container">
  <p class="text-right"> <a href="{{url('/')}}">Back </a></p>
    <h5><b>Head Member Form</b></h5>
    <form action="{{url('save-members')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="form-group col-md-6">
          <label for="firstname">First Name:</label>
          <input type="text" class="form-control firstname" name="firstname" placeholder="Enter first name">
          @error('firstname')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control lastname" name="lastname" placeholder="Enter last name">
            @error('lastname')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="birthdate">Birth Date:</label>
            <input type="date" class="form-control birthdate" name="birthdate" placeholder="Enter birthdate">
            @error('birthdate')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="mobile">Mobile No:</label>
            <input type="number" class="form-control mobile" name="mobile" placeholder="Enter mobile no">
            @error('mobile')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="address">Address:</label>
            <input type="text" class="form-control address" name="address" placeholder="Enter address">
            @error('address')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="state">State:</label>
            <select name="state" class="form-control" id="state">
              <option value="">Select State</option>
              @forelse ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
              @empty
              @endforelse
            </select>
            @error('state')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="city">City:</label>
            <select name="city" class="form-control" id="city">
              <option value="">Select City</option>
            </select>
            @error('city')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="pincode">PinCode:</label>
            <input type="text" class="form-control pincode" name="pincode" placeholder="Enter pincode">
            @error('pincode')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="city">Martial Status:</label>
            <select name="martial_status" class="form-control" id="martial-status">
              <option value="">Select Martial Status</option>
              <option value="1">Married</option>
              <option value="2">Unmarried</option>
            </select>
            @error('martial_status')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group col-md-6 married-date"></div>
        <div class="form-group col-md-6">
            <label for="hobbies">Hobbies:</label>
            <div class="row hobbys-validation">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control hobbies mb-0" name="hobbies[]" placeholder="Enter hobby">
                </div>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-primary add-hobby-btn mb-0">Add Hobby</button>
                </div>
            </div>
            {{-- <div class=""></div> --}}
        </div>
        <div id="hobby-container"></div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control photo" name="photo">
            @error('photo')<div class="form-valid-error">{{ $message }}</div> @enderror
        </div>
      
    </div>

        <h5><b>Member Form</b></h5>

      <div id="userFields">

        <div class="row user-row">
          <div class="form-group col-md-6">
            <label for="userName">User Name:</label>
            <input type="text" class="form-control username" name="username[]" placeholder="Enter user name">
            @error('username.*')<div class="form-valid-error">{{ $message }}</div> @enderror

          </div>
          <div class="form-group col-md-6">
            <label for="birthdate">Birth Date:</label>
            <input type="date" class="form-control user-birthdate" name="user_birthdate[]" placeholder="Enter birthdate">
            @error('birthdate.*')<div class="form-valid-error">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="martialstatus">Martial Status:</label>
            <select name="user_martial_status[]" class="form-control user-martial-status">
                <option value="">Select Martial Status</option>
                <option value="1">Married</option>
                <option value="2">Unmarried</option>
              </select>
              @error('user_martial_status')<div class="form-valid-error">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-6 user-married-date"></div>
          <div class="form-group col-md-6">
            <label for="education">Education:</label>
            <input type="text" class="form-control education" name="education[]" placeholder="Enter education">
            @error('education.*')<div class="form-valid-error">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="userphoto">Photo:</label>
            <input type="file" class="form-control user-photos" name="user_photos[]">
            @error('user_photos.*')<div class="form-valid-error">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-12 text-right">
            <button type="button" class="btn btn-danger remove-row">Remove</button>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-primary add-more" >Add More</button>
      
      <button type="submit" class="btn btn-primary submit">Submit</button>
    </form>
  </div>

@endsection