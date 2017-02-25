<?php
/**
 * Created by Sarwin
 * Date: 02/08/2017
 * Time: 09:14 PM
 *Description:
 */
?>

<div class="container-fluid">

    <!--   Title field   -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("ammaliyat/add") ;?>" class="btn btn-success btn-lg btn-block" >افزودن عملیات</a></h1>
        </div>
    <div class="col-lg-8">
        <h1>لیست عملیات ها</h1>
    </div>
    </div>
    <!--    end title field  -->

    <!--  Start list amaliyat  -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th> عملیات</th>
                    <th> فرمانده</th>
                    <th> منطقه عملیات</th>
                    <th> شروع عملیات</th>
                    <th>پایان عملیات</th>
                    <th>رمز عملیات</th>
                    <th>نیروهای عمل کننده</th>
                    <th>توضیحات</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    </thead>

                    <tbody>
                       <?php foreach ($results as $ammaliyat): ?>
                            <tr>
                                <td><?php echo $ammaliyat["ammaliyat_name"]; ?></td>
                                <td><?php echo $ammaliyat["ammaliyat_commander_name"]; ?></td>
                                <td>
                                    <?php foreach ($ammaliyat["manategh"] as $manategh) {
                                        echo $manategh['manategh_name'] . ', ';
                                    } ?>
                                </td>
                                <td><?php echo $ammaliyat["ammaliyat_start_date"]; ?></td>
                                <td><?php echo $ammaliyat["ammaliyat_end_date"]; ?></td>
                                <td><?php echo $ammaliyat["ammaliyat_operation_code"]; ?></td>
                                <td><?php echo $ammaliyat["ammaliyat_Strength"]; ?></td>
                                <td><?php echo substr($ammaliyat["ammaliyat_description"],0,100);?>...</td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <a href="<?php echo base_url() ?>ammaliyat/edite/<?php echo $ammaliyat["ammaliyat_id"]; ?>"
                                            class="btn btn-primary btn-xs" data-title="Edit"
                                            data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs delete_me" data-title="Delete"
                                            data-toggle="confirm" id="<?php echo $ammaliyat["ammaliyat_id"] ?>"
                                            data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach; ?>

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
<!--  End list region -->