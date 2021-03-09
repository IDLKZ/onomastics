<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use App\Language;
use App\Models\File;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy("created_at","DESC")->with(["author","language"])->paginate(12);
        return view("admin.book.index",compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["author_id" => "required|exists:authors,id","language_id" => "required|exists:languages,id", "title" => "required|max:255", "description" => "required", "img" => "sometimes|nullable|file|image|max:10240","file"=>"required|file|max:100000"]);
        $languages = Language::all();
        $authors = Author::all();
        return view("admin.book.create",compact("validator","languages","authors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["author_id" => "required|exists:authors,id","language_id" => "required|exists:languages,id", "title" => "required|max:255", "description" => "required", "img" => "sometimes|nullable|file|image|max:10240","file"=>"required|file|max:100000"]);
        if(Book::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-book.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($book = Book::with(["author","language"])->find($id)){
            return view("admin.book.show",compact("book"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-book.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($book = Book::with(["author","language"])->find($id)){
            $validator = JsValidator::make(["author_id" => "required","language_id" => "required", "title" => "required|max:255", "description" => "required", "img" => "sometimes|nullable|file|image|max:10240","file"=>"sometimes|nullable|file|max:100000"]);
            $languages = Language::all();
            $authors = Author::all();
            return view("admin.book.edit",compact("validator","languages","authors","book"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-book.index");
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
        if($book = Book::with(["author","language"])->find($id)){
            $this->validate($request,["author_id" => "required|exists:authors,id","language_id" => "required|exists:languages,id", "title" => "required|max:255", "description" => "required", "img" => "sometimes|nullable|file|image|max:10240","file"=>"sometimes|nullable|file|max:100000"]);
            if(Book::updateData($request,$book)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-book.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($book = Book::with(["author","language"])->find($id)){
           File::deleteFile($book->img);
           File::deleteFile($book->file);
           $book->delete();
           toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-book.index");
    }
}
