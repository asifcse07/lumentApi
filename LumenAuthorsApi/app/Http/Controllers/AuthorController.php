<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Author;

class AuthorController extends Controller
{

    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index(){
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    public function store(Request $request){
        $rules =[
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];
        $this->validate($request, $rules);
        $author = Author::create($request->all());
        return $this->successResponse($author, 201);
    }

    public function show($author){
        $author = Author::findOrFail($author);
        return $this->successResponse($author);
    }

    public function update(Request $request, $author){
        $rules =[
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];
        $this->validate($request, $rules);
        $author = Author::findOrFail($author);
        $author->fill($request->all());
        if($author->isClean()){
            return $this->errorResponse('At least one value need to chane', 422);
        }
        $author->save();
        return $this->successResponse($author);
    }

    public function destroy($author){
        $author = Author::findOrFail($author);
        $author->delete();
        return $this->successResponse($author);
    }
}
