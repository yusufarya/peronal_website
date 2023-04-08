<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\User;


class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            User::all()
        );
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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:155',
            'gender' => 'required',
            'email' => 'required|unique:users',
            'birth_of_date' => 'required',
            'active' => 'required|max:1'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $insertUser = User::create([
            'full_name' => $request->get('full_name'),
            'gender' => $request->get('gender'),
            'place_of_date' => $request->get('place_of_date'),
            'birth_of_date' => $request->get('birth_of_date'),
            'active' => $request->get('active'),
            'email' => $request->get('email'),
            // 'slug' => Str::slug($request->get('title'))
        ]);

        return response()->json([
            'data' => new UserResource($insertUser),
            'message' => 'User created successfully.',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getUserById = User::find($id);
        if ($getUserById) {
            return response()->json(array('message' => 'success', 'data' => $getUserById));
        } else {
            return response()->json(array('message' => 'not found'));
        }
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
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:155',
            'gender' => 'required',
            'birth_of_date' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        User::where('id', $id)->update([
            'full_name' => $request->get('full_name'),
            'gender' => $request->get('gender'),
            'birth_of_date' => $request->get('birth_of_date'),
            'active' => $request->get('active'),
            // 'slug' => Str::slug($request->get('title'))
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = User::find($id);
        // $user->delete();

        $delete = User::destroy($id);

        if ($delete) {
            return response()->json([
                'message' => 'User deleted successfully',
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'error',
                'success' => false
            ]);
        }
        // dd($user);
    }
}
