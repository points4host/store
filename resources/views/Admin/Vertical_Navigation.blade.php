<div id="mytopOpenSid">
    <span id="contact" onclick="openNav()">
        <unicon name="dialpad-alt" fill="#b8c7ce" width="22" height="22"></unicon>
    </span>
</div>


<div id="mySidenav" class="sidenav">

    <div class="d-flex mx-3 my-2">
        <img src="{{asset('icons/pantone.png')}}" width="25" height="25">
        <span class="mx-2 text-white-50">POINTS4HOST</span>
        <unicon class="ml-auto" style="cursor: pointer;" onclick="closeNav()" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
    </div>


    <div class="container my-4 text-center">
        <img src="{{asset('icons/pie-chart.png')}}" width="70" height="70" >
    </div>

    <!-- بداية كود القائمة  -->

  <p class="sid-hed">إعدادات الموقع</p>

    <!-- بداية قائمة 1  -->
    <div class="list-group">
        <li data-target="#muo-1" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="setting" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">قائمة 1</span>
            <div id="cvvvv" class="ml-auto">
                <span class="badge badge-primary badge-pill">14</span>
            </div>
        </li>
        <!-- @  -->
        <div id="muo-1" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list"><unicon name="circle" fill="#b8c7ce" width="16" height="16"></unicon>
                  <span style="margin-right: 5px">Dapibus ac facilisis</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- 1  -->





    <!-- بداية قائمة 2  -->
    <div class="list-group">
        <li onclick="nav_tr(this)" data-target="#muo-2" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="setting" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">إعدادت الموقع</span>
            <unicon class="ml-auto unicon_css" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
        </li>
        <!-- @  -->
        <div id="muo-2" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list">Cras justo odio</li>
                <li class="list-group-item p4h-head-menu-list">Dapibus ac facilisis in</li>
                <li class="list-group-item p4h-head-menu-list">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    <!-- 2  -->

    <!-- Start Calendar  -->
    <div class="list-group">
        <li onclick="nav_tr(this)" id="Accordion" data-target="#muo-calendar" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="schedule" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">المهام</span>
            <unicon class="ml-auto unicon_css" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
        </li>
        <!-- @  -->
        <div id="muo-calendar" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('calendar.index') }}">المهام</a></li>
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('permission.index') }}">الصلاحيات</a></li>
            </ul>
        </div>
    </div>
    <!-- End Calendar  -->



    <!-- بداية قائمة users  -->
    <div class="list-group">
        <li onclick="nav_tr(this)" id="Accordion" data-target="#muo-user" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="users-alt" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">الحسابات</span>
            <unicon class="ml-auto unicon_css" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
        </li>
        <!-- @  -->
        <div id="muo-user" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('user.index') }}">الحسابات</a></li>
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('permission.index') }}">الصلاحيات</a></li>
            </ul>
        </div>
    </div>
    <!-- users  -->

    <!-- بداية قائمة Products  -->
    <div class="list-group">
        <li onclick="nav_tr(this)" data-target="#muo-products" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="shopping-cart" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">المنتجات</span>
            <unicon class="ml-auto unicon_css" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
        </li>
        <!-- @  -->
        <div id="muo-products" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('product.index') }}">المنتجات</a></li>
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('category.index') }}">التصنيفات</a></li>
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('brand.index') }}">الماركة</a></li>
                <li class="list-group-item p4h-head-menu-list"><a href="{{ route('measurement.index') }}">وحدة القياس</a></li>
            </ul>
        </div>
    </div>
    <!-- Products  -->

    <!-- بداية قائمة ticket  -->
    <div class="list-group">
        <li onclick="nav_tr(this)" data-target="#muo-ticket" data-toggle="collapse" class="tc-1 ripple list-group-item justify-content-between align-items-center d-flex p4h-head-list rounded-0">
            <unicon name="comment-message" fill="#b8c7ce" width="18" height="18"></unicon>
            <span class="mx-3">تذاكر الدعم الفني</span>
            <unicon class="ml-auto unicon_css" name="angle-left" fill="#b8c7ce" width="22" height="22"></unicon>
        </li>
        <!-- @  -->
        <div id="muo-ticket" class="collapse p4h-head-menu">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p4h-head-menu-list">عرض التذاكر</li>
                <li class="list-group-item p4h-head-menu-list">ارسيف التذاكر</li>
            </ul>
        </div>
    </div>
    <!-- ticket  -->

<!-- نهاية كود القائمة  -->

    {{-- <div class="container text-white-50 p4h-head-menu-foter">

    </div> --}}


</div>
