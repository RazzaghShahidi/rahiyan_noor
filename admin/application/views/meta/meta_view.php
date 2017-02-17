<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/12/2017
 * Time: 12:17 AM
 *Description:
 */
?>
<div class="container-fluid">
    <!--         Title field      -->
    <div class="col-lg-12">
        <h1 class="page-header">لیست مدیا</h1>
    </div>
    <!--           end title field     -->
    <!--      Start list media     -->


    <!--                <div class="row">-->


    <?php foreach ($results as $media): ?>
        <div class="col-md-1"></div>
        <div class="col-md-5 no-padding lib-item" data-category="ui">
            <div class="lib-panel">
                <div class="row box-shadow">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <div class="lib-row lib-header">
                            <?php echo $media['media_title']; ?>
                            <div class="lib-header-seperator"></div>
                        </div>

                        <div class="lib-row lib-desc">
                            <ul>
                                <li>نام مدیا: <?php echo $media['media_file_name'] . $media['media_file_ext']; ?></li>
                                <li>سایز مدیا: <?php echo $media['media_size']; ?> </li>
                                <li>محل ذخیره: <?php echo $media['media_path']; ?></li>
                            </ul>
                        </div>
                        <hr/>
                        <div class="lib-row lib-desc">
                            <p><?php echo substr($media['media_detail'], 0, 100); ?>...</p>
                        </div>
                        <hr/>
                        <div class="lib-row lib-tags">
                            <ul>
                                <?php foreach ($media['term'] as $term_value) { ?>
                                    <li><?php echo $term_value['term_name']; ?></li>
                                <?php } ?>
                            </ul>
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