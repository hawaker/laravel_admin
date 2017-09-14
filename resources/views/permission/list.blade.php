<div class="pageHeader" style="border:1px #B8D0D6 solid">
    <form id="pagerForm" action="permission/index" method="post" onsubmit="return divSearch(this, navTabAjaxDone);">
        <input type="hidden" name="pageNum" value="1" />
        <input type="hidden" name="numPerPage" value="${model.numPerPage}" />
        <input type="hidden" name="orderField" value="${param.orderField}" />
        <input type="hidden" name="orderDirection" value="${param.orderDirection}" />
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td class="dateRange">
                        添加日期:
                        <input type="text" value="" readonly="readonly" class="date" name="dateStart"><span class="limit">-</span><input type="text" value="" readonly="readonly" class="date" name="dateEnd">
                    </td>
                    <td>权限名称：<input type="text" name="name" /></td>
                    <td><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></td>
                    <td><div class="button"><div class="buttonContent"><button type="reset">重置</button></div></div></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="pageContent" style="border-left:1px #B8D0D6 solid;border-right:1px #B8D0D6 solid">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="permission/create" target="dialog" rel="permission.create" mask="true"><span>添加权限</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
        </ul>
    </div>
    <table class="table" width="99%" layoutH="150" rel="jbsxBox">
        <thead>
            <tr>
                <th width="80">序号</th>
                <th width="120" orderField="number" class="asc">名称</th>
                <th orderField="name">描述</th>
                <th width="100">添加日期</th>
                <th width="100">更多操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr target="sid_obj" rel="{{$permission['id']}}">
                <td>{{$permission['id']}}</td>
                <td>{{$permission['name']}}</td>
                <td>{{$permission['desp']}}</td>
                <td>{{$permission['created_at']}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            {{$permissions->links()}}
            
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'jbsxBox')">
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
            <span>条，共50条</span>
        </div>
        <div class="pagination" rel="permissionBox" totalCount="200" numPerPage="20" pageNumShown="5" currentPage="1"></div>
    </div>
</div>