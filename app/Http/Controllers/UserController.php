<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth', ['only' =>['delete']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        //return response()->json($users);
        return response()->json(['result' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        if (!$user) {
            //return response()->json(['error' => ['message' => 'User does not exist', 'status_code'=> '404']], 404);
            return response()->json(['error' => 'User not found', 'status_code'=> '404'], 404);
        }
        return response()->json(['result' => $user]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $rules = $this->rules($input);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        }
        
        //$input['password'] = bcrypt($request['password']);
        
        $user = User::create($input);
        return response()->json($user);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found', 'status_code'=> '404'], 404);
        }
        
        $input = $request->all();
        $rules = $this->rules($input, $user->user_id);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        } 
        
//        if(isset($request['password'])){
//            $input['password'] = bcrypt($request['password']);
//        }
        
        $language->fill($request->all());
        $user->fill($input);
        if($user->save()){
            //return $this->response->noContent();
            return response()->json('updated');
        }
        else{
            return response()->json(['error' => 'could_not_update_user', 'status_code'=> '500'], 500);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found', 'status_code'=> '404'], 404);
        }
        if($user->delete()){
            //return $this->response->noContent();
            return response()->json('deleted');
        }
        else{
           return response()->json(['error' => 'could_not_delete_user', 'status_code'=> '500'], 500);
        } 
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($input, $user_id = null) {
        $rules = [
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'phone' => 'numeric',
            'email' => 'required|email|max:45|unique:users'
        ];
        
        if(!empty($user_id)){
            $rules['email'] = 'required|email|max:45|unique:users,email, ' . $user_id . ',user_id';
        }
        else{
            $rules['email'] = 'required|email|max:45|unique:users';
        }
        
        if(isset($input['password'])){
            $rules['password'] = 'required|min:4';
        }
        return $rules;
    }
    
}
