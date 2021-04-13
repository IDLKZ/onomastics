<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Models\File;
use App\Advantage;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantages = Advantage::with("language")->paginate(15);
        return view("admin.advantage.index",compact("advantages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["language_id"=>"required|exists:languages,id","title"=>"required|max:255","img"=>"required|file|image|max:10240"]);
        $languages = Language::all();
        return view("admin.advantage.create",compact("languages","validator"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["language_id"=>"required|exists:languages,id","title"=>"required|max:255","img"=>"required|file|image|max:10240"]);
        if(Advantage::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-advantage.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("admin-advantage.edit",$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($advantage = Advantage::find($id)){
            $validator = JsValidator::make(["language_id"=>"required|exists:languages,id","title"=>"required|max:255","img"=>"required|file|image|max:10240"]);
            $languages = Language::all();
            return view("admin.advantage.edit",compact("advantage","validator","languages"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-Advantage.index");
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
        if($advantage = Advantage::find($id)){
            $this->validate($request,["language_id"=>"required|exists:languages,id","title"=>"required|max:255","img"=>"sometimes|nullable|file|image|max:10240"]);
            if(Advantage::updateData($request,$advantage)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-advantage.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($advantage = Advantage::find($id)){
            File::deleteFile($advantage->img);
            $advantage->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-advantage.index");
    }
}
