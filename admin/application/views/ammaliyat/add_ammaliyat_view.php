<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 09:15 PM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $massage; ?> </h1>
    </div>
    <!--           end title field     -->
    <!--      Start adding region     -->


    <?php echo validation_errors(); ?>

    <?php echo form_open('ammaliyat/add_ammaliyat'); ?>

    <div class="form-group">
        <label for="Namemantaghe">نام عملیات :</label>
        <?php echo form_input(array('name' => 'ammaliyat_name', 'class' => 'form-control', 'id' => 'ammaliyat_name', 'placeholder' => 'بیت المقدس')); ?>
    </div>

    <div class="form-group">
        <label for="Namemantaghe">نام فرمانده عملیات :</label>
        <?php echo form_input(array('name' => 'ammaliyat_commander_name', 'class' => 'form-control', 'id' => 'ammaliyat_commandor_name', 'placeholder' => 'علی باقری')); ?>
    </div>

    <div class="form-group form-inline">

        <label for="ammaliyat_start_date"> تاریخ عملیات :</label>
        <?php echo form_input(array('name' => 'ammaliyat_start_date', 'class' => 'form-control', 'id' => 'ammaliyat_start_date', 'placeholder' => '1340/06/04')); ?>


        <label for="ammaliyat_end_date">تاریخ پایان :</label>
        <?php echo form_input(array('name' => 'ammaliyat_end_date', 'class' => 'form-control', 'id' => 'ammaliyat_end_date', 'placeholder' => '1360/06/04')); ?>

    </div>

    <div class="form-group form-inline">
        <label for="ammaliyat_operation_code"> رمز عملیات :</label>
        <?php echo form_input(array('name' => 'ammaliyat_operation_code', 'class' => 'form-control', 'id' => 'ammaliyat_operation_code', 'placeholder' => 'رمز عملیات')); ?>

        <label for="ammaliyat_Strength"> نیروهای عمل کننده :</label>
        <?php echo form_input(array('name' => 'ammaliyat_Strength', 'class' => 'form-control', 'id' => 'ammaliyat_Strength', 'placeholder' => '800 نفر سپاه')); ?>
    </div>

    <div class="form-group">
        <ul>

        </ul>
        <select onchange="selectIngredient(this);">
            <option value="-1">انتخاب منطقه</option>
            <?php foreach ($manategh as $mantaghe): ?>
                <option value="<?php echo $mantaghe['manategh_id'] ?>"><?php echo $mantaghe['manategh_name'] ?></option>
            <?php endforeach; ?>
        </select>

    </div>

    <?php echo form_textarea(array('name' => 'ammaliyat_description', 'class' => 'form-control', 'rows' => '10', 'placeholder' => 'توضیحات در مورد عملیات')); ?>

    <button type="submit" class="btn btn-default">Submit</button>

    <?php echo form_close(); ?>
    <!--           End adding region-->
</div>
