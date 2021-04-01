<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('calendar.index') }}">المهام</a>
      </li>
    </ul>

    <div class="form-inline">

      <button v-tippy title="تنبيهات" type="button" class="btn btn-dark btn-sm" style="margin-left: 5px;">
          <unicon name="bell" fill="#fff" width="22" height="22" ></unicon>
          <i class="uil uil-bell"></i>
      </button>

      <button v-tippy title="رسائل خاصة" type="button" class="btn btn-info btn-sm" style="margin-left: 5px;">
          <unicon name="envelope-alt" fill="#fff" width="22" height="22" ></unicon>
      </button>

      <button v-tippy type="button" class="btn btn-danger btn-sm" title="تسجيل الخروج" data-toggle="tooltip" data-placement="bottom">
          <unicon name="signout" fill="#fff" width="22" height="22" ></unicon>
      </button>

      <div class="border px-2 py-1 text-muted mx-2 text-center" style="font-size: 11px;">

      </div>
      <div class="dropdown" style="margin-left: 10px;">
        <img style="cursor: pointer;" src="{{asset('icons/default_user.png')}}" width="45" height="45" id="drr4e" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="dropdown-menu text-center" aria-labelledby="drr4e" style="font-size: 14px;">
              <a class="dropdown-item" href="#">الملف الشخصي</a>
              <a class="dropdown-item" href="#">كلمة المرور</a>
          </div>
      </div>
    </div>
  </div>
</nav>
