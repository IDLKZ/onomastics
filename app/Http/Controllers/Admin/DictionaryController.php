<?php

namespace App\Http\Controllers\Admin;

use App\Dictionary;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionaries = Dictionary::orderBy("word","ASC")->paginate(100);
        return view("admin.dictionary.index",compact("dictionaries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["word"=>"required|max:255","img"=>"sometimes|nullable|file|image|max:10240","description"=>"required"]);
        return view("admin.dictionary.create",compact("validator"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["word"=>"required|max:255","img"=>"sometimes|nullable|file|image|max:10240","description"=>"required"]);
        if(Dictionary::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-dictionary.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($dictionary = Dictionary::find($id)){
            $validator = JsValidator::make(["word"=>"required|max:255","img"=>"sometimes|nullable|file|image|max:10240","description"=>"required"]);
            return view("admin.dictionary.edit",compact("dictionary"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-dictionary.index");
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
        if($dictionary = Dictionary::find($id)){
            $this->validate($request,["word"=>"required|max:255","img"=>"sometimes|nullable|file|image|max:10240","description"=>"required"]);
            if(Dictionary::updateData($request,$dictionary)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-dictionary.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($dictionary = Dictionary::find($id)){
            File::deleteFile($dictionary->img);
            $dictionary->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-dictionary.index");
    }
}
