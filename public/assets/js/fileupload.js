
var ltp_fileupload = function(){
    var self = this;

    this.init = function (){
        

        $('#fileupload-tender-documents').fileupload({
            url             : '/upload/tenderdocuments',
            dataType        : 'json',
            autoUpload      : true,
            //acceptFileTypes : /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize     : 25000000,
        }).on('fileuploadadd',function(e,data){
            //fileuploadadd
        }).on('fileuploadprocessalways',function(e,data){
            //fileuploadprocessalways
        }).on('fileuploadprogressall',function(e,data){
                $('#fileupload-progress').show();
                var progress    = parseInt(data.loaded / data.total * 100, 10);
                $('#fileupload-progress .progress-bar').css('width',progress + '%');
                
                if(progress == 100){
                    $('#fileupload-progress').hide();
                    $('#fileupload-progress .progress-bar').css('width','0%');  
                }                
        }).on('fileuploaddone',function(e,data){

                var html = "";                
                $('#fileupload-delete-all').show();
                $.each(data.result.files, function (index, file) {
                    if(file.url){

                        html += '<div class="upload-item row">';
                        html += '<div class="col-lg-1">';
                        if(undefined != file.thumbnailUrl){
                            html += '<a href="javascript:;" class="thumbnail">';
                            html += '<img src="'+file.thumbnailUrl+'"/>';
                            html += '</a>';
                        }else{
                                html += '<a href="javascript:;" class="thumbnail">';
                                html += '<span class="fa fa-file" style="font-size:30px;"></span>&nbsp;';
                                html += '</a>';
                        }

                        html += '</div>';
                        html += '<div class="col-lg-5">';
                        html += '<span class="fa fa-paperclip" style="font-size:30px;"></span>&nbsp;';
                        html += '<span>'+file.realName+'</span>';
                        html += '<input type="hidden" name="upload_name[]" value="'+file.name+'"/>';
                        html += '<input type="hidden" name="upload_text[]" value="'+file.realName+'"/>';
                        html += '</div>';
                        html += '<div class="col-lg-5">';
                        html += '<input name="upload_note[]" class="form-control" placeholder="add note to this file"/>';
                        html += '</div>';
                        html += '<div class="col-lg-1">';
                        html += '<button type="button" class="btn btn-sm btn-danger btn-delete-fileupload" delete-url="'+file.deleteUrl+'"><i class="fa fa-trash-o"></i> Remove</button>';
                        html += '</div>';
                        html += '</div>';

                         $('#fileupload-preview').append(html);
                        self.init_fileupload_actions();
                    }
                });

        }).on('fileuploadfail',function(e,data){
            //fileuploadfail
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    } 

    this.init_fileupload_actions = function(){

        $('.btn-delete-fileupload').click(function(){
            var current_item    = $(this);
            $.ajax({
                url     : current_item.attr('delete-url'),
                type    : 'DELETE',
                success : function(data){
                    current_item.parent().parent().remove();
                }
            });
        });

        $('#fileupload-delete-all').click(function(){

            var fileupload_items = $('.upload-item');
            $.each(fileupload_items,function(index,item){

                var delete_url      = $(item).find('.btn-delete-fileupload').attr('delete-url');                
                $.ajax({
                    url     : delete_url,
                    type    : 'DELETE',
                    success : function(data){
                        $(item).remove();
                    }
                });
            });
        });

        $('.btn-set-as-primary').click(function(){
            var current_upload  = $(this).parent().parent();
            $('#item_primary_image').val(current_upload.find('.image-name').val());
            $('.btn-set-as-primary').show();
            $(this).hide();
        });

        $('#btn-remove-discount-image').click(function(){
            $('#discount_image').val('');
        });

        $('#delete-profile-image').click(function(){

            $.ajax({
                url     : $(this).attr('delete-url'),
                type    : 'DELETE',
                success : function(data){
                    $('#profile_image').val('');
                    $('#profile-image-preview').attr('src','');
                    $('#delete-profile-image').attr('delete-url','');
                    $('#delete-profile-image').hide();
                    $('#upload-profile-image').parent().find('span').text('Upload Image');


                            var user_id = $('#user_id').val();
                            $.ajax({
                                type    : 'put',
                                url     : '/profile_image',
                                data    : {
                                            user_id         : $('#user_id').val(),
                                            profile_image   : $('#profile_image').val()
                                },
                                dataType: 'json',
                                success : function(result){
                                }
                            });
                           
                }
            });
        });
    }

    this.delete_image = function(object,image){
        $.ajax({
            url     : '/upload/'+object+'/?file='+image,
            type    : 'DELETE',
            success : function(data){
                return true;
            }
        });
    }
}

window.ltp_fileupload = new ltp_fileupload();
window.ltp_fileupload.init();

