<?php

namespace App\Http\Controllers\Admin;

use App\Footer;
use App\Http\Controllers\Controller;
use App\Language;
use App\Slider;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::with("language")->get();
        return view("admin.footer.index",compact("footers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["language_id"=>"required","title"=>"required|max:255",]);
        $languages = Language::all();
        return view("admin.footer.create",compact("languages","validator"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["language_id"=>"required|exists:languages,id","title"=>"required|max:255",]);
        if(Footer::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-footer.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("admin-footer.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($footer = Footer::find($id)){
            $validator = JsValidator::make(["language_id"=>"required","title"=>"required|max:255",]);
            $languages = Language::all();
            return view("admin.footer.edit",compact("footer","validator","languages"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-footer.index");
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
        if($footer = Footer::find($id)){
            $this->validate($request,["language_id"=>"required|exists:languages,id","title"=>"required|max:255",]);
            if(Footer::createData($request,$footer)){
                toastr()->success(__("messages.created"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-footer.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($footer = Footer::find($id)){
            $footer->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-footer.index");
    }
}
