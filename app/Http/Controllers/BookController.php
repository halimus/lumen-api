<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BookController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['only' =>['index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $book = Book::find($id);
        if (!$book) {
            //return response()->json(['error' => ['message' => 'Book does not exist', 'status_code'=> '404']], 404);
            return response()->json(['error' => 'Book not found', 'status_code'=> '404'], 404);
        }
        return response()->json(['result' => $book]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { 
        $rules = $this->rules(); 
        $messages = $this->messages();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        }
        
        $book = Book::create($request->all());
        return response()->json($book);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found', 'status_code'=> '404'], 404);
        }
        
        $rules = $this->rules(); 
        $messages = $this->messages();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status_code'=> '400'], 400);
        } 
        
        //$book->fill($request->all());
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->pages_count = $request->input('pages_count');
        $book->published_date = $request->input('published_date');
        $book->language_id = $request->input('language_id');
        
        if($book->save()){
            //return $this->response->noContent();
            return response()->json($book);
        }
        else{
            return response()->json(['error' => 'could_not_update_book', 'status_code'=> '500'], 500);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found', 'status_code'=> '404'], 404);
        }
        if($book->delete()){
            //return $this->response->noContent();
            return response()->json('deleted');
        }
        else{
           return response()->json(['error' => 'could_not_delete_book', 'status_code'=> '500'], 500);
        } 
    }  
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = array(
            'title' => 'required|min:2',
            'author' => 'required|min:3',
            'isbn' => 'min:2',
            'pages_count' => 'required|numeric',
            'published_date' => 'date',
            'language_id' => 'required|exists:languages,language_id',
        );
        return $rules;
    }
    
    /*
     * Get the validation messages that apply to the rules.
     * @return array
     */
    public function messages() {
        return [
            'language_id.exists' => 'Not an existing language_id',
        ];
    }

}
