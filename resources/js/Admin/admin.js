function alert_delete_item (vali_url){
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