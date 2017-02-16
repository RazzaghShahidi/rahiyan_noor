<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/05/2017
 * Time: 01:08 AM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="col-lg-12">
        <h1 class="page-header">لیست مناطق</h1>
    </div>
    <!--           end title field     -->
    <!--      Start list region     -->


    <div class="row">


        <div class="col-md-12">

            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>نام منطقه</th>
                    <th>توضیحات</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    </thead>
                    <tbody>

                    <?php foreach ($results as $manategh): ?>

                        <tr>
                            <td><?php echo $manategh->manategh_name; ?></td>
                            <td><?php echo $manategh->manategh_description; ?></td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a href="<?php echo base_url() ?>manategh/edite/<?php echo $manategh->manategh_id; ?>"
                                       class="btn btn-primary btn-xs" data-title="Edit"
                                       data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs delete_me" data-title="Delete"
                                            data-toggle="modal" id="<?php echo $manategh->manategh_id ?>"
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
                <!--                -->
                <!--                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>-->
                <!--                    <li class="active"><a href="#">1</a></li>-->
                <!--                    <li><a href="#">2</a></li>-->
                <!--                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>-->
            </div>

        </div>
    </div>


    <!--           End list region-->
</div>