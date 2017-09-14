<form id="pagerForm" action="permission/groups/lookup">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="${model.numPerPage}" />
    <input type="hidden" name="orderField" value="${param.orderField}" />
    <input type="hidden" name="orderDirection" value="${param.orderDirection}" />
</form>
<div class="pageHeader">
    <form rel="pagerForm" method="post" action="demo/database/dwzOrgLookup.html" onsubmit="return dwzSearch(this, 'dialog');">
        <div class="searchBar">
            <ul class="searchContent">
                <li><label>分组名称:</label><input class="textInput" name="orgName" value="" type="text"></li>	  
            </ul>
            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="pageContent">
    <table class="table" layoutH="118" targetType="dialog" width="100%">
        <thead>
            <tr>
                <th orderfield="orgName">分组编号</th>
                <th orderfield="orgNum">分组名称</th>
                <th orderfield="leader">分组描述</th>
                <th orderfield="leader">创建日期</th>
                <th width="80">查找带回</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
            <tr>
                <td>{{$group['id']}}</td>
                <td>{{$group['name']}}</td>
                <td>{{$group['desp']}}</td>
                <td>{{$group['created_at']}}</td>
                <td><a class="btnSelect" href="javascript:$.bringBack({id:'{{$group['id']}}', name:'{{$group['name']}}'})" title="查找带回">选择</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>每页</span>
            <select name="numPerPage" onchange="dwzPageBreak({targetType: 'dialog', numPerPage: '10'})">
                <option value="10" selected="selected">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
            <span>条，共2条</span>
        </div>
        <div class="pagination" targetType="dialog" totalCount="2" numPerPage="10" pageNumShown="1" currentPage="1"></div>
    </div>
</div>