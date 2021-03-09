<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy("created_at","DESC")->with("role")->paginate(15);
        return  view("admin.user.index",compact("users"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["name"=>"required","email"=>"required|email|unique:users,email","password"=>"required|min:4","role_id"=>"exists:roles,id","img"=>"sometimes|nullable|file|image|max:10240"]);
        $roles = Role::all();
        return view("admin.user.create",compact("validator","roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["name"=>"required","email"=>"required|email|unique:users,email","password"=>"required|min:4","role_id"=>"exists:roles,id","img"=>"sometimes|nullable|file|image|max:10240"]);
        if(User::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->success(__("messages.failed"));
        }
        return redirect()->route("admin-user.index");
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
        $user = User::find($id);
        if($user){
            $validator = JsValidator::make(["name"=>"required","email"=>"required|email|unique:users,email,".$id,"password"=>"sometimes|nullable|min:4","role_id"=>"exists:roles,id","img"=>"sometimes|nullable|file|image|max:10240"]);
            $roles = Role::all();
            return  view("admin.user.edit",compact("validator","roles","user"));
        }
        else{
            toastr()->error("404");
        }
        return redirect()->route("admin-user.index");


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
        $user = User::find($id);
        if($user){
            $this->validate($request,["name"=>"required","email"=>"required|email|unique:users,email,".$id,"password"=>"sometimes|nullable|min:4","role_id"=>"exists:roles,id","img"=>"sometimes|nullable|file|image|max:10240"]);
            if(User::updateData($request,$user)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error("404");
        }
        return redirect()->route("admin-user.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            if(Auth::id() !== $user->id){
                File::deleteFile($user->img);
                $user->delete();
                toastr()->success(__("messages.deleted"));
            }
        }
        else{
            toastr()->error("404");
        }
        return redirect()->route("admin-user.index");
    }
}
