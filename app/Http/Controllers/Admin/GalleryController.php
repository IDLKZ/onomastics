<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderByDesc("created_at")->paginate(12);
        return view("admin.gallery.index",compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["title" => "required|max:255", "img" => "required|file|image|max:10240"]);
        return view("admin.gallery.create",compact("validator"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["title" => "required|max:255", "img" => "required|file|image|max:10240"]);
        if(Gallery::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-gallery.index");

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
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($gallery = Gallery::find($id)){
            File::deleteFile($gallery->img);
            $gallery->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("admin-gallery.index");
    }
}
