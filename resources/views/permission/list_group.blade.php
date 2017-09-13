<div class="pageHeader" style="border:1px #B8D0D6 solid">
    <form id="pagerForm" onsubmit="return divSearch(this, 'jbsxBox');" action="demo/pagination/list1.html" method="post">
        <input type="hidden" name="pageNum" value="1" />
        <input type="hidden" name="numPerPage" value="${model.numPerPage}" />
        <input type="hidden" name="orderField" value="${param.orderField}" />
        <input type="hidden" name="orderDirection" value="${param.orderDirection}" />
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td class="dateRange">
                        尿检日期:
                        <input type="text" value="" readonly="readonly" class="date" name="dateStart">
                        <span class="limit">-</span>
                        <input type="text" value="" readonly="readonly" class="date" name="dateEnd">
                    </td>
                    <td>
                        尿检结果：
                        <input type="radio" name="njjg" value="" checked="checked" />全部
                        <input type="radio" name="njjg" value="1"/>阴性
                        <input type="radio" name="njjg" value="2"/>阳性
                    </td>
                    <td>病人编号：<input type="text" name="keyword" /></td>
                    <td><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="pageContent" style="border-left:1px #B8D0D6 solid;border-right:1px #B8D0D6 solid">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="demo/pagination/dialog2.html" target="dialog" mask="true"><span>添加尿检检测</span></a></li>
            <li><a class="delete" href="demo/pagination/ajaxDone3.html?uid={sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
            <li><a class="edit" href="demo/pagination/dialog2.html?uid={sid_obj}" target="dialog" mask="true"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
        </ul>
    </div>
    <table class="table" width="99%" layoutH="260" rel="jbsxBox">
        <thead>
            <tr>
                <th width="80">序号</th>
                <th width="120" orderField="number" class="asc">名称</th>
                <th>描述</th>
                <th>创建时间</th>
                <td>编辑</td>
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
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'jbsxBox')">
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
            <span>条，共50条</span>
        </div>
        <div class="pagination" rel="jbsxBox" totalCount="200" numPerPage="20" pageNumShown="5" currentPage="1"></div>
    </div>
</div>