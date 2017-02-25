<?php
/**
 * Created by Sarwin
 * Date: 02/09/2017
 * Time: 09:36 AM
 *Description:
 */
?>
<div class="container-fluid">

    <!--   Title field  -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("shahidan/add") ;?>" class="btn btn-success btn-lg btn-block" >افزودن شهید</a></h1>
        </div>
        <div class="col-lg-8">
            <h1>لیست شهدای ثبت شده</h1>
        </div>
    </div>
    <!-- end title field   -->

    <!-- Start list shahid   -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                        <th> نام</th>
                        <th> نام خانوادگی</th>
                        <th>تاریخ تولد</th>
                        <th>تاریخ شهادت</th>
                        <th> شهر تولد</th>
                        <th>عملیات ها</th>
                        <th>زندگی نامه</th>
                        <th> وصیت نامه</th>
                        <th>تصویر</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </thead>

                    <tbody>
                        <?php foreach ($results as $shahid): ?>
                            <tr>
                                <td><?php echo $shahid["shahidan_name"]; ?></td>
                                <td><?php echo $shahid["shahidan_familly"]; ?></td>
                                <td><?php echo $shahid["shahidan_date_of_birth"]; ?></td>
                                <td><?php echo $shahid["shahidan_date_of_deth"]; ?></td>
                                <td><?php echo$shahid["shahidan_birth_place"]; ?></td>
                                <td><?php foreach ($shahid['ammaliyat'] as $value) {
                                        echo $value["ammaliyat_name"].', ';
                                    }?>
                                </td>
                                <td><?php echo  substr($shahid["shahidan_biography"],0 ,100); ?>...</td>
                                <td><?php echo  substr($shahid["shahidan_will"],0,100); ?>...</td>
                                <td>
                                    <?php $picurl =$shahid['shahidan_picture']?$shahid['shahidan_picture']:'default.jpg'?>
                                    <img src="<?php  echo base_url('../uploads/shahidan_pic/').$picurl; ?>"
                                         alt="تصویر شهید" class="img-rounded" width="120" height="180">
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <a href="<?php echo base_url() ?>shahidan/edite/<?php echo $shahid["shahidan_id"]; ?>"
                                           class="btn btn-primary btn-xs" data-title="Edit"
                                           data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs delete_me" data-title="Delete"
                                                data-toggle="modal" id="<?php echo $shahid["shahidan_id"] ?>"
                                                data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach;; ?>
                    </tbody>

                </table>

                <div class="clearfix"></div>

                <ul class="pagination pull-right">
                    <?php echo $links; ?>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--   End list shahidan -->
