<ul>
@foreach($sidebarmenu as $category)
<li><a href="{{url('category/'.$category->slug.'/'.$category->id)}}">{{$category->catname}}</a>
    <ul class="sidebar-submenu">
        @foreach($category->subcategories as $subcategory)
        <li class="mega-menu">
            <a href="{{url('subcategory/'.$subcategory->slug.'/'.$subcategory->id)}}" class="subcat-title">{{$subcategory->subcategoryName}}</a>
                @foreach($subcategory->childcategories as $childcat)
               <ul>
                   <li>
                    <a href="{{url('products/'.$childcat->slug.'/'.$childcat->id)}}">{{$childcat->childcategoryName}}</a>
               </li>
               </ul>
               
               @endforeach
        </li>
        @endforeach
    </ul>
</li>
@endforeach
</ul>