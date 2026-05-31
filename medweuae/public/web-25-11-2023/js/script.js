
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}


$(document).ready(function(){

$('.owl-carousel-one').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


$('.owl-carousel-sec').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

});





// about page counter box script
// $(document).ready(function() {

// $('.counter').each(function () {
// $(this).prop('Counter',0).animate({
// Counter: $(this).text()
// }, {
// duration: 4000,
// easing: 'swing',
// step: function (now) {
// $(this).text(Math.ceil(now));
// }
// });
// });

// });
// about page counter box script end


// about page counter box script
function inVisible(element) {
  //Checking if the element is
  //visible in the viewport
  var WindowTop = $(window).scrollTop();
  var WindowBottom = WindowTop + $(window).height();
  var ElementTop = element.offset().top;
  var ElementBottom = ElementTop + element.height();
  //animating the element if it is
  //visible in the viewport
  if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
    animate(element);
}

function animate(element) {
  //Animating the element if not animated before
  if (!element.hasClass('ms-animated')) {
    var maxval = element.data('max');
    var html = element.html();
    element.addClass("ms-animated");
    $({
      countNum: element.html()
    }).animate({
      countNum: maxval
    }, {
      //duration 5 seconds
      duration: 5000,
      easing: 'linear',
      step: function() {
        element.html(Math.floor(this.countNum) + html);
      },
      complete: function() {
        element.html(this.countNum + html);
      }
    });
  }

}

//When the document is ready
$(function() {
  //This is triggered when the
  //user scrolls the page
  $(window).scroll(function() {
    //Checking if each items to animate are 
    //visible in the viewport
    $("h2[data-max]").each(function() {
      inVisible($(this));
    });
  })
});
// about page counter box script end


$('a.jumbing_top').click(function(e)
{
    // Special stuff to do when this link is clicked...

    // Cancel the default action
    e.preventDefault();
});

$(document).ready(function(){

    $('.input-field').bind('input', function() {
      var c = this.selectionStart,
          r = /[^a-z0-9 .]/gi,
          v = $(this).val();
      if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
      }
      this.setSelectionRange(c, c);
    });

    $('#file-input').change(function(){
        const file = this.files[0];
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                $('#quote_product_image_uploaded').val(1);
            }
            reader.readAsDataURL(file);
        }
    });

    $('.clickable-element').on('click',function(){
        window.location.href=$(this).data('href');
    });

    $('a').click(function(){
      var largeImage = $(this).attr('data-full');
      $('.selected').removeClass();
      $(this).addClass('selected');
      $('.full img').hide();
      $('.full img').attr('src', largeImage);
      $('.full img').fadeIn();


    }); // closing the listening on a click
    $('.full img').on('click', function(){
      var modalImage = $(this).attr('src');
      $.fancybox.open(modalImage);
    });

    $(document).on('click', '.filter-param', function(){
        var categoryId = $(this).data('category_param');
        $('#category_id').val(categoryId);
        var brand_ids = [];
        $('.filter-brand-param').each(function() {
            if ($(this).prop('checked') == true) {
                brand_ids.push($(this).val());
            }
        });
        $('#brand_id').val(brand_ids);
        $('#filterForm').submit();
    });

    $(document).on('click', '.filter-brand-param', function(){
        checkbox_array();
    });

    function checkbox_array() {
        var brand_ids = [];
        $('.filter-brand-param').each(function() {
            if ($(this).prop('checked') == true) {
                brand_ids.push($(this).val());
            }
        });
        $('#brand_id').val(brand_ids);
        $('#filterForm').submit();
    }

    $(document).on('submit','#filterForm',function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:$('#filterForm').serialize(),
            url:base_url+'/filter-products',
            success:function(response){
                if(response.status==true){
                    $('#filter-result').html(response.data);
                }else{
                    swal({
                        title: 'Error',
                        text: 'Some error occured, Please try after sometime',
                        type: 'error'
                    });
                }
            },error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });
    });

    $(document).on('click', '.submit-form-btn', function (e) {
        e.preventDefault();
        var btn_value = $(this).html();
        var form_flag = $(this).data('flag');
        var email_id = $('#'+form_flag+'_email').val();
        var form_id = $(this).closest("form").attr('id');
        var formData = new FormData(document.getElementById(form_id));
        var required = [];
        var _token = token;
        var url = $(this).data('url');
        $('.'+form_flag+'-required').each(function(){
            var id = $(this).attr('id');
            if($('#'+id).val()==''){
                required.push($('#'+id).val());
                $('#'+id+'_error').html('This field is required');
            }else{
                $('#'+id+'_error').html('');
            }
        });
        if(required.length==0){
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email_id)) {
                swal({
                    title: 'Error',
                    text: 'Please enter a valid email id',
                    type: 'error'
                });
                $('#'+form_flag+'_email').css({'border-bottom':'1px solid #FF0000'});
            }else{
                $('.submit-form-btn').html('Please wait..!');
                $('.with-errors').html('');
                $.ajax({
                    type:'POST',
                    dataType:'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/'+url,
                    success:function(response){
                        $('.submit-form-btn').html(btn_value);
                        if(response.status==true){
                            swal({
                                title: 'Success',
                                text: 'Entry has been submitted successfully',
                                type: 'success'
                            },function(){
                                window.location.reload();
                            });
                        }else if(response.status=="error"){
                            $('#'+form_flag+'_email').css({'border-bottom':'1px solid #FF0000'});
                        }else{
                            swal({
                                title: 'Error',
                                text: response.message,
                                type: response.status
                            });
                        }
                    }
                });
            }
        }
    });
});