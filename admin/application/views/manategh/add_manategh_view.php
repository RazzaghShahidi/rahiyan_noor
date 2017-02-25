<?php
/**
 * Created by Sarwin
 * Date: 02/08/2017
 * Time: 05:42 PM
 *Description:
 */
?>

<div class="container-fluid">

    <!--   Title field  -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("manategh") ;?>" class="btn btn-success btn-lg btn-block" >لیست مناطق</a></h1>
        </div>
        <div class="col-lg-8">
            <h1 ><?php echo $massage; ?></h1>
        </div>
    </div>
    <!--  end title field  -->

    <!--  Start adding manategh  -->
        <?php echo validation_errors('<div class="error">', '</div>'); ?>

    <?php echo form_open(base_url() . 'manategh/' . $form_type); ?>

        <div class="form-group">
            <label for="Namemantaghe">نام منطقه: </label>
            <?php echo form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'Namemantaghe', 'placeholder' => 'عنوان منطقه', 'value' => isset($results) ? $results['manategh_name'] : null)); ?>
        </div>

        <?php echo form_textarea(array('name' => 'description', 'class' => 'form-control', 'rows' => '10', 'placeholder' => 'توضیحات در مورد منطقه', 'value' => isset($results) ? $results['manategh_description'] : null)); ?>
        <button type="submit" class="btn btn-default">ثبت</button>

    <?php echo form_close(); ?>
    <!-- End adding region-->

</div>