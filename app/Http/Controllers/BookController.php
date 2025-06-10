<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::filter($request->all())->simplePaginate(5);
        return BookResource::collection($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!$request->name, 403, 'Name required for book');
        $book = Book::create($request->all());
        return  new BookResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return response($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json(['message' => 'Book has been deleted']);
    }

    public function postCatalog(Request $request, Book $book)
    {
        abort_if(!$request->catalog_id, 403, 'Catalog required for book');
        $catalog_id = (int)$request->catalog_id;
        $book->catalogs()->syncWithoutDetaching($catalog_id);
        return new BookResource($book);
    }
    public function detachCatalog(Book $book, int $catalog_id){
        $book->catalogs()->detach($catalog_id);
        return new BookResource($book);
    }
    public function postMedia(Request $request, Book $book){
        abort_if(!$request->file, 403, 'File required for book');
        $book->addMedia($request->file)->toMediaCollection();
        return new BookResource($book);
    }
    public function addFile(Request $request, Book $book){
        abort_if(!$request->file, 403, 'File required for book');
        $file = App::make('App\Libs\Imag')->url($request->file);
        $book->image = $file;
        $book->save();
        return new BookResource($book);
    }
    public function getBooksOzby(Request $request){
        abort_if(!$request->url, 403, 'Url required for parser');
        abort_if(!$request->catalog_id, 403, 'Catalog_id required for parser');
        App::make('App\Parse\OzbyParser')->getParse($request->url, $request->catalog_id);
    }
}
