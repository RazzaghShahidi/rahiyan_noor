jQuery(function () {
    var inputFile = $('input#file');
    var uploadURI = $('#form-upload').attr('action');
    var progressBar = $('#progress-bar');

    listFilesOnServer();

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
                    $('.progress').hide();
                    displayUplodDetail(uploadDetails);
                    listFilesOnServer(uploadDetails);
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (event) {
                        if (event.lengthComputable) {
                            var percentComplete = Math.round((event.loaded / event.total) * 100);

                            $('.progress').show();
                            progressBar.css({width: percentComplete + "%"});
                            progressBar.text(percentComplete + '%');
                        }
                        ;
                    }, false);

                    return xhr;
                }
            });
        }
    });

    //remove the media from list and database
    $('body').on('click', '.remove-file', function () {
        var me = $(this);

        //ajax to delete media from database
        $.ajax({
            url: uploadURI,
            type: 'post',
            data: {file_to_remove: me.attr('data-file')},
            success: function () {
                me.closest('div').remove();//remove item from list
            }
        });

    })


    /**@
     *
     * @param uploadDetails
     * @decription by uploading media, should insert data to database.
     *              this function generate input forms into add form to post with other
     *              form data to store in db
     */
    function listFilesOnServer(uploadDetails) {
        var items = [];
        var html = "";
        $.each(uploadDetails, function (index, element) {
            html = '<div class="uploaded-file-inputs">';
            html+='<input class=" ' + element.file_name + '" name="uploaded_files[' + element.raw_name + '][server_path]" value="' + element.full_path + '" >';
            html+='<input type="hidden" name="uploaded_files[' + element.raw_name + '][size]" value="' + element.file_size + '" >';
            html+='<input type="hidden" name="uploaded_files[' + element.raw_name + '][ext]" value="' + element.file_ext + '" >';
            html+='<a href="#" data-file="' + element.file_name + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a>';
            html+='</div>';
            items.push(html);
        });
        $('#files-list').append("").append(items.join(""));
    }


    function displayUplodDetail(uploadDetails) {
        console.log(uploadDetails);
        $("#uploaded_file_detils").html("");
        $.each(uploadDetails, function (index, element) {
            var details="<div class='file_detils_wraper'><li class='uploaded_file_detils'>ذخیره شده با نام: " + element.file_name + "</li>";
            details +="<li class='uploaded_file_detils'> نوع فایل : " + element.file_type + "</li>";
            details +=" <li class='uploaded_file_detils'> سایز فایل: " + element.file_size + "</li>";
            details +="<li class='uploaded_file_detils'> محل ذخیره : " + element.full_path + "</li>";
            details +=" </div>";
            $("#uploaded_file_detils").append(details);
        });
    }

    $('body').on('change.bs.fileinput', function (e) {
        $('.progress').hide();
        progressBar.text("0%");
        progressBar.css({width: "0%"});
    });
});


//######################################################################################################################

function selectState(select_id, select_type) {
    if (select_id != "-1") {
        loadData(select_type, select_id);

    } else {
        var option = document.createElement('option');
        option.value = '-1';
        option.append("انتخاب عملیات");
        $("#ammaliyat_dropdown").html(option);

    }
}


function loadData(loadType, loadId) {
    var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
    $("#" + loadType + "_loader").show();
    $("#" + loadType + "_loader").fadeIn(400).html('لطفا صبر کنید... ');
    $.ajax({
        type: "POST",
        url: window.location.origin+"/rahiyan_noor/admin/media/get_all_depend_" + loadType,
        data: dataString,
        cache: false,
        success: function (result) {
            $("#" + loadType + "_loader").hide();

            var option = document.createElement('option');
            option.value = '-1';
            option.append("انتخاب ");

            $("#" + loadType + "_dropdown").html(option);
            $("#" + loadType + "_dropdown").append(result);
        }
    });
}


function selectIngredient(select, selected_type) {
    var option = select.options[select.selectedIndex];
    var ul = select.parentNode.getElementsByTagName('ul')[0];

    var choices = ul.getElementsByTagName('input');
    for (var i = 0; i < choices.length; i++)
        if (choices[i].value == option.value)
            return;

    var li = document.createElement('li');
    var input = document.createElement('input');
    var text = document.createTextNode(option.firstChild.data);


    input.type = 'hidden';
    input.name = 'media_terms['+option.value+']';
    input.value = selected_type;


    li.appendChild(input);
    li.appendChild(text);
    li.setAttribute('onclick', 'this.parentNode.removeChild(this);');

    ul.appendChild(li);
}

