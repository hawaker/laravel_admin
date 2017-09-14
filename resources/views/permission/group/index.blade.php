<div class="pageHeader" style="border:1px #B8D0D6 solid">
    <form id="pagerForm"  action="permission/groups" method="post"onsubmit="return divSearch(this,navTabAjaxDone);">
        <input type="hidden" name="pageNum" value="1" />
        <input type="hidden" name="numPerPage" value="${model.numPerPage}" />
        <input type="hidden" name="orderField" value="${param.orderField}" />
        <input type="hidden" name="orderDirection" value="${param.orderDirection}" />
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td>组名称：<input type="text" name="name" /></td>
                    <td><div class="buttonActive"><div class="buttonContent"><button type="submit">搜索</button></div></div></td>
                    <td><div class="button"><div class="buttonContent"><button type="reset">重置</button></div></div></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="pageContent" style="border-left:1px #B8D0D6 solid;border-right:1px #B8D0D6 solid">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="permission/groups/create" target="dialog" mask="true"><span>添加权限分组</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
        </ul>
    </div>
    <table class="table" width="99%" layoutH="60">
        <thead>
            <tr>
                <th width="80">序号</th>
                <th width="120" orderField="number" class="asc">名称</th>
                <th>描述</th>
                <th>创建时间</th>
                <th>编辑</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $value)
            <tr target="sid_obj" rel="{{$value["id"]}}">
                <td>{{$value["id"]}}</td>
                <td>{{$value["name"]}}</td>
                <td>{{$value["desp"]}}</td>
                <td>{{$value["created_at"]}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$groups->dwzpage}}
</div>