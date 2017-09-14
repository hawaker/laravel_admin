<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission_group;
use App\Models\permissions;
use App\Utils\ajaxDone;

class PermissionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $groups= permission_group::all()->toArray();
        return view("permission/index", compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("permission/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input=$request->input();
        if(isset($input['org1.id'])&&isset($input['name'])){
            $group= permission_group::find($input['org1.id'])->count();
            if($group<=0){
                return ajaxDone::success(false)->message("权限分组错误!");
            }
            $exists= permissions::where("name",$input['name'])->count();
            if($exists>0){
                return ajaxDone::success(false)->message("权限名称重复!");
            }
            $p=new permissions();
            $p->name=$input['name'];
            $p->groups_id=$input['org1.id'];
            if(isset($input['desp'])){
                $p->desp=$input['desp'];
            }
            $done=$p->save();
            return ajaxDone::success($done)->autoClose();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id) {
        $group= permission_group::find($id);
        if($group){
            $permissions=permissions::where("groups_id",$id)->get()->toArray();
            return view("permission/list", compact("permissions","id"));
        }else{
            return ajaxDone::success(false)->message("您查找的权限组不存在!")->out();
        }
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
}