@extends('Web.Header')

@section('content')


<div class="container p-0 m-0 bg-secondary border">

    <div class="my-slick p-0 m-0">
        <div class="my-slick-b">your content 1</div>
        <div class="my-slick-b">your content 2</div>
        <div class="my-slick-b">your content 3</div>
        <div class="my-slick-b">your content 4</div>
        <div class="my-slick-b">your content 5</div>
        <div class="my-slick-b">your content 6</div>
        <div class="my-slick-b">your content 7</div>
        <div class="my-slick-b">your content 8</div>
        <div class="my-slick-b">your content 9</div>
      </div>

</div>


<script src="{{asset('js/slick.min.js')}}"></script>
<script>
    $(document).ready(function(){
      $('.my-slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rtl: true
      });
    });
</script>

@endsection
