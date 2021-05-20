<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
class BookController extends Controller
{
    //index function
    public function index()
    {
    	$books=Book::paginate(5);
    	return view('book.index',compact('books'));
    }
    public function create()
    {
    	return view('book.create');
    }
    public function store(BookRequest $request)
    {
    	$image=$request->file('image')->store('public/cover');
    	
    	Book::create([
    		'name'=>$request->name,
    		'description'=>$request->description,
    		'category'=>$request->category,
    		'image'=>$image
    	]);
    	return back()->with('message','New book added');
    }
    public function edit($id)
    {
    	$book=Book::find($id);
    	return view('book.edit',compact('book'));
    }
    public function update(BookUpdateRequest $request,$id)
    { 
    		
    	$book=Book::find($id);
    	$book->name=$request->name;
    	$book->description=$request->description;
    	$book->category=$request->category;
    	if($request->hasFile('image'))
    	{
    		$image=$request->file('image')->store('public/cover');
    		$book->image=$image;
    	}
    	$book->save();
    	return redirect()->route('book.index')->with('message','Book Updated');
    }
    public function delete(Request $request,$id)
    {
    	Book::find($id)->delete();
    	
    	return redirect()->route('book.index')->with('message','Book Deleted');
    }
}
