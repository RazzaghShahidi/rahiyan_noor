<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 05:42 PM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $massage;?></h1>
    </div>
    <!--           end title field     -->
    <!--      Start adding region     -->
    <?php echo validation_errors(); ?>
    <?php echo form_open('manategh/add_mantaghe'); ?>
    <div class="form-group">
        <label for="Namemantaghe">نام منطقه: </label>
        <?php echo form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'Namemantaghe', 'placeholder' => 'فکه')); ?>
    </div>

    <?php echo form_textarea(array('name' => 'description', 'class' => 'form-control', 'rows' => '10', 'placeholder' => 'توضیحات در مورد منطقه')); ?>
    <button type="submit" class="btn btn-default">ثبت</button>
    <?php echo form_close(); ?>
    <!--           End adding region-->
</div>