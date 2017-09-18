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
        $groups = permission_group::all();
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
        $input = $request->input();
        if (isset($input['org1_id']) && isset($input['name'])) {
            $group = permission_group::find($input['org1_id'])->count();
            if ($group <= 0) {
                return ajaxDone::success(false)->message("权限分组错误!");
            }
            $exists = permissions::where([
                        ['name', $input['name']],
                        ['groups_id', $input['org1_id']]
                ])->count();
            if ($exists > 0) {
                return ajaxDone::success(false)->message("权限名称重复!");
            }
            $p = new permissions();
            $p->name = $input['name'];
            $p->groups_id = $input['org1_id'];
            if (isset($input['desp'])) {

                $p->desp = $input['desp'];
            }
            $done = $p->save();
            return ajaxDone::success($done)->autoClose();
        }
        return ajaxDone::success(false)->message("参数不完整!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        if ($id == 0) {
            $group = permission_group::all()->count();
        } else {
            $group = permission_group::find($id)->count();
        }
        if ($group > 0) {
            if ($id == 0) {
                $permissions = permissions::paginate(20);
            } else {
                $permissions = permissions::where("groups_id", $id)->paginate(20);
            }
            return view("permission/list", compact("permissions", "id"));
        } else {
            return ajaxDone::success(false)->message("您查找的权限组不存在!");
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
