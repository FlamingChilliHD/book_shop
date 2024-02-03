<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $book = Book::all();

        return view('welcome', [
            'books' => $book
        ]);
    }

    public function storebook(Request $request)
    {
        // $request->validate([
        //     'title' =>  'required|string|max:75',
        //     'author' => 'required|max:55',
        //     'description' => 'required|string',
        //     'price' => 'required|numeric|min:3|max:3|decimal:2',
        //     'quantity' => 'required|numeric',
        // ]);

        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->quantity = $request->quantity;

        // Image request
        $image = $request->file('image');
        $filename = Str::uuid()->toString() . '-' . time() . $image->getClientOriginalExtension();
        // Move image to folder
        $image->move('uploads/', $filename);
        $book->image = $filename;

        $book->save();

        return redirect()->back()->with('stored', 'Book stored successfully');
    }

    public function viewbook($id)
    {
        $book = Book::find($id);

        return view('viewbook', [
            'book' => $book
        ]);
    }
}
