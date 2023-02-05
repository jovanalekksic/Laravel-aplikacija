<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BookController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return new BookCollection($books);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'genre_id' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required',
            'description' => 'required',


        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $book = Book::create([
            'name' => $request->name,
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return response()->json(['Book created successfully.', new BookResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:100',
            'author' => 'required',
            'description' => 'required',
            'genre_id' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $book->title = $request->title;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->genre_id = $request->genre_id;

        $book->save();
        return response()->json(['Book updated successfully.', new BookResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response()->json('Book deleted successfully');
    }
}
