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
    var selectedContractor;

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
    }

    this.init_user_scripts = function(){

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

        self.init_user_actions();
    }

    this.init_user_actions = function(){
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

        $('.btn-remove-user').unbind().click(function(){
            var current = $(this);
            var user_id = $(this).attr('user-id');            
            $.ajax({
                type    : 'delete',
                url     : '/admin/users/'+user_id,
                dataType: 'json',
                success : function(result){
                    if(result.success)
                        current.parent().parent().parent().remove();
                }
            });
            e.preventDefault();
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

    this.init_contractor_scripts = function(){
        $('#admin-contractors-list').dataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,5 ] }
            ]
        });

        self.init_contractor_actions();
    }

    this.init_contractor_actions = function(){
        $('#form-create-contractor').unbind().submit(function(e){

            $.ajax({
                type    : 'post',
                url     : '/admin/contractors',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        self.clear_form_create_contractor();
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.name) { self.show_form_group_error('name',result.error_message.name); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                        if(undefined != result.error_message.phone) { self.show_form_group_error('phone',result.error_message.phone); }
                        if(undefined != result.error_message.business_address_street) { self.show_form_group_error('business_address_street',result.error_message.business_address_street); }
                        if(undefined != result.error_message.business_address_suburb) { self.show_form_group_error('business_address_suburb',result.error_message.business_address_suburb); }
                        if(undefined != result.error_message.business_address_state) { self.show_form_group_error('business_address_state',result.error_message.business_address_state); }
                        if(undefined != result.error_message.business_address_zip) { self.show_form_group_error('business_address_zip',result.error_message.business_address_zip); }
                        if(undefined != result.error_message.postal_address_street) { self.show_form_group_error('postal_address_street',result.error_message.postal_address_street); }
                        if(undefined != result.error_message.postal_address_suburb) { self.show_form_group_error('postal_address_suburb',result.error_message.postal_address_suburb); }
                        if(undefined != result.error_message.postal_address_state) { self.show_form_group_error('postal_address_state',result.error_message.postal_address_state); }
                        if(undefined != result.error_message.postal_address_zip) { self.show_form_group_error('postal_address_zip',result.error_message.postal_address_zip); }
                        if(undefined != result.error_message.abn) { self.show_form_group_error('abn',result.error_message.abn); }

                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
        });

        $('#form-update-contractor').unbind().submit(function(e){
            var contractor_id = $('#contractor_id').val();
            $.ajax({
                type    : 'put',
                url     : '/admin/contractors/'+contractor_id,
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){                        
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.name) { self.show_form_group_error('name',result.error_message.name); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                        if(undefined != result.error_message.phone) { self.show_form_group_error('phone',result.error_message.phone); }
                        if(undefined != result.error_message.business_address_street) { self.show_form_group_error('business_address_street',result.error_message.business_address_street); }
                        if(undefined != result.error_message.business_address_suburb) { self.show_form_group_error('business_address_suburb',result.error_message.business_address_suburb); }
                        if(undefined != result.error_message.business_address_state) { self.show_form_group_error('business_address_state',result.error_message.business_address_state); }
                        if(undefined != result.error_message.business_address_zip) { self.show_form_group_error('business_address_zip',result.error_message.business_address_zip); }
                        if(undefined != result.error_message.postal_address_street) { self.show_form_group_error('postal_address_street',result.error_message.postal_address_street); }
                        if(undefined != result.error_message.postal_address_suburb) { self.show_form_group_error('postal_address_suburb',result.error_message.postal_address_suburb); }
                        if(undefined != result.error_message.postal_address_state) { self.show_form_group_error('postal_address_state',result.error_message.postal_address_state); }
                        if(undefined != result.error_message.postal_address_zip) { self.show_form_group_error('postal_address_zip',result.error_message.postal_address_zip); }
                        if(undefined != result.error_message.abn) { self.show_form_group_error('abn',result.error_message.abn); }

                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
        });

        $('.btn-remove-contractor').unbind().click(function(){
            var current = $(this);
            var contractor_id = $(this).attr('contractor-id');            
            $.ajax({
                type    : 'delete',
                url     : '/admin/contractors/'+contractor_id,
                dataType: 'json',
                success : function(result){
                    if(result.success)
                        current.parent().parent().parent().remove();
                }
            });
            e.preventDefault();
        });
    }

    this.init_contact_scripts = function(){

        $('#admin-contacts-list').dataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,5 ] }
            ]
        });

        self.init_contact_actions();
    }

    this.init_contact_actions = function(){

        $('#form-create-contact').unbind().submit(function(e){
            $.ajax({
                type    : 'post',
                url     : '/admin/contacts',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        self.clear_form_create_contact();
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.grade) { self.show_form_group_error('grade',result.error_message.grade); }
                        if(undefined != result.error_message.name) { self.show_form_group_error('name',result.error_message.name); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                        if(undefined != result.error_message.phone) { self.show_form_group_error('phone',result.error_message.phone); }
                        if(undefined != result.error_message.address_street) { self.show_form_group_error('address_street',result.error_message.address_street); }
                        if(undefined != result.error_message.address_suburb) { self.show_form_group_error('address_suburb',result.error_message.address_suburb); }
                        if(undefined != result.error_message.address_state) { self.show_form_group_error('address_state',result.error_message.address_state); }
                        if(undefined != result.error_message.address_zip) { self.show_form_group_error('address_zip',result.error_message.address_zip); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
        });

        $('#form-update-contact').unbind().submit(function(e){
            var contact_id = $('#contact_id').val();
            $.ajax({
                type    : 'put',
                url     : '/admin/contacts/'+contact_id,
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){                        
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.grade) { self.show_form_group_error('grade',result.error_message.grade); }
                        if(undefined != result.error_message.name) { self.show_form_group_error('name',result.error_message.name); }
                        if(undefined != result.error_message.email) { self.show_form_group_error('email',result.error_message.email); }
                        if(undefined != result.error_message.phone) { self.show_form_group_error('phone',result.error_message.phone); }
                        if(undefined != result.error_message.address_street) { self.show_form_group_error('address_street',result.error_message.address_street); }
                        if(undefined != result.error_message.address_suburb) { self.show_form_group_error('address_suburb',result.error_message.address_suburb); }
                        if(undefined != result.error_message.address_state) { self.show_form_group_error('address_state',result.error_message.address_state); }
                        if(undefined != result.error_message.address_zip) { self.show_form_group_error('address_zip',result.error_message.address_zip); }
                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
        });

    }

    this.init_tender_scripts = function(){
        self.init_admin();        
        self.init_typeahead_contractors();
        self.init_tender_actions();

        $("#job_due_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $('#admin-tenders-list').dataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,6 ] }
            ]
        });
    }

    this.init_typeahead_contractors = function(){
        /*contractors.json*/
        var contractor = $('#contractor_name');
        $.get('/admin/data/contractors.json', function(data){
            if(data.length > 0){
                contractor.typeahead({ source:data });
            }
        },'json');

        contractor.change(function(){
                    $('#new_contractor').val(0);
                    var current     = contractor.val();
                    var data        = contractor.typeahead('getActive');

                    $('#table-contact-details').hide();
                    $('#table-new-contact').hide();

                    if(data && data.name.toLowerCase() == current.toLowerCase()){
                        $('#contractor_id').val(data.id);
                        $('#contractor_business_address_street').val(data.business_address_street);
                        $('#contractor_business_address_suburb').val(data.business_address_suburb);
                        $('#contractor_business_address_state').val(data.business_address_state);
                        $('#contractor_business_address_zip').val(data.business_address_zip);
                        $('#contractor_postal_address_street').val(data.postal_address_street);
                        $('#contractor_postal_address_suburb').val(data.postal_address_suburb);
                        $('#contractor_postal_address_state').val(data.postal_address_state);
                        $('#contractor_postal_address_zip').val(data.abn);
                        $('#contractor_abn').val(data.business_address_zip);
                        
                        self.selectedContractor = data;
                        self.create_contractor_contact_list(data);
                        self.init_tender_actions(data);
                        
                        $('#edit-contractor-details').show();
                        $('#add-new-contact').show();

                        contractor.parent().removeClass('has-error');
                        contractor.parent().find('label').hide();
                    }else{
                        $('#contractor_id').val('');
                        $('#contractor_business_address_street').val('');
                        $('#contractor_business_address_suburb').val('');
                        $('#contractor_business_address_state').val('');
                        $('#contractor_business_address_zip').val('');
                        $('#contractor_postal_address_street').val('');
                        $('#contractor_postal_address_suburb').val('');
                        $('#contractor_postal_address_state').val('');
                        $('#contractor_postal_address_zip').val('');
                        $('#contractor_abn').val('');

                        $('#contact_id').html('<option value="">Select Contact Details</option>');
                        $('#contact_id').selectpicker('refresh');
                        $('#contact_id').selectpicker('val','');
                        $('#table-select-contact-details').show();
                    }
                });
    }

    this.create_contractor_contact_list = function(){

        var contractor_id   = $('#contractor_id').val();
        var sourceUrl       = '/admin/data/contacts.json?1=1';
        if(contractor_id != '') sourceUrl += '&contractor_id='+contractor_id;
        sourceUrl += '&group_by=grade';

        $.get(sourceUrl, function(data){

            $('#contact_id').html('');
            var contactgroups = '';

            $.each(data,function(grade,contacts){
                contactgroups = '<optgroup label="Grade '+grade+'">';
                $.each(contacts,function(i,contact){ contactgroups += '<option value="'+contact.id+'">'+contact.name+'</option>'; });
                contactgroups += '</optgroup>';
            });
            $('#contact_id').append(contactgroups);
            $('#contact_id').selectpicker('refresh');
            $('#contact_id').selectpicker('val','');

        },'json');
    }
    
    this.init_tender_actions = function(){

        $('#edit-contractor-details').unbind().click(function(){
                $('#contractor_name').typeahead('destroy');
                $('#contractor_business_address_street').removeAttr('readonly');
                $('#contractor_business_address_suburb').removeAttr('readonly');
                $('#contractor_business_address_state').removeAttr('readonly');
                $('#contractor_business_address_zip').removeAttr('readonly');
                $('#contractor_postal_address_street').removeAttr('readonly');
                $('#contractor_postal_address_suburb').removeAttr('readonly');
                $('#contractor_postal_address_state').removeAttr('readonly');
                $('#contractor_postal_address_zip').removeAttr('readonly');
                $('#contractor_abn').removeAttr('readonly');

                $('#save-contractor-details').show();
                $('#cancel-contractor-details').show();

                $('#search-contractor-details').hide();
                $('#add-new-contractor').hide();
                $(this).hide();
        });

        $('#save-contractor-details').unbind().click(function(){
                self.init_typeahead_contractors();
                $('#contractor_business_address_street').prop('readonly',true);
                $('#contractor_business_address_suburb').prop('readonly',true);
                $('#contractor_business_address_state').prop('readonly',true);
                $('#contractor_business_address_zip').prop('readonly',true);
                $('#contractor_postal_address_street').prop('readonly',true);
                $('#contractor_postal_address_suburb').prop('readonly',true);
                $('#contractor_postal_address_state').prop('readonly',true);
                $('#contractor_postal_address_zip').prop('readonly',true);
                $('#contractor_abn').prop('readonly',true);
                
                $('#edit-contractor-details').show();
                $('#add-new-contractor').show();

                $('#cancel-contractor-details').hide();
                $(this).hide();
        });

        $('#cancel-contractor-details').unbind().click(function(){
                var contractor = self.selectedContractor;
                self.init_typeahead_contractors();
                $('#contractor_name').val(contractor.name);
                $('#contractor_business_address_street').val(contractor.business_address_street).prop('readonly',true);
                $('#contractor_business_address_suburb').val(contractor.business_address_suburb).prop('readonly',true);
                $('#contractor_business_address_state').val(contractor.business_address_state).prop('readonly',true);
                $('#contractor_business_address_zip').val(contractor.business_address_zip).prop('readonly',true);
                $('#contractor_postal_address_street').val(contractor.postal_address_street).prop('readonly',true);
                $('#contractor_postal_address_suburb').val(contractor.postal_address_suburb).prop('readonly',true);
                $('#contractor_postal_address_state').val(contractor.postal_address_state).prop('readonly',true);
                $('#contractor_postal_address_zip').val(contractor.abn).prop('readonly',true);
                $('#contractor_abn').val(contractor.business_address_zip).prop('readonly',true);
                
                $('#edit-contractor-details').show();
                $('#add-new-contractor').show();

                $('#save-contractor-details').hide();
                $(this).hide();
        });

        $('#add-new-contractor').unbind().click(function(){
                
                $('#new_contractor').val(1);
                $('#new_contact').val(1);

                $('#contractor_id').val('');
                $('#contractor_name').unbind().val('').attr('placeholder','new contractor name').typeahead('destroy').focus();
                $('#contractor_business_address_street').val('').removeAttr('readonly');
                $('#contractor_business_address_suburb').val('').removeAttr('readonly');
                $('#contractor_business_address_state').val('').removeAttr('readonly');
                $('#contractor_business_address_zip').val('').removeAttr('readonly');
                $('#contractor_postal_address_street').val('').removeAttr('readonly');
                $('#contractor_postal_address_suburb').val('').removeAttr('readonly');
                $('#contractor_postal_address_state').val('').removeAttr('readonly');
                $('#contractor_postal_address_zip').val('').removeAttr('readonly');
                $('#contractor_abn').val('').removeAttr('readonly');
                $('#edit-contractor-details').hide();
                $('#search-contractor-details').show();
                $('#contact_id').html('').selectpicker('refresh');
                
                $('#table-select-contact-details').hide();
                $('#table-contact-details').hide();
                $('#table-new-contact').show();
                $('#search-contact-details').hide();
                $(this).hide();
        });

        $('#search-contractor-details').unbind().click(function(){
            
                self.init_typeahead_contractors();
                $('#new_contractor').val(0);
                $('#new_contact').val(0);

                $('#contractor_name').val('').attr('placeholder','search contractor name').focus();
                $('#contractor_business_address_street').val('').prop('readonly',true);
                $('#contractor_business_address_suburb').val('').prop('readonly',true);
                $('#contractor_business_address_state').val('').prop('readonly',true);
                $('#contractor_business_address_zip').val('').prop('readonly',true);
                $('#contractor_postal_address_street').val('').prop('readonly',true);
                $('#contractor_postal_address_suburb').val('').prop('readonly',true);
                $('#contractor_postal_address_state').val('').prop('readonly',true);
                $('#contractor_postal_address_zip').val('').prop('readonly',true);
                $('#contractor_abn').val('').prop('readonly',true);
                $('#edit-contractor-details').hide();
                $('#add-new-contractor').show();
                $('#contact_id').html('').selectpicker('refresh');
                
                $('#table-select-contact-details').show();
                $('#table-contact-details').hide();
                $('#table-new-contact').hide();
                $(this).hide();
        });

        $('#add-new-contact').unbind().click(function(){

            $('#contact_id').val('');
            $('#new_contact').val(1);

            $('#table-new-contact .has-error label').hide();
            $('#table-new-contact .has-error').removeClass('has-error');
            $('#table-new-contact').show();
            $('#table-select-contact-details').hide();
            $('#table-contact-details').hide();
            $('#search-contact-details').show();
        });

        $('#search-contact-details').unbind().click(function(){

            $('#contact_id').val('');
            $('#new_contact').val(0);

            $('#new_contact_grade').val('');
            $('#new_contact_name').val('');
            $('#new_contact_email').val('');
            $('#new_contact_phone').val('');

            $('#table-select-contact-details').show();
            $('#table-contact-details').hide();
            $('#table-new-contact').hide();            

            self.create_contractor_contact_list();
        });

        $('select#contact_id').change(function(){
            var id = $(this).val();
            var sourceUrl       = '/admin/data/contacts.json?id='+id;
            $.get(sourceUrl, function(contact){
                if(contact != null){
                    $('#contact_grade').val(contact.grade);
                    $('#contact_name').val(contact.name);
                    $('#contact_email').val(contact.email);
                    $('#contact_phone').val(contact.phone);

                    $('#table-contact-details .has-error label').hide();
                    $('#table-contact-details .has-error').removeClass('has-error');
                    $('#table-contact-details').show();

                }else{
                    $('#contact_grade').val('');
                    $('#contact_name').val('');
                    $('#contact_email').val('');
                    $('#contact_phone').val('');
                    $('#table-contact-details').hide();
                }
            },'json');
        });
        
        $('.btn-remove-tender').unbind().click(function(e){
            var current = $(this);
            var id = $(this).attr('tender-id');
            $.ajax({
                type    : 'delete',
                url     : '/admin/tenders/'+id,
                dataType: 'json',
                success : function(result){
                    if(result.success)
                        current.parent().parent().parent().remove();                    
                }
            });
            e.preventDefault();
        });

        $('#form-create-tender').unbind().submit(function(e){
            $.ajax({
                type    : 'post',
                url     : '/admin/tenders',
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        self.clear_form_create_tender();
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.contractor_id) { $('#contractor_name').parent().parent().addClass('has-error');$('#contractor_name').parent().parent().find('label').text(result.error_message.contractor_id);$('#contractor_name').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.contractor_name) { $('#contractor_name').parent().parent().addClass('has-error');$('#contractor_name').parent().parent().find('label').text(result.error_message.contractor_name);$('#contractor_name').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.contractor_business_address_street) { self.show_form_group_error('contractor_business_address_street',result.error_message.contractor_business_address_street); }
                        if(undefined != result.error_message.contractor_business_address_suburb) { self.show_form_group_error('contractor_business_address_suburb',result.error_message.contractor_business_address_suburb); }
                        if(undefined != result.error_message.contractor_business_address_state) { self.show_form_group_error('contractor_business_address_state',result.error_message.contractor_business_address_state); }
                        if(undefined != result.error_message.contractor_business_address_zip) { self.show_form_group_error('contractor_business_address_zip',result.error_message.contractor_business_address_zip); }
                        if(undefined != result.error_message.contractor_postal_address_street) { self.show_form_group_error('contractor_postal_address_street',result.error_message.contractor_postal_address_street); }
                        if(undefined != result.error_message.contractor_postal_address_suburb) { self.show_form_group_error('contractor_postal_address_suburb',result.error_message.contractor_postal_address_suburb); }
                        if(undefined != result.error_message.contractor_postal_address_state) { self.show_form_group_error('contractor_postal_address_state',result.error_message.contractor_postal_address_state); }
                        if(undefined != result.error_message.contractor_postal_address_zip) { self.show_form_group_error('contractor_postal_address_zip',result.error_message.contractor_postal_address_zip); }
                        if(undefined != result.error_message.contractor_abn) { self.show_form_group_error('contractor_abn',result.error_message.contractor_abn); }

                        if($('#contractor_id').val() != '' && $('#new_contact').val() == 0 && undefined != result.error_message.contact_id) { $('#contact_id').parent().parent().addClass('has-error');$('#contact_id').parent().parent().find('label').text(result.error_message.contact_id);$('#contact_id').parent().parent().find('label').show(); }
                        if($('#new_contact').val() == 0 && undefined != result.error_message.contact_email) { self.show_form_group_error('contact_email',result.error_message.contact_email);   }
                        if($('#new_contact').val() == 0 && undefined != result.error_message.contact_phone) { self.show_form_group_error('contact_phone',result.error_message.contact_phone);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_name)  { self.show_form_group_error('new_contact_name',result.error_message.contact_name);     }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_email) { self.show_form_group_error('new_contact_email',result.error_message.contact_email);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_phone) { self.show_form_group_error('new_contact_phone',result.error_message.contact_phone);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_grade) { self.show_form_group_error('new_contact_grade',result.error_message.contact_grade);   }

                        if(undefined != result.error_message.job_due_date)          { $('#job_due_date').parent().parent().addClass('has-error');$('#job_due_date').parent().parent().find('label').text(result.error_message.job_due_date);$('#job_due_date').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.job_sales_id)          { self.show_form_group_error('job_sales_id',result.error_message.job_sales_id); }
                        if(undefined != result.error_message.job_name)              { self.show_form_group_error('job_name',result.error_message.job_name); }
                        if(undefined != result.error_message.job_type_id)           { self.show_form_group_error('job_type_id',result.error_message.job_type_id); }
                        if(undefined != result.error_message.job_address_street)    { self.show_form_group_error('job_address_street',result.error_message.job_address_street); }
                        if(undefined != result.error_message.job_address_suburb)    { self.show_form_group_error('job_address_suburb',result.error_message.job_address_suburb); }
                        if(undefined != result.error_message.job_address_state)     { self.show_form_group_error('job_address_state',result.error_message.job_address_state); }
                        if(undefined != result.error_message.job_address_zip)       { self.show_form_group_error('job_address_zip',result.error_message.job_address_zip); }

                    }
                    $("html, body").animate({scrollTop: 0}, 100);
                }
            });
            e.preventDefault();
        });

        $('#form-update-tender').unbind().submit(function(e){
            var tender_id = $('#tender_id').val();
            $.ajax({
                type    : 'put',
                url     : '/admin/tenders/'+tender_id,
                data    : $(this).serialize(),
                dataType: 'json',
                success : function(result){
                    $('div.form-group.has-error label').hide();
                    $('div.form-group.has-error').removeClass('has-error');

                    if(result.success){
                        $('.alert-success').show();
                    }else{
                        $('.alert-success').hide();
                        if(undefined != result.error_message.contractor_id) { $('#contractor_name').parent().parent().addClass('has-error');$('#contractor_name').parent().parent().find('label').text(result.error_message.contractor_id);$('#contractor_name').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.contractor_name) { $('#contractor_name').parent().parent().addClass('has-error');$('#contractor_name').parent().parent().find('label').text(result.error_message.contractor_name);$('#contractor_name').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.contractor_business_address_street) { self.show_form_group_error('contractor_business_address_street',result.error_message.contractor_business_address_street); }
                        if(undefined != result.error_message.contractor_business_address_suburb) { self.show_form_group_error('contractor_business_address_suburb',result.error_message.contractor_business_address_suburb); }
                        if(undefined != result.error_message.contractor_business_address_state) { self.show_form_group_error('contractor_business_address_state',result.error_message.contractor_business_address_state); }
                        if(undefined != result.error_message.contractor_business_address_zip) { self.show_form_group_error('contractor_business_address_zip',result.error_message.contractor_business_address_zip); }
                        if(undefined != result.error_message.contractor_postal_address_street) { self.show_form_group_error('contractor_postal_address_street',result.error_message.contractor_postal_address_street); }
                        if(undefined != result.error_message.contractor_postal_address_suburb) { self.show_form_group_error('contractor_postal_address_suburb',result.error_message.contractor_postal_address_suburb); }
                        if(undefined != result.error_message.contractor_postal_address_state) { self.show_form_group_error('contractor_postal_address_state',result.error_message.contractor_postal_address_state); }
                        if(undefined != result.error_message.contractor_postal_address_zip) { self.show_form_group_error('contractor_postal_address_zip',result.error_message.contractor_postal_address_zip); }
                        if(undefined != result.error_message.contractor_abn) { self.show_form_group_error('contractor_abn',result.error_message.contractor_abn); }

                        if($('#contractor_id').val() != '' && $('#new_contact').val() == 0 && undefined != result.error_message.contact_id) { $('#contact_id').parent().parent().addClass('has-error');$('#contact_id').parent().parent().find('label').text(result.error_message.contact_id);$('#contact_id').parent().parent().find('label').show(); }
                        if($('#new_contact').val() == 0 && undefined != result.error_message.contact_email) { self.show_form_group_error('contact_email',result.error_message.contact_email);   }
                        if($('#new_contact').val() == 0 && undefined != result.error_message.contact_phone) { self.show_form_group_error('contact_phone',result.error_message.contact_phone);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_name)  { self.show_form_group_error('new_contact_name',result.error_message.contact_name);     }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_email) { self.show_form_group_error('new_contact_email',result.error_message.contact_email);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_phone) { self.show_form_group_error('new_contact_phone',result.error_message.contact_phone);   }
                        if($('#new_contact').val() == 1 && undefined != result.error_message.contact_grade) { self.show_form_group_error('new_contact_grade',result.error_message.contact_grade);   }

                        if(undefined != result.error_message.job_due_date)          { $('#job_due_date').parent().parent().addClass('has-error');$('#job_due_date').parent().parent().find('label').text(result.error_message.job_due_date);$('#job_due_date').parent().parent().find('label').show(); }
                        if(undefined != result.error_message.job_sales_id)          { self.show_form_group_error('job_sales_id',result.error_message.job_sales_id); }
                        if(undefined != result.error_message.job_name)              { self.show_form_group_error('job_name',result.error_message.job_name); }
                        if(undefined != result.error_message.job_type_id)           { self.show_form_group_error('job_type_id',result.error_message.job_type_id); }
                        if(undefined != result.error_message.job_address_street)    { self.show_form_group_error('job_address_street',result.error_message.job_address_street); }
                        if(undefined != result.error_message.job_address_suburb)    { self.show_form_group_error('job_address_suburb',result.error_message.job_address_suburb); }
                        if(undefined != result.error_message.job_address_state)     { self.show_form_group_error('job_address_state',result.error_message.job_address_state); }
                        if(undefined != result.error_message.job_address_zip)       { self.show_form_group_error('job_address_zip',result.error_message.job_address_zip); }

                    }
                    $("html, body").animate({scrollTop: 0}, 100);
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

    this.clear_form_create_contractor = function(){
        $('#name').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#business_address_street').val('');
        $('#business_address_suburb').val('');
        $('#business_address_state').val('');
        $('#business_address_zip').val('');
        $('#postal_address_street').val('');
        $('#postal_address_suburb').val('');
        $('#postal_address_state').val('');
        $('#postal_address_zip').val('');
        $('#abn').val('');
    }

    this.clear_form_create_contact = function(){
        $('#contractor_id').val('');
        $('#grade').val('');
        $('#name').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#address_street').val('');
        $('#address_suburb').val('');
        $('#address_state').val('');
        $('#address_zip').val('');
    }

    this.clear_form_create_tender = function(){
        $('#new_contractor').val(0);
        $('#new_contact').val(0);
        $('#contractor_id').val('');
        $('#contractor_name').val('');
        $('#contractor_business_address_street').val('');
        $('#contractor_business_address_suburb').val('');
        $('#contractor_business_address_state').val('');
        $('#contractor_business_address_zip').val('');
        $('#contractor_postal_address_street').val('');
        $('#contractor_postal_address_suburb').val('');
        $('#contractor_postal_address_state').val('');
        $('#contractor_postal_address_zip').val('');
        $('#contractor_abn').val('');

        $('#contact_id').html('<option value="">Select Contact Details</option>');
        $('#contact_id').selectpicker('refresh');
        $('#contact_id').selectpicker('val','');
        $('#table-select-contact-details').show();
        $('#table-contact-details').hide();
        $('#table-new-contact').hide();

        $('#job_due_date').val('');
        $('#job_sales_id').val('');
        $('#job_name').val('');
        $('#job_type_id').val('');
        $('#job_address_street').val('');
        $('#job_address_suburb').val('');
        $('#job_address_state').val('');
        $('#job_address_zip').val('');
        $('#fileupload-preview').html('');
    }
}

window.ltp_admin = new ltp_admin();
window.ltp_admin.init_admin();
