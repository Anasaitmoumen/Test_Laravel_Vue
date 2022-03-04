<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $userValidationStep3 = [
                'image' => ['required', 'image', 'mimes:png, jpeg, jpg', 'max:3000'],
                'fbLink' => ['required', 'url'],
                'instaLink' => ['required', 'url'],
            ];

            $userValidatorStep3 = validator($request->all(), $userValidationStep3);
            if($userValidatorStep3->fails()) {
                return response()->json(["message"=>"Errors on adding this user.","errors"=>$userValidatorStep3->errors()], 400);

            }else{
                    $file = $request->file('image');
                    $image_name = $file->getClientOriginalName();
                    $destinationPath = public_path('images');
                    $imageuser =  $file->move($destinationPath,$image_name);

                    // Save data.
                    $user = new User([
                        'lastName' => $request->get('lastName'),
                        'firstName' => $request->get('firstName'),
                        'email' => $request->get('email'),
                        'phoneNumber' => $request->get('phoneNumber'),
                        'address' => $request->get('address'),
                        'postalCode' => $request->get('postalCode'),
                        'image' => $imageuser,
                        'fbLink' => $request->get('fbLink'),
                        'instaLink' => $request->get('instaLink'),
                        'password' => Hash::make($request->get('password')),
                        'city_id' => $request->get('city_id'),

                    ]);
                    $user->save();
                        return response()->json(["message"=>"User added successfully.", "success"=>true], 201);
             }

    }

    public function Step1(Request $request)
    {

            $userValidationStep1 = [
                'lastName' => ['required', 'string', 'min:3', 'max:20'],
                'firstName' => ['required', 'string', 'min:3', 'max:20'],
                'email' => ['required', 'email'],
                'phoneNumber' => ['phone:FR'],
            ];
            $userValidatorStep1 = validator($request->all(),$userValidationStep1);
            if($userValidatorStep1->fails()) {

               return response()->json(["message"=>"Errors on Validation Step 2 this user.","errors"=>$userValidatorStep1->errors()], 400);

            }else{
                  return response()->json(["message"=>"Validation successfully.", "success"=>true], 201);
             }

    }
    public function Step2(Request $request)
    {

            $userValidationStep2 = [
                'address' => ['required', 'string', 'min:3', 'max:100'],
                'postalCode' => ['required', 'digits:5',' min:0' , 'max:5'],
                'city_id' => ['required', 'numeric', 'exists:cities,id'],
            ];
            $userValidationStep2 = validator($request->all(),$userValidationStep2);
            if($userValidationStep2->fails()) {

                return response()->json(["message"=>"Errors on Validation Step 2 this user.","errors"=>$userValidationStep2->errors()], 400);

            }else{
                  return response()->json(["message"=>"Validation successfully.", "success"=>true], 201);
             }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
