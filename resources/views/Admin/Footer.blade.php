<!-- Include datepicker -->
<script src="{{asset('datepicker/datepicker.js')}}"></script>
<script src="{{asset('datepicker/i18n/datepicker.ar-AE.js')}}"></script>

<script>
  $(function() {
    // https://fengyuanchen.github.io/datepicker/

      $('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
        language: 'ar-AE',
        format: 'yyyy-mm-dd'
      });
    });
  function nav_tr(x) {
    var f5rt4 = x.lastElementChild.id;

        if(f5rt4){
            x.lastElementChild.removeAttribute("id");
            x.lastElementChild.style.transform = "rotate(0deg)";
        }else{
            x.lastElementChild.setAttribute("id", "swe3q");
            x.lastElementChild.style.transform = "rotate(-90deg)";
        }
  }
      document.getElementById("mySidenav").style.width = "230px";
      document.getElementById("main").style.marginRight = "230px";

      document.getElementById("contact").style.marginRight = "230px";
      document.getElementById("mytopOpenSid").style.display = "none";


  function openNav() {
      document.getElementById("mySidenav").style.width = "230px";
      document.getElementById("main").style.marginRight = "230px";
      document.getElementById("mytopOpenSid").style.display = "none";
      //document.getElementById("mytopOpenSid").style.marginRight = "280px";
      document.getElementById("contact").style.marginRight = "230px";

  }
  function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginRight= "0";
      document.getElementById("mytopOpenSid").style.marginRight = "0";
      document.getElementById("contact").style.marginRight = "0";
      document.getElementById("mytopOpenSid").style.display = "block";
  }

    $(document).ready(function(){

        var str_url = window.location.pathname;


        if (str_url.indexOf('user') > -1) {
            $('#muo-user').collapse('show')
        }else if(str_url.indexOf('admin/permission') > -1){
            $('#muo-user').collapse('show')
        }else if(str_url.indexOf('admin/product') > -1){
            $('#muo-products').collapse('show')
        }else if(str_url.indexOf('admin/category') > -1){
            $('#muo-products').collapse('show')
        }else if(str_url.indexOf('admin/brand') > -1){
            $('#muo-products').collapse('show')
        }else if(str_url.indexOf('admin/measurement') > -1){
            $('#muo-products').collapse('show')
        }else if(str_url.indexOf('admin/calendar') > -1){

        }
        
    });

function delete_item (vali_url){
    Swal.fire({
      title: 'هل انت متاكد من الحذف ؟',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'تأكيد الحذف',
      cancelButtonText: 'إلغاء',
    }).then((result) => {
      if (result.isConfirmed) {
        var formdata = new FormData();
        formdata.append("_token", '<?php echo csrf_token() ?>');

        var ajax = new XMLHttpRequest();
        ajax.open("POST", vali_url);
        ajax.onreadystatechange = function() {
          
          if(ajax.readyState == 4 && ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            if(json['verify'] == 'success'){
              Swal.fire(
                'تم الحذف بنجاح',
                ' ',
                'success'
              ).then((result) => {
                location.reload();
              })
            }else{
              Swal.fire(
                'لم يتم الحذف',
                '',
                'error'
              )
            }
          }
        }
        ajax.send(formdata);
      }
    })
}
function destroy_item (vali_url){

    Swal.fire({
      title: 'هل انت متاكد من الحذف ؟',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'تأكيد الحذف',
      cancelButtonText: 'إلغاء',
    }).then((result) => {
      if (result.isConfirmed) {
        var formdata = new FormData();
        formdata.append("_token", '<?php echo csrf_token() ?>');
        formdata.append("_method", 'DELETE');

        var ajax = new XMLHttpRequest();
        ajax.open("POST", vali_url);
        ajax.onreadystatechange = function() {
          
          if(ajax.readyState == 4 && ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            if(json['verify'] == 'success'){
              Swal.fire(
                'تم الحذف بنجاح',
                ' ',
                'success'
              ).then((result) => {
                location.reload();
              })
            }else{
              Swal.fire(
                'لم يتم الحذف',
                '',
                'error'
              )
            }
          }
        }
        ajax.send(formdata);
      }
    })
}
</script>

<script>
    var app3 = new Vue({
        
        el: '#vue-app',
        data: {
        seen: true
        }
    })
  </script>
</body>
</html>
