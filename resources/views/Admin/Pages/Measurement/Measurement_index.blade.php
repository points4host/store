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
        <li class="breadcrumb-item active" aria-current="page">وحدة القياس</li>
    </ol>

  </div>


  {{-- Start table --}}

    <div class="d-flex bd-highlight mb-3">
      <div class="p-2 bd-highlight">عرض :</div>
      <div>
          <select dir="ltr" class="form-control" onchange="window.location=this.value">
              <option value="{{$db->path()}}?perpage=5" {{ ($perpage =="5")? "selected" : "" }}>5</option>
              <option value="{{$db->path()}}?perpage=10" {{ ($perpage =="10")? "selected" : "" }}>10</option>
              <option value="{{$db->path()}}?perpage=25" {{ ($perpage =="25")? "selected" : "" }}>25</option>
              <option value="{{$db->path()}}?perpage=50" {{ ($perpage =="50")? "selected" : "" }}>50</option>
              <option value="{{$db->path()}}?perpage=100" {{ ($perpage =="100")? "selected" : "" }}>100</option>
          </select>
      </div>

      <div class="bd-highlight ml-auto">
          <a href="{{ route('measurement.create') }}" role="button" class="btn btn-success">
              <unicon name="book-medical" fill="#F7F7F7" width="20" height="20" ></unicon>  إضافة وحدة قياس جديدة
          </a>
      </div>
    </div>

    <table class="table table-bordered table-hover border-0 dtbl-ahmad text-center table-control">
      <thead>
        <tr class="bg-dark text-light border-0">
          <th scope="col" width="15">#</th>
          <th scope="col">أسم وحدة القياس <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=measurements.name'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col" width="90">الحالة <unicon onclick="window.location='{{$db->path()}}?orderby={{$html_orderby}}&order_value=measurements.is_active'" class="{{$css_orderby}}" name="sort-amount-up" fill="#b8c7ce" ></unicon></th>
          <th scope="col" width="100">خيارات</th>
        </tr>
      </thead>
      <tbody>
          
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
          <td>{{ $val->name }}</td>
          <td>@php echo check_status($val->is_active) ; @endphp</td>
          <td>
              <unicon onclick="window.location='{{ route('measurement.edit',$val->id)}}'" class="icon_vue_mein" name="edit" fill="#808080" width="22" height="22" ></unicon>
              <unicon onclick="destroy_item('{{ route('measurement.destroy',$val->id)}}')" class="icon_vue_mein" name="trash-alt" fill="#808080" width="22" height="22" ></unicon>
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
              <li class="page-item"><a class="page-link" href="{{$url_pagination}}{{$i}}">{{$i}}</a></li>
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


@endsection
