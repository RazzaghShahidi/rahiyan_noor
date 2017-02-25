/**
 * Created by sarwin on 02/12/2017.
 */

/**
 *
 * @param select
 * @DESCRIPTION
 */
function selectIngredient(select)
{
    var option = select.options[select.selectedIndex];
    var ul = select.parentNode.getElementsByTagName('ul')[0];
    var choices = ul.getElementsByTagName('input');

    var li = document.createElement('li');
    var input = document.createElement('input');
    var text = document.createTextNode(option.firstChild.data);

    for (var i = 0; i < choices.length; i++){
        if (choices[i].value == option.value){
            return;
        }
    }

    input.type = 'hidden';
    input.name = 'ingredients[]';
    input.value = option.value;

    li.appendChild(input);
    li.appendChild(text);
    li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
    ul.appendChild(li);
}


/**
 *
 * @param mantaghe_id
 *
 */
function selectState(mantaghe_id) {
    if (mantaghe_id != "-1") {
        loadData('ammaliyat', mantaghe_id);

    } else {
        $("#ammaliyat_dropdown").html("<option value='-1'>انتخاب عملیات</option>");

    }
}


/**@
 *
 * @param loadType
 * @param loadId
 */
function loadData(loadType, loadId) {
    var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
    $("#" + loadType + "_loader").show();
    $("#" + loadType + "_loader").fadeIn(400).html('لطفا صبر کنید... ');
    $.ajax({
        type: "POST",
        url: window.location.origin+"/rahiyan_noor/admin/shahidan/get_all_depend_ammaliyat",
        data: dataString,
        cache: false,
        success: function (result) {
            $("#" + loadType + "_loader").hide();
            $("#" + loadType + "_dropdown").html("<option value='-1'>انتخاب عملیات</option>");
            $("#" + loadType + "_dropdown").append(result);
        }
    });
}


/**
 *@decription ajax delete shahidan with ajax
 */
$(function () {

    $(".delete_me").click(function () {
        var shahidanId = $(this).attr("id");
        var parent = $(this).parent();
        var item = parent.closest('tr'); item.slideUp('slow', function () {
            $(this).remove();
        });
        $.ajax({
            type: "post",
            url: window.location.origin + "/rahiyan_noor/admin/shahidan/delete_shahidan_id",
            cache: false,
            data: 'shahidan_id=' + shahidanId,
            success: function (response) {
                try {
                    if (response == 'true') {
                        item.slideUp('slow', function () {
                            $(this).remove();
                        });
                    }

                } catch (e) {
                    alert('Exception while request..');
                }
            },
            error: function () {
                alert('Error while request..');
            }
        });
    })
});


/**
 * @description upload shahid pic with ajax
 */

jQuery(function () {
    var inputFile = $('input#file');
    var uploadURI = $('#form-upload').attr('action');

    $('#upload-btn').on('click', function (event) {
        var filesToUpload = inputFile[0].files;
        // make sure there is file(s) to upload
        if (filesToUpload.length > 0) {
            // provide the form data
            // that would be sent to sever through ajax
            var formData = new FormData();

            for (var i = 0; i < filesToUpload.length; i++) {
                var file = filesToUpload[i];
                formData.append("file[]", file, file.name);
            }

            // now upload the file using $.ajax
            $.ajax({
                url: uploadURI,
                type: 'post',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (uploadDetails) {
                    var img_src = $("#shahid-pic").attr('src');
                    $("#shahid-pic").attr('src',img_src + uploadDetails.file_name);
                    $("#shahid-pic").show();
                    listFilesOnServer(uploadDetails);
                },

            });
        }
    });
    //remove the meta from list and database
    $('body').on('click', '.remove-file', function () {
        var me = $(this);

        //ajax to delete meta from database
        $.ajax({
            url: uploadURI,
            type: 'post',
            data: {file_to_remove: me.attr('data-file')},
            success: function () {
                me.closest('div').remove();//remove item from list
            }
        });

    })
});


/**@
 *
 * @param uploadDetails
 * @decription by uploading meta, should insert data to database.
 *              this function generate input forms into add form to post with other
 *              form data to store in db
 */
function listFilesOnServer(uploadDetails) {

    var html = "";
        html = '<div class="uploaded-pic">';
        html+='<input class=" ' + uploadDetails.file_name + '" name="shahid-picrure" value="' + uploadDetails.file_name + '" >';
        html+='<a href="#" data-file="' + uploadDetails.file_name + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a>';
        html+='</div>';
    $('#files-list').append("").append(html);
}


