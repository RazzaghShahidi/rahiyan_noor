<?php
/**
 * Created by Sarwin
 * Date: 02/10/2017
 * Time: 08:54 PM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("meta") ;?>" class="btn btn-success btn-lg btn-block" >لیست فایل ها</a></h1>
        </div>
        <div class="col-lg-8">
            <h1 ><?php echo $massage; ?></h1>
        </div>
    </div>
    <!--           end title field     -->
    <!--      Start adding region     -->

    <?php echo validation_errors(); ?>
    <div class="form-group">
        <label for="exampleInputFile">فایل را انتخاب کنید :</label>
        <form action="<?php echo site_url("meta/upload") ?>" id="form-upload">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"><i
                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                            class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i
                                class="glyphicon glyphicon-paperclip"></i> انتخاب فایل</span><span
                            class="fileinput-exists"><i
                                class="glyphicon glyphicon-repeat"></i> تغییر</span><input type="file"
                                                                                            name="file[]"
                                                                                            multiple
                                                                                            id="file"></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i
                            class="glyphicon glyphicon-remove"></i> حذف</a>
                <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i
                            class="glyphicon glyphicon-open"></i> آپلود</a>
            </div>
        </form>
        <ul id="uploaded_file_detils"></ul>
        <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
        <div class="progress" style="display:none;">
            <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped "
                 role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                 style="width: 30%;">
                0%
                <ul class="list-group">
                    <ul>

            </div>
        </div>
    </div>


    <?php echo form_open('meta/add', array('id' => 'meta_form')); ?>
    <div class="form-group form-inline">
        <label for="meta_title">عنوان :</label>
        <?php echo form_input(array('name' => 'meta_title', 'class' => 'form-control', 'id' => 'meta_title', 'placeholder' => 'عنوان')); ?>
    </div>
    <div class="form-group form-inline">
        <label for="meta_title"> فایل :</label>
        <div id="files-list"></div>
    </div>


    <div id="mform"></div>
    <div class="form-group form-inline">
        <ul id="selected-term-list">

        </ul>
        <select onchange="selectState(this.options[this.selectedIndex].value, 'ammaliyat');selectIngredient(this,'manategh')">
            <option value="-1">انتخاب منطقه</option>
            <?php foreach ($manategh as $mantaghe): ?>
                <option value="<?php echo $mantaghe['manategh_id'] ?>"><?php echo $mantaghe['manategh_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <select id="ammaliyat_dropdown"
                onchange="selectState(this.options[this.selectedIndex].value, 'shahidan');selectIngredient(this,'ammaliyat')">
            <option>عملیات</option>
        </select>
        <span id="ammaliyat_loader"></span>
        <select id="shahidan_dropdown" onchange="selectIngredient(this,'shahidan')">
            <option>شهدا</option>
        </select>
        <span id="shahidan_loader"></span>

    </div>

    <?php echo form_textarea(array('name' => 'meta_detail', 'class' => 'form-control', 'rows' => '6', 'placeholder' => 'توضیحات فایل')); ?>
    <button type="submit" class="btn btn-default">Submit</button>
    <?php echo form_close(); ?>
    <!--           End adding region-->
</div>


