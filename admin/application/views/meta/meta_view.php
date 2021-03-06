<?php
/**
 * Created by Sarwin
 * Date: 02/12/2017
 * Time: 12:17 AM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="row page-header">
        <div class="col-md-4">
            <h1><a href="<?php echo base_url("meta/add") ;?>" class="btn btn-success btn-lg btn-block" >افزودن فایل</a></h1>
        </div>
        <div class="col-lg-8">
            <h1>لیست فایل</h1>
        </div>
    </div>
    <!--           end title field     -->
    <!--      Start list meta     -->


    <!--                <div class="row">-->


    <?php foreach ($results as $meta): ?>
        <div class="col-md-1"></div>
        <div class="col-md-5 no-padding lib-item" data-category="ui">
            <div class="lib-panel">
                <div class="row box-shadow">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <div class="lib-row lib-header">
                            <?php echo $meta['meta_title']; ?>
                            <div class="lib-header-seperator"></div>
                        </div>

                        <div class="lib-row lib-desc">
                            <ul>
                                <li>نام فایل: <?php echo $meta['meta_file_name'] . $meta['meta_file_ext']; ?></li>
                                <li> سایز فایل:<?php echo $meta['meta_size']; ?>K </li>
                                <li>محل ذخیره: <?php echo $meta['meta_path']; ?></li>
                            </ul>
                        </div>
                        <hr/>
                        <div class="lib-row lib-desc">
                            <p><?php echo substr($meta['meta_detail'], 0, 100); ?>...</p>
                        </div>
                        <hr/>
                        <div class="lib-row lib-tags">
                            <div class="col-md-2">
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a href="<?php echo base_url() ?>meta/edite/<?php echo $meta["meta_id"]; ?>"
                                       class="btn btn-primary btn-xs" data-title="Edit"
                                       data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                </p>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs delete_me" data-title="Delete"
                                            data-toggle="modal" id="<?php echo $meta["meta_id"] ?>"
                                            data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </p>
                            </div>
                            <div class="col-md-10">
                                <ul>
                                    <?php foreach ($meta['term'] as $term_value) { ?>
                                        <li><?php echo $term_value['term_name']; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <!--                </div>-->

</div>

<ul class="pagination pull-right">
    <?php echo $links; ?>
</ul>