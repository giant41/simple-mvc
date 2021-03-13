$(function(){

    $('.btnAddUser').on('click', function(){
        var baseurl = $(this).data('zurl');
        $('#exampleModalLabel').html('Add User');
        $('.modal-footer button[type=submit]').html('Save');
        $('.modal-body form').attr('action', baseurl+'/user/addUser');
    });

    $('.editUser').on('click', function(){

        var baseurl = $(this).data('zurl');

        $('#exampleModalLabel').html('Edit User');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-body form').attr('action', baseurl+'/user/updateUser');
        const id = $(this).data('id');

        $.ajax({
            url: baseurl+'/user/getDataChange',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#id').val(data.id);
                $('#full_name').val(data.full_name);
                $('#email').val(data.email);
            }
        });
    });

    $('.search').change(function(){

        var search = $(".search").val();
        var baseurl = $(this).data('zurl');
        $.ajax({
            url: baseurl+'/user/search',
            data: {search : search},
            method: 'post',
            dataType: 'json',
            success: function(data){
                // console.log(data);
                // $('#id').val(data.id);
                // $('#full_name').val(data.full_name);
                // $('#email').val(data.email);
            }
        });
    });
    
})