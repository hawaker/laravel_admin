<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\permission_group;
use App\Utils\ajaxDone;
use App\Dwz\DwzUI;
class PermissionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DwzUI $dwz) {
        var_dump($dwz); 
        $groups = permission_group::paginate(20);
        return view("permission/group/index", compact("groups"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("permission/group/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->input();
        $group = new permission_group();
        if (isset($input['name'])) {
            $exists= permission_group::where("name",$input['name'])->count();
            if($exists>0){
                return ajaxDone::success(false)->message("权限分组重复!");
            }
            $group->name = $input["name"];
        } else {
            return ajaxDone::success(false)->message("权限分组名称不能为空!");
        }
        if (isset($input['desp'])) {
            $group->desp = $input['desp'];
        }
        $done=$group->save();
        return ajaxDone::success($done)->autoClose();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    public function lookup(){
        $groups= permission_group::all()->toArray();
        return view("permission/group/lookup", compact("groups"));
    }
}