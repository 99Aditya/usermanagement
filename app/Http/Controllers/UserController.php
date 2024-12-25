<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\UserHead;

class UserController extends Controller{
    public function index() {
        $all_data = UserHead::withCount('users')->paginate(10);
        return view('user_head',compact('all_data'));
    }

    public function addMembers() {
        $states =State::all();
        return view('add_members',compact('states'));
    }

    public function saveMembers(UserRequest $request)  {
        $validatedData = $request->validated();
        $head = new UserHead();
        $head->first_name = $validatedData['firstname'];
        $head->last_name = $validatedData['lastname'];
        $head->birthdate = $validatedData['birthdate'];
        $head->mobile = $validatedData['mobile'];
        $head->address = $validatedData['address'];
        $head->state = $validatedData['state'];
        $head->city = $validatedData['city'];
        $head->pincode = $validatedData['pincode'];
        $head->martial_status = $validatedData['martial_status'];
        $head->married_date = $validatedData['married_date'] ?? null;
        $head->hobbies = implode(",",$validatedData['hobbies'])??" ";
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();    
            $photo->move(public_path('uploads/photos'), $photoName);
            $head->photo = $photoName;
        }
        if($head->save()){
            foreach ($validatedData['username'] as $key => $value) {
                $user =new User();
                $user->name = $value;
                $user->birthdate = $validatedData['user_birthdate'][$key];
                $user->martial_status = $validatedData['user_martial_status'][$key];
                $user->married_date = $validatedData['user_married_date'][$key] ?? null;
                $user->education = $validatedData['education'][$key];
                if (isset($validatedData['user_photos'][$key]) && $validatedData['user_photos'][$key]->isValid()) {
                    $userphoto = $validatedData['user_photos'][$key];
                    $userphotoName = time() . '_' . $userphoto->getClientOriginalName();
                    $userphoto->move(public_path('uploads/user_photos'), $userphotoName);
                    $user->photos =  $userphotoName;
                } else {
                    $user->photos = null;
                }
                $user->head_id = $head->id;
                $user->save();
            }

            return redirect('/')->with('success', 'User data saved successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }


    public function getCities(Request $request){
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    public function getUsers($id = 0){
        $id = base64_decode($id);
        $data = UserHead::with('state_name','city_name','users')->where('id', $id)->first();
        return view('user',compact('data'));
    }
}
