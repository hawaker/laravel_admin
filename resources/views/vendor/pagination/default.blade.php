<div class="panelBar">
    @if ($paginator->hasPages())
    <div class="pagination"
         @if (isset($type))
            targetType="{{$type}}"
         @else
            targetType="navTab"
         @endif
         
         totalCount="{{$paginator->total()}}" 
         numPerPage="{{$paginator->perPage()}}" 
         pageNumShown=3
         @if(isset($rel))
            rel="{{$rel}}"
         @endif
         currentPage="{{$paginator->currentPage()}}">
    </div>
    @endif
</div>