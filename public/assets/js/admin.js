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

        self.init_modals();
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

        /*Create New User Role*/
        $('#form-create-userrole').submit(function(e){
            $.ajax({
                type    : 'post',
                url     : '/admin/userroles',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        $('#title').val('');
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.title) { self.show_form_group_error('title',result.error_message.title); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
            return false;
        });

        /*Update User Role*/
        $('#form-update-userrole').submit(function(e){
            var role_id = $('#role_id').val();
            $.ajax({
                type    : 'put',
                url     : '/admin/userroles/'+role_id,
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.title) { self.show_form_group_error('title',result.error_message.title); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
            return false;
        });

        /*Create New User*/
        $('#form-create-user').submit(function(e){
            $.ajax({
                type    : 'post',
                url     : '/admin/users',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        self.clear_form_create_user();
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.username) { self.show_form_group_error('username',result.error_message.username); }
                        if(undefined != result.error_message.password) { self.show_form_group_error('password',result.error_message.password); }
                        if(undefined != result.error_message.password_confirmation) { self.show_form_group_error('password_confirmation',result.error_message.password_confirmation); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
            return false;
        });

        /*Update User*/
        $('#form-update-user').submit(function(e){
            var user_id = $('#user_id').val();
            $.ajax({
                type    : 'put',
                url     : '/admin/users/'+user_id,
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        self.clear_form_create_user();
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.username) { self.show_form_group_error('username',result.error_message.username); }
                        if(undefined != result.error_message.password) { self.show_form_group_error('password',result.error_message.password); }
                        if(undefined != result.error_message.password_confirmation) { self.show_form_group_error('password_confirmation',result.error_message.password_confirmation); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
            return false;
        });



    }

    this.init_dataTables = function(){
        
        $('#admin-users-list').dataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,6 ] }
            ]
        });

        $('#admin-userroles-list').dataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2,4 ] }
            ]
        });
    }

    this.init_modals = function(){

        $('.btn-userrole-deactivate').unbind().click(function(e){
            var role_id = $(this).attr('role-id');
            
            $('#ltp-confirm-modal .modal-title').html('Deactivate this Role?');
            $('#ltp-confirm-modal .modal-footer').html('<button type="button" class="btn btn-primary btn-userrole-deactivate-confirm">Continue</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>');

            e.preventDefault();
        });

        $('.btn-userrole-remove').unbind().click(function(e){
            var role_id = $(this).attr('role-id');
            $.ajax({
                type    : 'get',
                url     : '/admin/userroles/'+role_id,
                dataType: 'json',
                success : function(result){
                    if(result.success){
                        $('#ltp-confirm-modal .modal-title').html('Remove this Role?');
                        $('#ltp-confirm-modal .modal-body').html('');
                        $('#ltp-confirm-modal .modal-footer').html('<button id="btn-userrole-remove-confirm" role-id="'+result.data.id+'" type="button" class="btn btn-primary">Continue</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>');
                        $('#ltp-confirm-modal').modal('show');
                        self.init_modal_actions();
                    }else{
                        $('#ltp-confirm-modal .modal-title').html('Error occured!');
                        $('#ltp-confirm-modal .modal-body').html('User Role not found.');
                        $('#ltp-confirm-modal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                        $('#ltp-confirm-modal').modal('show');
                    }
                }
            });
            e.preventDefault();
        });
    }

    this.init_modal_actions = function(){
        $('#btn-userrole-remove-confirm').unbind().click(function(e){
            var role_id = $(this).attr('role-id');
            $.ajax({
                type    : 'delete',
                url     : '/admin/userroles/'+role_id,
                dataType: 'json',
                success : function(result){
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
        $('#role_id').val(1);
        $('#username').val('');
        $('#password').val('');
        $('#password_confirmation').val('');
        $('#email').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        $('#birthdate').val('');
        $('#phone').val('');
    }
}

window.ltp_admin = new ltp_admin();
window.ltp_admin.init_admin();

