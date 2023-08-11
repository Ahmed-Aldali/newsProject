<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }
    public function loginType(){
        return response()->view('cms.loginType' );
    }

    public function login(Request $request){
        $validator = Validator($request->all() , [
            'email' => 'required|email|string' ,
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),

        ];

        if(! $validator->fails()){
            if(Auth::guard($request->get('guard'))->attempt($credentials) ){
                return response()->json([
                    'icon' => 'success' ,
                    'title' => 'Login IS Successfully'
                ] , 200);
            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => 'Login is Failed'
                ] , 400);
            }
        }

        else {
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
            ] , 400);
        }
    }

    public function logout(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'author' ;
        Auth::guard($guard)->logout();
        $request->session()->invalidate();

        return redirect()->route('login.type' );
    }

    public function changePassword(){

    }

    public function updatePassword(){

    }

    public function editProfile(Request $request){
        if(Auth::guard('admin')->id()){
            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            $cities= City::all();
            return response()->view('cms.admin.edit' , compact('cities' , 'admins'));

        }elseif(Auth::guard('author')->id()){
            $authors = Author::findOrFail(Auth::guard('author')->id());
            $cities= City::all();
            return response()->view('cms.author.edit' , compact('cities' , 'authors'));

        }
    }


    public function updateProfile(Request $request){
        $validator = Validator($request->all() , [
            'first_name' => 'required' ,
            'last_name' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'nullable' ,
            'mobile' => 'required' ,
            'gender' => 'required' ,
            'status' => 'required' ,
            'date' => 'required' ,

        ] ,[

        ]);


        if(! $validator->fails()){


            if(Auth::guard('admin')->id()){

            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            $admins->email = $request->input('email');
            // $admins->password = Hash::make($request->input('password'));

            $isUpdate = $admins->save();

            if($isUpdate){
                $users = $admins->user;

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);
                    // $image->storeAs('storage/images/admin', $imageName);

                    $users->image = $imageName;
                    }

                $users->first_name = $request->input('first_name');
                $users->last_name = $request->input('last_name');
                $users->gender = $request->input('gender');
                $users->mobile = $request->input('mobile');
                $users->status = $request->input('status');
                $users->date = $request->input('date');
                $users->address = $request->input('address');
                $users->city_id = $request->input('city_id');
                $users->actor()->associate($admins);

                $isUpdate = $users->save();

                return ['redirect' => route('admins.index')];

                // return response()->json([
                //     'icon' => 'success' ,
                //     'title' => 'Updated is Successfully'

                // ] , 200);


            }


            }elseif(Auth::guard('author')->id()){
                $authors = Author::findOrFail(Auth::guard('author')->id());
                $authors->email = $request->input('email');
                // $authors->password = Hash::make($request->input('password'));

                $isUpdate = $authors->save();

                if($isUpdate){
                    $users = $authors->user;

                    if (request()->hasFile('image')) {

                        $image = $request->file('image');

                        $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                        $image->move('storage/images/author', $imageName);
                        // $image->storeAs('storage/images/Author', $imageName);

                        $users->image = $imageName;
                        }

                    $users->first_name = $request->input('first_name');
                    $users->last_name = $request->input('last_name');
                    $users->gender = $request->input('gender');
                    $users->mobile = $request->input('mobile');
                    $users->status = $request->input('status');
                    $users->date = $request->input('date');
                    $users->address = $request->input('address');
                    $users->city_id = $request->input('city_id');
                    $users->actor()->associate($authors);

                    $isUpdate = $users->save();

                    return ['redirect' => route('authors.index')];

                    // return response()->json([
                    //     'icon' => 'success' ,
                    //     'title' => 'Updated is Successfully'

                    // ] , 200);


                }
            }

        }else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first()
            ] , 400);
        }
    }

}
