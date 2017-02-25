<?php
/**
 * Created by Sarwin
 * Date: 02/09/2017
 * Time: 09:36 AM
 *Description:
 */

?>

<div class="container-fluid">

    <!--  Title field      -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("shahidan") ;?>" class="btn btn-success btn-lg btn-block" >لیست شهیدان</a></h1>
        </div>
        <div class="col-lg-8">
            <h1><?php echo $massage; ?></h1>
        </div>
    </div>
    <!--  end title field     -->

    <!--  Start adding region     -->
    <?php echo validation_errors(); ?>


      <div class="col-md-4">
          <div class="form-group-lg">
              <img src="<?php echo base_url("../uploads/shahidan_pic/");?>" alt="shahid-pic" id="shahid-pic" width="200" height="280" style="display: none">
          </div>
          <form action="<?php echo site_url("shahidan/upload_pic") ?>" id="form-upload">
              <div class="fileinput fileinput-new " data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput"><i
                              class="glyphicon glyphicon-file fileinput-exists"></i> <span
                              class="fileinput-filename"></span></div>
                  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i
                                  class="glyphicon glyphicon-paperclip"></i> انتخاب عکس</span><span
                              class="fileinput-exists"><i
                                  class="glyphicon glyphicon-repeat"></i> تغییر</span><input type="file"
                                                                                              name="file[]"
                                                                                              id="file"></span>
                  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i
                              class="glyphicon glyphicon-remove"></i> حذف</a>
                  <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i
                              class="glyphicon glyphicon-open"></i> آپلود</a>
              </div>
          </form>
<!--          <form id="shahidan-img-form" action="--><?//= base_url('shahidan/upload_pic'); ?><!--" method="post">-->
<!--              <div class="form-inline btn-file">+ انتخاب عکس شهید-->
<!--                  <input type='file' name='shahidan_img' size='40' id="shahid-pic" />-->
<!--              </div>-->
<!--              <input type="submit" value="upload">-->
<!--          </form>-->
      </div>
    <?php echo form_open('shahidan/'.$form_type); ?>
    <div class="col-md-8">
        <div class="form-group form-inline">
            <label for="shahidan_name">نام :</label>
            <?php echo form_input(array('name' => 'shahidan_name', 'class' => 'form-control', 'id' => 'Nameshahid', 'placeholder' => 'حسن', 'value' => isset($results) ? $results['shahidan_name'] : null)); ?>

            <label for="shahidan_familly">نام خانوادگی :</label>
            <?php echo form_input(array('name' => 'shahidan_familly', 'class' => 'form-control', 'id' => 'shahidan_familly', 'placeholder' => 'باقری', 'value' => isset($results) ? $results['shahidan_familly'] : null)); ?>

            <div id="files-list"></div>

    </div>


        <div class="form-group form-inline">

            <label for="shahidan_date_of_birth"> تاریخ تولد :</label>
            <?php echo form_input(array('name' => 'shahidan_date_of_birth', 'class' => 'shahidan_form-control', 'id' => 'shahidan_date_of_birth', 'placeholder' => '1340/06/04', 'value' => isset($results) ? $results['shahidan_date_of_birth'] : null)); ?>


            <label for="shahidan_date_of_deth">تاریخ شهادت :</label>
            <?php echo form_input(array('name' => 'shahidan_date_of_deth', 'class' => 'form-control', 'id' => 'shahidan_date_of_deth', 'placeholder' => '1360/06/04', 'value' => isset($results) ? $results['shahidan_date_of_deth'] : null)); ?>


            <label for="shahidan_birth_place"> شهر تولد :</label>
            <?php echo form_input(array('name' => 'shahidan_birth_place', 'class' => 'form-control', 'id' => 'shahidan_birth_place', 'placeholder' => 'اهواز', 'value' => isset($results) ? $results['shahidan_birth_place'] : null)); ?>

        </div>

    </div>


        <ul id="selected-term-list">
            <?php if (isset($results)): ?>
                <?php foreach ($results['ammaliyat'] as $value) {
                    echo '<li onclick="this.parentNode.removeChild(this);"><input type="hidden" name="ingredients[]" value="'.$value["ammaliyat_id"].'">'.$value["ammaliyat_name"].'</li>';
                } ?>
            <?php endif; ?>
        </ul>
        <select onchange="selectState(this.options[this.selectedIndex].value)">
            <option value="-1">انتخاب منطقه</option>
            <?php foreach ($manategh as $mantaghe): ?>
                <option value="<?php echo $mantaghe['manategh_id'] ?>"><?php echo $mantaghe['manategh_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <select id="ammaliyat_dropdown" onchange="selectIngredient(this);">

        </select>
        <span id="ammaliyat_loader"></span>

        <?php echo form_textarea(array('name' => 'shahidan_will', 'class' => 'form-control', 'rows' => '6', 'placeholder' => 'وصیت نامه ', 'value' => isset($results) ? $results['shahidan_will'] : null)); ?>

        <div class="clearfix"></div>

        <?php echo form_textarea(array('name' => 'shahidan_biography', 'class' => 'form-control', 'rows' => '6', 'placeholder' => 'زندگی نامه', 'value' => isset($results) ? $results['shahidan_biography'] : null)); ?>
        <button type="submit" class="btn btn-default">Submit</button>
    <?php echo form_close(); ?>

    <!--   End adding region-->
</div>

