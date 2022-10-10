<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Trait\ApiTrait;

class UserController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(StoreUserRequest $request)
    {
        $credentials = User::Register($request);
        $user        = User::create($credentials);

        // For post man and phone dev
        $user  = User::where('email', $request->email)->first();
        $token = $user->createToken($user->id)->plainTextToken;
        $data  = [
            "token" => $token
        ];
        return $this->returnData('data', $data, 'registered');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $User = User::where('id', auth()->user()->id)->first();
        // Update profile image
        if($request->image)
        {
            $uploadImg = add_Image($request->image,User::base);
            $User->update([
                'profile_img_url' => $uploadImg
            ]);
        }

        $User->update([
            'name'              => $request->name,
            'about'             => $request->about,
            'location'          => $request->location,
            'title'             => $request->title,
            'website'           => $request->website,
        ]);
        return $this->returnSuccess('user has been updated');
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
