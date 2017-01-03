<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;

class LanguageController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $languages = Language::all();
        return response()->json($languages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $language = Language::find($id);
        if (!$language) {
            //return response()->json(['error' => ['message' => 'Language does not exist', 'status_code'=> '404']], 404);
            return response()->json(['error' => 'Language not found', 'status_code'=> '404'], 404);
        }
        return response()->json(['result' => $language]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = array(
            'language_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        }
        
        $language = Language::create($request->all());
        return response()->json($language);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $language = Language::find($id);
        if (!$language) {
            return response()->json(['error' => 'Language not found', 'status_code'=> '404'], 404);
        }
        
        $rules = array(
            'language_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        } 
        
        //$language->language_name = $request->input('language_name');
        $language->fill($request->all());
        if($language->save()){
            //return $this->response->noContent();
            return response()->json($language);
        }
        else{
            return response()->json(['error' => 'could_not_update_language', 'status_code'=> '500'], 500);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $language = Language::find($id);
        if (!$language) {
            return response()->json(['error' => 'Language not found', 'status_code'=> '404'], 404);
        }
        if($language->delete()){
            //return $this->response->noContent();
            return response()->json('deleted');
        }
        else{
           return response()->json(['error' => 'could_not_delete_language', 'status_code'=> '500'], 500);
        } 
    }
    
}
