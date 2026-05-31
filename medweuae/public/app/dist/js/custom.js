$(document).ready(function(){

    if($('.tooltips').length){
        $('.tooltips').tooltipster({
            theme: 'tooltipster-punk'
        });
    }

    if($('.placeholder-cls').val()=='' || $('.placeholder-cls').val()==null){
        $('.placeholder-cls').val('alt="Medwe"');
    }

    if($('.fancy').length>0){
        $("a.fancy").fancybox({
            'zoomSpeedIn': 300,
            'zoomSpeedOut': 300,
            'overlayShow': false
        });
    }
    
    $(document).on('click','.card-footer .btn-default', function(){
        history.back();
    });

    if($('.copy-clipboard').length>0){
        new Clipboard('.copy-clipboard');

        $('.copy-clipboard').on('click',function(){
            swal( 'Success !', 'Deal URL copied succesfully', 'success' );
        });
    }

    $("#forgot_password_btn").click(function(event) {
        var email= $('#forgot_username').val();
        var _token = token;
        if(email==''){  
            $("#forgot_username").attr("placeholder", "Please enter email").css({'border':'1px solid #F15C25'});
        }else{      
            $('#forgot_password_btn').val('Please wait...!');  
            $.ajax({
                url:base_url+'/admin/forgot-password/',
                type:"POST",
                dataType:'json',
                data: {email:email,_token:_token},
                success: function(response)
                {
                    $('#forgot_password_btn').val('Submit');
                    if(response.status == true){ 
                        $('#forgot_username').val('');
                        swal( 'Success !', 'Please check your e-mail for the reset link.', 'success' );   
                    }else{
                        swal( 'Error !', response.message, 'error' );
                    }
                }
            });
        }       
    });
    
    $('.for_canonical_url').on('blur',function(){
        var title = $(this).val();
        var cleaned_text = '';
        cleaned_text = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
        cleaned_text = cleaned_text.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
        $('#short_url').val(cleaned_text);
    });
    
    $('#password_reset').on('click',function(e){
        e.preventDefault();
        var strength = 0;
        var password     = $('#c_password').val();
        var auth_token = $('#token').val();
        var id = $('#id').val();
        var _token = token;
        var confirm_password = $('#confirm_password').val();    
        if(password=='' || confirm_password==''){
            $('#c_password').css({'border':'1px solid #F15C25'});
            $('#confirm_password').css({'border':'1px solid #F15C25'});
        }else{
            if (password.length >= 8){
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            }else{
                swal( 'Error !', 'Password must atleast 8 characters', 'error' );
                return false;
            }
            if(password!=confirm_password){
                $('#confirm_password').val('');
                swal( 'Error !', "New Password and Confirm Password doesen't match", 'error' );
            }else{
                $('#password_reset').val('Please wait..!');
                $('#c_password').css({'border':'1px solid #527234'});
                $('#confirm_password').css({'border':'1px solid #527234'});
                $.ajax({
                    url:base_url+'/admin/reset-password-store',
                    type:"POST",
                    dataType:'json',
                    data: {password:password,auth_token:auth_token,_token:_token,id:id},
                    success:function(response){
                     if(response.status==true){
                        $('.error_message').html('');
                        swal({
                            title: "Done it!",
                            text: response.message,
                            type: "success"
                        }, function() {
                            window.location.href=base_url+'/admin';
                        });
                     }else{
                        swal( 'Error !', response.message, 'error' );
                     }
                    }
                }); 
            }
        }
    });

    // $('.tinyeditor').summernote();

    if($('.tinyeditor').length>0){
        tinymce.init({
            selector: '.tinyeditor',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 200,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: 'oxide',
            content_css: 'default',
            relative_urls : false,
            document_base_url : fc_path,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            filebrowserUploadUrl : base_url+'uploads/editor/',
            images_upload_base_path: base_url+'public/uploads/editor/',
            images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;
              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', base_url+'/home/image_process?_token='+token);
          
              xhr.onload = function() {
                var json;
          
                if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
                }
          
                json = JSON.parse(xhr.responseText);   
          
                if (!json || typeof json.location != 'string') {
                  failure('Invalid JSON: ' + xhr.responseText);
                  return;
                }
                success(json.location);
              };
          
              formData = new FormData();
              formData.append('upload', blobInfo.blob(), blobInfo.filename());
              xhr.send(formData);
            },
        });
    }

    load_table();

    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');

    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut(); 
            $('.login-info-box').fadeIn();
            
            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');
            
        }
        else if($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();
            
            $('.white-panel').removeClass('right-log');
            
            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });

    $(document).on('blur', '.sort_order', function() {
        var sort_order = $(this).val();
        var type = $(this).data('type');
        var id = $(this).data('id');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + '/banner/sort_order/',
            data: { sort_order: sort_order, type: type, id: id, _token: _token },
            success: function(data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    swal('Success !', 'Sort order has been updated succesfully', 'success');
                }
            }
        })
    });

    $(document).on('blur','.common_sort_order',function(){            
        var sort_order = $(this).val();
        var table = $(this).data('table');
        var id = $(this).data('id');
        var _token = token;
        $.ajax({
            type:'POST',
            dataType:'json',
            url:base_url+'/home/sort_order/',
            data: { sort_order: sort_order,table:table,id:id,_token:_token},
            success: function (data) {
                if(data.status==false){
                    swal( 'Error !', data.message, 'error' );
                }else{
                    swal( 'Success !', 'Sort order has been updated succesfully', 'success' );
                }
            }
        })
    });

    $("#check_all").click(function() {
        $(".single_box").prop('checked', $(this).prop('checked'));
        checkbox_array();
    });

    $(".single_box").change(function() {
        if (!$(this).prop("checked")) {
            $("#check_all").prop("checked", false);
        }
    });

    $(document).on('click', '.single_box', function() {
        checkbox_array();
    });

    function checkbox_array() {
        var service_ids = [];
        $('.single_box').each(function() {
            if ($(this).prop('checked') == true) {
                service_ids.push($(this).val());
            }
        });
        if (service_ids.length > 0) {
            var ids = service_ids.join(",");
            $('.delete_btn').show();
            $('#ids').val(ids);
            $('.common-cart-class').html('<i class="fa fa-ban fa-lg"></i>').removeClass('cart_notify_modal');
        } else {
            $('.delete_btn').hide();
            $('#ids').val(0);
            $('.common-cart-class').html('<i class="fa fa-send fa-lg"></i>').addClass('cart_notify_modal');
        }
    }

    $(document).on('click', '#delete_contact_btn', function() {
        var _token = token;
        var id = $('#ids').val();
        swal({
            title: "Are you sure?",
            text: "You will be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/contact/delete_multi_contact/',
                    data: { id: id, _token: _token },
                    success: function(data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({ title: "Success", text: "Entry has been deleted!", type: "success" },
                                function() {
                                    location.reload();
                                }
                            );
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $(document).on('click', '#delete_quote_btn', function() {
        var _token = token;
        var id = $('#ids').val();
        swal({
            title: "Are you sure?",
            text: "You will be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/contact/delete_multi_quote/',
                    data: { id: id, _token: _token },
                    success: function(data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({ title: "Success", text: "Entry has been deleted!", type: "success" },
                                function() {
                                    location.reload();
                                }
                            );
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $(document).on('click', '.replay_modal', function() {
        var request = $(this).data('request');
        var id = $(this).data('id');
        var replay = $(this).data('replay');
        $('#replay-modal').modal('show');
        $('#request_details').html('');
        $('#request_details').html(request);
        if (replay == '') {
            $('#id').val(id);
            $('#replay').html('');
            $('#replay_to_contact').show();
        } else {
            $('#replay').html(replay);
            $('#replay_to_contact').hide();
        }
    });

    $(document).on('click','#replay_to_contact',function(e){
        var url = $('#url').val();
        e.preventDefault();
        $('#replay_to_contact').val('Please Wait..!');
        $.ajax({
            type:'POST',
            dataType:'json',
            data:$('#formWizard').serialize(),
            url:base_url+'/contact/'+url,
            success:function(response){
                $('#replay_to_contact').val('Update Replay');
                if(response.status==true){
                    swal({title: "Success", text: response.message, type: "success"},
                       function(){ 
                           location.reload();
                       }
                    );
                }else{
                    swal( 'Error !', response.message, 'error' );
                }
            },error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });
    });

    $(document).on('click', '.delete_entry', function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var _token = token;
        if(id){
            swal({
                title: "Are you sure?",
                text: "You will be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type:'POST',
                        dataType:'json',
                        url:base_url+'/'+url,
                        data: { id: id,_token:_token},
                        success: function (data) {
                            if(data.status==false){
                                swal( 'Error !', data.message, 'error' );
                            }else{
                                swal({title: "Success", text: "Entry has been deleted!", type: "success"},
                                   function(){ 
                                       location.reload();
                                   }
                                );
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe :)", "error");
                }
            });
        }else{
            swal( 'Error !', 'Entry not found', 'error' );
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#login_email_id').on('keyup',function(){
        $('#username').val($(this).val());
    });

    if($('.status_check').length){
        $(document).on('switchChange.bootstrapSwitch', '.status_check', function (event, state) {
            var table = $(this).attr('title');
            var primary_key = $(this).attr('ref');
            var field = $(this).data('field');
            var _token = token;
            state = state;
            $.ajax({
                type:'POST',
                url:base_url+'/status-change/',
                data:{state:state,table:table,primary_key:primary_key,_token:_token,field:field},
                success:function(response){
                    if(response=="1"){
                        swal( 'Success !', 'Status has been changed succesfully', 'success' );
                    }else{
                        swal( 'Error !', 'Error while changing the status', 'error' );
                    }
                }
            });
        });
    }

    if($('.display_to_home').length){
        $(document).on('switchChange.bootstrapSwitch', '.display_to_home', function (event, state) {
            var id = $(this).data('id');
            var url = $(this).data('url');
            var _token = token;
            state = state;
            $.ajax({
                type:'POST',
                dataType:'json',
                url:base_url+'/'+url,
                data:{id:id,_token:_token,state:state},
                success:function(response){
                    if(response.status==true){
                        swal({
                            title: "Done it!",
                            text: response.message,
                            type: "success"
                        });
                    }else{
                        swal({
                            title: "Error",
                            text: response.message,
                            type: "error"
                        });
                    }
                }
            });
        });
    }


/***************************** Validating form submission **********************************/

    $('#formWizard').on('submit',function(e){
        var buttonHtml = $('.submitBtn').val();
        $('.loadingImg').show();
        $('.submitBtn').attr('disabled',true).val('Please wait...!');
        var required = [];
        $('.required').each(function(){
            var id = $(this).attr('id');
            var id_text = $(this).attr('placeholder');
            if($(this).hasClass('tinyeditor')){
                var editorContent = tinymce.get($(this).attr('id')).getContent();
                if (editorContent == ''){
                    required.push($('#'+id).val());
                    // $('#'+id+'_error').html('Please enter '+id_text).css({'color':'#FF0000','font-size':'14px'});
                    $('#'+id+'_error').html('This field is required').css({'color':'#FF0000','font-size':'14px'});
                }else{
                    $('#'+id+'_error').html('');
                }
            }else{
                if($('#'+id).val()==''){
                    required.push($('#'+id).val());
                    // $('#'+id+'_error').html('Please enter '+id_text).css({'color':'#FF0000','font-size':'14px'});
                    $('#'+id+'_error').html('This field is required').css({'color':'#FF0000','font-size':'14px'});
                }else{
                    $('#'+id+'_error').html('');
                }
            }
        });
        if(required.length==0){
            if($('.file-error-message').is(":visible")){
                e.preventDefault();
                $('.loadingImg').hide();
                $('.submitBtn').attr('disabled',false).val(buttonHtml);
            }else{
                $('.loadingImg').show();
                $('.submitBtn').attr('disabled',true).val('Please wait...!');
                $('#formWizard').submit();
            }
        }else{
            e.preventDefault();
            $('.loadingImg').hide();
            $('.submitBtn').attr('disabled',false).val(buttonHtml);
        }
    });

/********************* Service Features clone menu *****************************/

    $(document).on('click', '.add_feature_row', function() {
        $('.submitBtn').val('Please wait..!').attr('disabled',true);
        var unique_id = $(this).attr('id');
        var plus_unique = parseFloat(unique_id) + 1;
        var _token = token;
        $.ajax({
            type: 'POST',
            data: { unique_id: unique_id, _token: _token },
            url: base_url + '/service/feature/extra/row',
            success: function(response) {
                $('.add_feature_row').hide();
                $(response).hide().insertAfter("#append_result_" + unique_id).fadeIn(500);
                $('.submitBtn').val('Submit').attr('disabled',false);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal('Error !', 'Some error occured', 'error');
                $('.submitBtn').val('Submit').attr('disabled',false);
            }
        });
    });
    $(document).on('click', '.remove_feature_row', function() {
        $('.submitBtn').val('Please wait...').attr('disabled',true);
        var primary_key = $(this).attr('id');
        var data_key = $(this).attr('ref');
        var _token = token;
        if (data_key == 0) {
            var previous_key = parseFloat(primary_key) - 1;
            $(this).closest('.form-row').fadeOut(300, function() {
                $(this).remove();
                $('.add_feature_row').hide();
                $('.add_feature_row:last').show();
                $('.submitBtn').val('Submit').attr('disabled',false);
            });
        } else {
            swal({
                title: "Are you sure?",
                text: "You will be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + '/service/feature/remove/extra_row/',
                        data: { id: data_key, _token: _token },
                        success: function(data) {
                            if (data.status == false) {
                                swal('Error !', data.message, 'error');
                            } else {
                                swal({ title: "Success", text: "Entry has been deleted!", type: "success" },
                                    function() {
                                        // location.reload();
                                        $('#append_result_'+primary_key).remove();
                                        $('.add_feature_row').hide();
                                        $('.add_feature_row:last').show();
                                        $('.submitBtn').val('Submit').attr('disabled',false);
                                    }
                                );
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe :)", "error");
                    $('.submitBtn').val('Submit').attr('disabled',false);
                }
            });
        }
    });

/********************* Service Features clone menu ends *************************/

/************* Validating form submission *******************/

    if($('.select2').length>0){
        $('.select2').select2({
          theme: 'bootstrap4',
          placeholder: 'select Item'
        });
    }

    $('#refresh_code').on('click',function(){
        passwordGenerate();
    });

    passwordGenerate();
});    

function passwordGenerate(){
    var password =  Array(8).fill('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@-#$')
    .map(x => x[Math.floor(crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * x.length)]).join('');   
    $("#login_password").val(password);
}

function load_table(){
    $recordsListView = $('.dataTable');
    if ( $recordsListView.length ) {
        $(".dataTable").DataTable({
            "fnDrawCallback": function( oSettings ) {
                if($(".status_check").length){
                    $(".status_check").bootstrapSwitch();
                }
                if($(".display_to_home").length){
                    $(".display_to_home").bootstrapSwitch();
                }
                if($('.tooltips').length){
                    $('.tooltips').tooltipster({
                        theme: 'tooltipster-punk'
                    });
                }
            },
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
        });
    }
    $('#clear-search-result').attr('disabled',false);
}