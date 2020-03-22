<?php

?>
<div class="banner-bottom">
    
        <div class="col-md-7 wthree_banner_bottom_right">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home">Home</a>
                    </li>
                    <li role="presentation">
                        <a href="#audio" role="tab" id="audio-tab" data-toggle="tab" aria-controls="Industry">Industry</a>
                    </li>
                    <li role="presentation">
                        <a href="#video" role="tab" id="video-tab" data-toggle="tab" aria-controls="Beauty">Beauty</a>
                    </li>
                    <li role="presentation">
                        <a href="#tv" role="tab" id="tv-tab" data-toggle="tab" aria-controls="Electrical">Electrical</a>
                    </li>
                    <li role="presentation">
                        <a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab" aria-controls="Medical">Medical</a>
                    </li>
                    <li role="presentation">
                        <a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab" aria-controls="Transport">Transport</a>
                    </li>
                    <li role="presentation">
                        <a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab" aria-controls="Technological">Technological</a>
                    </li>
                    <li role="presentation">
                        <a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab" aria-controls="Educational">Educational</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="agile_ecommerce_tabs">
                            <?php $allPro = $productObject->showMobileProduct(); if ($allPro): ?>
                                <?php while ($mobile = $allPro->fetch_assoc()): ?>
                                <div class="col-md-4 agile_ecommerce_tab_left">
                                    <div class="hs-wrapper">
                                        <?php for ($i = 1; $i <= 8; ++$i): ?>
                                            <img src="admin/<?php echo $mobile['image'];?>" alt=" " class="img-responsive" />
                                        <?php endfor; ?>
                                    </div>
                                    <div style="margin-top: 10px; margin-bottom: 10px">
                                        <h5><a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" ><?php echo $mobile['proname'];?></a></h5>
                                        <h3> $ <?php echo $mobile['price'];?></h3>
                                    </div>
                                    <div class="" style="margin-top: 10px">
                                        <a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" class="btn btn-info">Details</a>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="audio" aria-labelledby="audio-tab">
                        <div class="agile_ecommerce_tabs">
                            <div class="agile_ecommerce_tabs">
                                <?php $allPro = $productObject->showAudioProduct(); if ($allPro): ?>
                                    <?php while ($mobile = $allPro->fetch_assoc()): ?>
                                        <div class="col-md-4 agile_ecommerce_tab_left">
                                            <div class="hs-wrapper">
                                                <?php for ($i = 1; $i <= 8; ++$i): ?>
                                                    <img src="admin/<?php echo $mobile['image'];?>" alt=" " class="img-responsive" />
                                                <?php endfor; ?>
                                            </div>
                                            <div style="margin-top: 10px; margin-bottom: 10px">
                                                <h5><a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" ><?php echo $mobile['proname'];?></a></h5>
                                                <h3> $ <?php echo $mobile['price'];?></h3>
                                            </div>
                                            <div class="" style="margin-top: 10px">
                                                <a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" class="btn btn-info">Details</a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="video" aria-labelledby="video-tab">
                        <div class="agile_ecommerce_tabs">
                            <?php $allPro = $productObject->showLaptopProduct(); if ($allPro): ?>
                                <?php while ($mobile = $allPro->fetch_assoc()): ?>
                                    <div class="col-md-4 agile_ecommerce_tab_left">
                                        <div class="hs-wrapper">
                                            <?php for ($i = 1; $i <= 8; ++$i): ?>
                                                <img src="admin/<?php echo $mobile['image'];?>" alt=" " class="img-responsive" />
                                            <?php endfor; ?>
                                        </div>
                                        <div style="margin-top: 10px; margin-bottom: 10px">
                                            <h5><a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" ><?php echo $mobile['proname'];?></a></h5>
                                            <h3> $ <?php echo $mobile['price'];?></h3>
                                        </div>
                                        <div class="" style="margin-top: 10px">
                                            <a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" class="btn btn-info">Details</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tv" aria-labelledby="tv-tab">
                        <div class="agile_ecommerce_tabs">
                            <?php $allPro = $productObject->showHouseholdProduct(); if ($allPro): ?>
                                <?php while ($mobile = $allPro->fetch_assoc()): ?>
                                    <div class="col-md-4 agile_ecommerce_tab_left">
                                        <div class="hs-wrapper">
                                            <?php for ($i = 1; $i <= 8; ++$i): ?>
                                                <img src="admin/<?php echo $mobile['image'];?>" alt=" " class="img-responsive" />
                                            <?php endfor; ?>
                                        </div>
                                        <div style="margin-top: 10px; margin-bottom: 10px">
                                            <h5><a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" ><?php echo $mobile['proname'];?></a></h5>
                                            <h3> $ <?php echo $mobile['price'];?></h3>
                                        </div>
                                        <div class="" style="margin-top: 10px">
                                            <a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" class="btn btn-info">Details</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="kitchen" aria-labelledby="kitchen-tab">
                        <div class="agile_ecommerce_tabs">
                            <?php $allPro = $productObject->showKitchenProduct(); if ($allPro): ?>
                                <?php while ($mobile = $allPro->fetch_assoc()): ?>
                                    <div class="col-md-4 agile_ecommerce_tab_left">
                                        <div class="hs-wrapper">
                                            <?php for ($i = 1; $i <= 8; ++$i): ?>
                                                <img src="admin/<?php echo $mobile['image'];?>" alt=" " class="img-responsive" />
                                            <?php endfor; ?>
                                        </div>
                                        <div style="margin-top: 10px; margin-bottom: 10px">
                                            <h5><a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" ><?php echo $mobile['proname'];?></a></h5>
                                            <h3> $ <?php echo $mobile['price'];?></h3>
                                        </div>
                                        <div class="" style="margin-top: 10px">
                                            <a href="single.php?proid=<?php echo $mobile['proid'];?>" target="_blank" class="btn btn-info">Details</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>