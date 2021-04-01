
<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الصلاحيات العامة :</p></h5>

<div class="form-group form-check">
    <div class="form-check form-check-inline  mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="Settings" {{ (in_array("Settings", $permission))? "checked" : "" }}>
        <label class="form-check-label">إعدادة الموقع</label>
    </div>
    <div class="form-check form-check-inline mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="Settsfsd" {{ (in_array("Settsfsd", $permission))? "checked" : "" }}>
        <label class="form-check-label" for="exampleCheck1">صيانة</label>
    </div>
</div>

<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الحسابات :</p></h5>


<div class="form-group form-check">
    <div class="form-check form-check-inline  mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="user-show" {{ (in_array("user-show", $permission))? "checked" : "" }}>
        <label class="form-check-label">عرض الحسابات</label>
    </div>
    <div class="form-check form-check-inline mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="user-add" {{ (in_array("user-add", $permission))? "checked" : "" }}>
        <label class="form-check-label" for="exampleCheck1">إضافة حساب جديد</label>
    </div>
    <div class="form-check form-check-inline mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="user-edite" {{ (in_array("user-edite", $permission))? "checked" : "" }}>
        <label class="form-check-label" for="exampleCheck1">تعديل الحساب</label>
    </div>
    <div class="form-check form-check-inline mr-5">
        <input type="checkbox" class="form-check-input" name="permission[]" value="user-delete" {{ (in_array("user-delete", $permission))? "checked" : "" }}>
        <label class="form-check-label" for="exampleCheck1">حذف الحساب</label>
    </div>
</div>

<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الدعم الفني لتذاكر :</p></h5>

<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">المنتجات :</p></h5>

<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الفواتير :</p></h5>

<h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">اقسام الموقع :</p></h5>