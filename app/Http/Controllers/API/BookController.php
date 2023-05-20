<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookRequest;
use App\Models\API\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $book = Book::all();
            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Menampilkan Data Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        try {
            $book = Book::create([
                'name' => $request->name
            ]);

            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Menambahkan Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
