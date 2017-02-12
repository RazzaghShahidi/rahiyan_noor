<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/09/2017
 * Time: 09:36 AM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $massage; ?></h1>
    </div>
    <!--           end title field     -->
    <!--      Start adding region     -->
    <?php echo validation_errors(); ?>
    <?php echo form_open('shahidan/add_shahidan'); ?>
    <div class="form-group form-inline">
        <label for="shahidan_name">نام :</label>
        <?php echo form_input(array('name' => 'shahidan_name', 'class' => 'form-control', 'id' => 'Nameshahid', 'placeholder' => 'حسن')); ?>

        <label for="shahidan_familly">نام خانوادگی :</label>
        <?php echo form_input(array('name' => 'shahidan_familly', 'class' => 'form-control', 'id' => 'shahidan_familly', 'placeholder' => 'باقری')); ?>

    </div>
    <div class="form-group form-inline">


    </div>


    <div class="form-group form-inline">

        <label for="shahidan_date_of_birth"> تاریخ تولد :</label>
        <?php echo form_input(array('name' => 'shahidan_date_of_birth', 'class' => 'shahidan_form-control', 'id' => 'shahidan_date_of_birth', 'placeholder' => '1340/06/04')); ?>


        <label for="shahidan_date_of_deth">تاریخ شهادت :</label>
        <?php echo form_input(array('name' => 'shahidan_date_of_deth', 'class' => 'form-control', 'id' => 'shahidan_date_of_deth', 'placeholder' => '1360/06/04')); ?>


        <label for="shahidan_birth_place"> شهر تولد :</label>
        <?php echo form_input(array('name' => 'shahidan_birth_place', 'class' => 'form-control', 'id' => 'shahidan_birth_place', 'placeholder' => 'اهواز')); ?>
    </div>


    <ul>

    </ul>
    <select onchange="selectState(this.options[this.selectedIndex].value)">
        <option value="-1">انتخاب منطقه</option>
        <?php foreach ($manategh as $mantaghe): ?>
            <option value="<?php echo $mantaghe['manategh_id'] ?>"><?php echo $mantaghe['manategh_name'] ?></option>
        <?php endforeach; ?>
    </select>
    <ul>

    </ul>
    <select id="ammaliyat_dropdown" onchange="selectIngredient(this);">

    </select>
    <span id="ammaliyat_loader"></span>


    <?php echo form_textarea(array('name' => 'shahidan_will', 'class' => 'form-control', 'rows' => '6', 'placeholder' => 'وصیت نامه ')); ?>
    <div class="clearfix"></div>
    <?php echo form_textarea(array('name' => 'shahidan_biography', 'class' => 'form-control', 'rows' => '6', 'placeholder' => 'زندگی نامه')); ?>
    <button type="submit" class="btn btn-default">Submit</button>
    <?php echo form_close(); ?>
    <!--           End adding region-->
</div>
