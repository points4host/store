<?php
  
    function security_post($s){
        $s = trim($s);
        $s = str_replace('>','',$s);
        $s = str_replace('<','',$s);
        $s = str_replace("'",'',$s);
        $s = str_replace('"','',$s);
        $s = str_replace('&','',$s);
        $s = str_replace("=","",$s);
        $s = addslashes($s);
        $s = strip_tags($s);
        return $s;
    }
    function set_alart ($masg =''){
        echo '
        <div id="p4h_alert" class="p4h_alert_success shadow">
            <div class="d-flex justify-content-end">
                <div class="pt-4 px-2">'.$masg.'</div>
                <div class="success-animation">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                </div>
            </div>
            <div id="p4h_Progress"></div>
        </div>
        <script>
            p4h_set_alert();
        </script>
        ';
    }
    function check_status ($x){
    
        if($x == 1){
            return '<span class="badge badge-success py-1">فعال</span>';
        }
        
        return '<span class="badge badge-secondary py-1">متوقف</span>';
    }
    function check_discount ($x){
    
        if($x == 1){
            return '<span class="badge badge-danger py-1">فعال</span>';
        }
    }
    function check_sex ($x){
    
        if($x == 0){
            return '<span class="badge badge-dark py-1">ذكر</span>';
        }
        
        return '<span class="badge badge-info py-1">انثى</span>';
    }
    function check_main ($x){
    
        if($x == 0){
            return '<span class="badge badge-dark py-1">رئيسي</span>';
        }
        
        return '<span class="badge badge-info py-1">فرعي</span>';
    }
    // function get_sub ($arr,$x){
    
    //     foreach ($arr as $key){
    //         if($key == $x){

    //         }
    //     }
        
    //     return '<span class="badge badge-info py-1">فرعي</span>';
    // }