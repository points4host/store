@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">المنتجات</a></li>
        <li class="breadcrumb-item active" aria-current="page">إضافة منتج جديد</li>
    </ol>

</div>

<br>

<div class="bg-white p-4 rounded shadow-sm">

    @if($errors->any())
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data">

        @csrf

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">عام</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="x5-tab" data-toggle="tab" href="#x5" role="tab" aria-controls="x5" aria-selected="true">البيانات</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">التصنيف</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="imges-tab" data-toggle="tab" href="#imges" role="tab" aria-controls="imges" aria-selected="false">الصور</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="x1-tab" data-toggle="tab" href="#x1" role="tab" aria-controls="x1" aria-selected="false">العروض</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="x2-tab" data-toggle="tab" href="#x2" role="tab" aria-controls="x2" aria-selected="false">تخفيضات</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" id="brand-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="brand" aria-selected="true">الماركة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="true">ESO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="price-tab" data-toggle="tab" href="#price" role="tab" aria-controls="price" aria-selected="true">السعر</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                <div class="p-3">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">أسم المنتج:</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required placeholder="اسم المنتج">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">الحالة :</label>
                        <div class="col-sm-11">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" value="1" checked >
                                <label class="form-check-label" for="inlineRadio1">تفعيل</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active">
                                <label class="form-check-label" for="inlineRadio2">تعطيل</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">الوصف :</label>
                        <div class="col-sm-11">
                            
                        <textarea class="ckeditor form-control" name="description">{{old('description')}}</textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="x5" role="tabpanel" aria-labelledby="x5-tab">
                <div class="p-3">
                    {{--
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">رقم المنتج:</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" name="number" placeholder="0">
                        </div>
                    </div>
                    --}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">الكمية:</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" name="quantity" placeholder="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">اظهار كمية المنتج للعميل :</label>
                        <div class="col-sm-11">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="show_quantity" value="1">
                                <label class="form-check-label" for="inlineRadio1">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="show_quantity" value="0" checked>
                                <label class="form-check-label" for="inlineRadio2">لا</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">اقصى كمية لكل عميل:</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" name="max_orders" placeholder="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">الوزن:</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" name="weight" placeholder="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">وحدة القياس :</label>
                        <div class="col-sm-11">
                            <select class="form-select"  data-placeholder="أختيار وحدة القياس" name="measurement" >
                                @foreach ($measurement as $item)
                                    <option value="{{$item->id}}" >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="p-3">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">التصنيف :</label>
                        <div class="col-sm-5">
                            <select id="select2__select" multiple data-placeholder="أختيار التصنيف" data-allow-clear="1" class="form-control" name="sub[]" style="font-size: small">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="imges" role="tabpanel" aria-labelledby="imges-tab">







                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">الرئيسية</th>
                        <th scope="col">الترتيب</th>
                        <th scope="col">الحذف</th>
                      </tr>
                    </thead>
                    <tbody id="imgPreview">
                      
                    </tbody>
                  </table>
    
                <div class="custom-file" style="width: 20%;">
                    <input type="file" class="custom-file-input" id="images" multiple="multiple">
                    <label class="custom-file-label" for="images">أختيار الصور</label>
                </div>
    




<script>
    class FileList {
    constructor(...items) {
        items = [].concat(...items);
        if (items.length && !items.every(file => file instanceof File)) {
        throw new TypeError("expected argument to FileList is File or array of File objects");
        }
        const dt = new ClipboardEvent("").clipboardData || new DataTransfer();
        for (let file of items) {
        dt.items.add(file)
        }
        return dt.files;
    }
    }

    $(function() {
        
    $('#images').on('change', function(e) {

        var filesAmount = e.target.files.length;
        
        for (i = 0; i < filesAmount; i++) {
            var files_aw = e.target.files[i];
            var cc = e.target.files[i].lastModified;
            var input_files = new FileList(e.target.files[i]);
            var input = document.createElement("input");
            input.type = "file";
            input.hidden = "hidden";
            input.name = "imageFile[]";
            input.files = input_files;

            var master_img = document.createElement("input");
            master_img.type = "checkbox";
            master_img.name = "master_img[]";
            master_img.value = "1";

            var img_order = document.createElement("input");
            img_order.type = "text";
            img_order.value = "0";
            img_order.name = "img_order[]";
            img_order.className = "form-control";
            img_order.style.cssText = "width: 50px;text-align: center;direction: ltr;";
            
            var delete_rew = document.createElement("button");
            delete_rew.type = "button";
            delete_rew.innerHTML = "حذف";
            delete_rew.className = "btn btn-danger btn-sm";
            delete_rew.onclick = function(){
                document.getElementById("imgPreview").deleteRow(this.parentNode.parentNode.rowIndex -1);
            };
            ////
            var row = document.createElement("tr");
            var cell1 = document.createElement("td");
            cell1.className = "align-middle";
            var cell2 = document.createElement("td");
            cell2.className = "align-middle";
            var cell3 = document.createElement("td");
            cell3.className = "align-middle";
            var cell4 = document.createElement("td");
            cell4.className = "align-middle";
            var cell5 = document.createElement("td");
            cell5.className = "align-middle";
            cell2.id = 'set_id_img';
            
            cell2.appendChild(input);
            cell3.appendChild(master_img);
            cell4.appendChild(img_order);
            cell5.appendChild(delete_rew);
            row.appendChild(cell1);
            row.appendChild(cell2);
            row.appendChild(cell3);
            row.appendChild(cell4);
            row.appendChild(cell5);
            

            var add_row = document.getElementById("imgPreview");
            add_row.insertAdjacentElement("afterbegin", row);
            
            var reader = new FileReader();
            
            reader.onload = function(event) {
                var x = document.createElement("img");
                x.setAttribute("src", event.target.result);
                x.setAttribute("width", "100");
                x.setAttribute("height", "100");
                x.setAttribute("class", "shadow-sm");
                var el_up = document.querySelectorAll("#set_id_img");
                var last = el_up[el_up.length- 1];
                last.appendChild(x);
                last.removeAttribute("id");
            }
            reader.readAsDataURL(e.target.files[i]);
        }
    });
    });    
</script>


            </div>
            <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                <div class="p-3">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label pr-0">الماركة:</label>
                        <div class="col-sm-10">
                            <select class="form-select"  data-placeholder="أختيار الماركة" name="brand" >
                                @foreach ($brand as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                <div class="p-3">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label pr-0">الكلمات الدليلية:</label>
                        <div class="col-sm-10">
                            <input  type="text" class="form-control" name="seo_keywords" placeholder="الكلمات الدليلية">
                            <label for="">افصل "،" بين كل كلمة</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                <div class="p-3">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">سعر المنتج:</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" placeholder="0.00" min="0" step="0.01">
                            @error('unit_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">الشحن :</label>
                        <div class="col-sm-11">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_shipping" value="1">
                                <label class="form-check-label" for="inlineRadio1">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_shipping" value="0" checked>
                                <label class="form-check-label" for="inlineRadio2">لا</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">شامل الضريبة :</label>
                        <div class="col-sm-11">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_tax" value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_tax" value="0">
                                <label class="form-check-label" for="inlineRadio2">لا</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label">الخصم :</label>
                        <div class="col-sm-11">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_discount_active" value="1">
                                <label class="form-check-label" for="inlineRadio1">تفعيل</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_discount_active" value="0" checked>
                                <label class="form-check-label" for="inlineRadio2">معطل</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">نسبة الخصم:</label>
                        <div class="col-sm-11">
                            <input type="number" id="discount" oninput="price_discount()" class="form-control @error('discount') is-invalid @enderror" name="discount" placeholder="0" min="0" step="0" max="100">
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">السعر بعد الخصم:</label>
                        <div class="col-sm-11">
                            <input type="number" id="price_after_discount" class="form-control @error('price_after_discount') is-invalid @enderror" name="price_after_discount" placeholder="0.00" min="0" step="0.01">
                            @error('price_after_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">التاريخ:</label>
                        <div class="col-sm-11">
                            <input type="text"
                                data-range="true"
                                data-multiple-dates-separator=" - "
                                data-language="en"
                                data-position='top left'
                                class="datepicker-here" style="direction: ltr;text-align: center"/>
                        </div>
                    </div>
                    -->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">بداية العرض:</label>
                        <div class="col-sm-11">
                            <input type="text" value="" name="start_date" class="form-control" data-toggle="datepicker">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-1 col-form-label pr-0">نهاية العرض:</label>
                        <div class="col-sm-11">
                            <input type="text" value="" name="end_date" class="form-control" data-toggle="datepicker">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">إضافة</button>
            <a class="btn btn-danger text-white" role="button" onclick="window.history.back()">الغاء</a>
        </div>
    </form>
</div>


<script>

</script>


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="application/javascript">
  $(document).ready(function () {
      $('.ckeditor').ckeditor();
  });
  function price_discount() {
        var numVal1 = Number(document.getElementById("unit_price").value);
        var numVal2 = Number(document.getElementById("discount").value) / 100;
        var totalValue = numVal1 - (numVal1 * numVal2)
        document.getElementById("price_after_discount").value = totalValue.toFixed(2);
    }
</script>

@endsection
