<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::with("language")->get();
        return view("admin.about.index",compact("abouts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["language_id"=>"required|exists:languages,id","content"=>"required"]);
        $languages = Language::all();
        return view("admin.about.create",compact("validator","languages"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,["language_id"=>"required|exists:languages,id","content"=>"required"]);
            if(About::createData($request)){
                toastr()->success(__("messages.created"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
            return redirect()->route("admin-about.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("admin-about.edit",$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($about = About::find($id)){
            $validator = JsValidator::make(["language_id"=>"required","content"=>"required"]);
            $languages = Language::all();
            return view("admin.about.edit",compact("about","languages","validator"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-about.index");
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
        if($about = About::find($id)){
            if(About::createData($request,$about)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-about.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($about = About::find($id)){
            $about->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-about.index");
    }
}
