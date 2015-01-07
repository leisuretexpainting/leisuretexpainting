//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
})


var ltp_admin = function(){

    var self = this;

    this.init_admin = function(){

        /*admin Login*/
        $('#form-admin-login').submit(function(e){
            $.ajax({
                type    : 'post',
                url     : '/admin/login',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    if(result.success){
                        $('#admin-login-alert').removeClass('alert-danger');
                        $('#admin-login-alert').addClass('alert-success');
                        $('#admin-login-alert p').html('<strong>Success!</strong> Redirecting..');
                        $('#admin-login-alert').show();
                        window.location = '/admin';
                    }else{                        
                        $('#admin-login-alert p').html(result.error_message);
                        $('#admin-login-alert').addClass('alert-danger');
                        $('#admin-login-alert').show();
                    }
                }
            });
            e.preventDefault();
        });
    }

    this.show_form_group_error = function(field,message){
        $('#'+field).parent().addClass('has-error');
        $('#'+field).parent().find('label').text(message);
        $('#'+field).parent().find('label').show();
    }
    
    this.clear_form_create_user = function(){
    }
}

window.ltp_admin = new ltp_admin();
window.ltp_admin.init_admin();

