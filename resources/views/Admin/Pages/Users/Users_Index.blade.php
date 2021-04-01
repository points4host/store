@extends('Admin.Header')
@section('content')
<br>


@if (session('masg'))
{{set_alart(session('masg'))}}
@endif

<div class="card bg-white shadow-sm p-3">

  <div class="card-header bg-white p-0 m-0 border-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">الحسابات</li>
    </ol>

  </div>

  {{-- Start table --}}

    <div class="d-flex bd-highlight mb-3">
      <div class="p-2 bd-highlight">عرض :</div>
      <div>
          <select class="form-control" onchange="window.location=this.value">
              <option value="{{$db->path()}}?perpage=5" {{ ($perpage =="5")? "selected" : "" }}>5</option>
              <option value="{{$db->path()}}?perpage=10" {{ ($perpage =="10")? "selected" : "" }}>10</option>
              <option value="{{$db->path()}}?perpage=25" {{ ($perpage =="25")? "selected" : "" }}>25</option>
              <option value="{{$db->path()}}?perpage=50" {{ ($perpage =="50")? "selected" : "" }}>50</option>
              <option value="{{$db->path()}}?perpage=100" {{ ($perpage =="100")? "selected" : "" }}>100</option>
          </select>
      </div>

      <div class="bd-highlight ml-auto">
          <a href="{{ route('user.create') }}" role="button" class="btn btn-success">
              <unicon name="book-medical" fill="#F7F7F7" width="20" height="20" ></unicon>  إضافة حساب جديد
          </a>
      </div>
    </div>

    <table class="table table-bordered table-hover border-0 dtbl-ahmad text-center table-control">
      <thead>
        <tr class="bg-dark text-light border-0">
          <th scope="col" width="15">#</th>
          <th scope="col">الاسم الشخصي <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=profiles.first_name'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col">إسم المستخدم <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=users.name'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col">البريد الإلكتروني</th>
          <th scope="col" width="90">الجنس <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=profiles.sex'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col" width="150">أخر تواجد <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=users.updated_at'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col" width="90">الحالة <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=users.is_active'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col" width="100">خيارات</th>
        </tr>
      </thead>
      <tbody id="imgPreview">
          
          @php
          // ترقيم الجدول
          if($db->currentPage() == 1){
              $numbering = 1;
          }else{
              $numbering = ($db->perPage()*($db->currentPage() - 1)) + 1;
          }
          @endphp

        @foreach($db as $val)
        <tr>
          <th scope="row">{{$numbering}}</th>
          <td>{{ $val->first_name }} {{ $val->last_name }}</td>
          <td>{{ $val->name }}</td>
          <td>{{ $val->email }}</td>
          <td>@php echo check_sex($val->sex) ; @endphp</td>
          <td>{{ $val->updated_at }}</td>
          <td>@php echo check_status($val->is_active) ; @endphp</td>
          <td>
            <unicon onclick="window.location='{{ route('user.edit',$val->id)}}'" class="icon_vue_mein" name="edit" fill="#808080" width="22" height="22" ></unicon>
            <unicon onclick="delete_user(this,'{{ route('user.destroy',$val->id)}}')" class="icon_vue_mein" name="trash-alt" fill="#808080" width="22" height="22" ></unicon>
          </td>
        </tr>
        @php $numbering++ ;@endphp
          @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-start">
      <nav>
          <ul class="pagination">
            <li class="page-item @if ($db->currentPage() == 1) disabled @endif"><a class="page-link" href="{{$url_pagination}}1">البداية</a></li>
            <li class="page-item @if ($db->currentPage() == 1) disabled @endif">
            <a class="page-link" href="{{$url_pagination}}{{$db->currentPage() - 1}}" tabindex="-1" aria-disabled="true">&laquo;</a>
            </li>
            @for ($i = 1; $i < ($db->lastPage() + 1); $i++)
              @if ($db->currentPage() == $i)
                  <li class="page-item active" aria-current="page">
                      <a class="page-link">{{$i}}</a>
                  </li>
              @else
                  @if (($db->currentPage() + 3) == $i)
                  <li class="page-item"><a class="page-link" >..</a></li>
                    @break
                  @elseif(($db->currentPage() - 3) == $i)
                  <li class="page-item"><a class="page-link" >..</a></li>
                  @elseif(($db->currentPage() - 3) > $i)
                    {{-- فارغ --}}
                  @else
                  <li class="page-item"><a class="page-link" href="{{$url_pagination}}{{$i}}">{{$i}}</a></li>
                  @endif
              @endif
            @endfor
            <li class="page-item @if ($db->currentPage() == $db->lastPage()) disabled @endif">
              <a class="page-link" href="{{$url_pagination}}{{$db->currentPage() + 1}}">&raquo;</a>
            </li>
            <li class="page-item @if ($db->currentPage() == $db->lastPage()) disabled @endif"><a class="page-link" href="{{$url_pagination}}{{$db->lastPage()}}">الاخير</a></li>
          </ul>
        </nav>
      <p class="py-1 px-2 mx-1 border rounded">عدد السجلات : {{$db->total()}}</p>
    </div>

  {{-- End table --}}

</div>
<script type="application/javascript">
  function delete_user (e,get_url){

    Swal.fire({
        title: 'هل تريد حذف الحساب ؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'تأكيد',
        cancelButtonText: 'إلغاء',
    }).then((result) => {
  
        if (result.isConfirmed) {
        var token = $('meta[name="csrf-token"]').attr('content'); 
        $.ajax( {
            method:'DELETE',
            header:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: get_url,
            data:{
              _token: token,
              dataType: 'json', 
              contentType:'application/json', 
            }
        })
        .done(function(data) {
            if(data['verify'] == 'success'){
              Swal.fire(
                'تم الحذف بنجاح',
                ' ',
                'success'
              ).then((result) => {
                document.getElementById("imgPreview").deleteRow(e.parentNode.parentNode.rowIndex -1);
              })
            }else{
              Swal.fire(
                'لم يتم الحذف',
                '',
                'error'
              )
            }
        })
        .fail(function() {
            Swal.fire(
              'لم يتم الحذف',
              '',
              'error'
            )
        });
        }
    })
  }
</script>

@endsection
