<!--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mw_col_wrapper">-->
<!--    <a href="<?php echo e(url('blog/'.$blog->short_url)); ?>">-->
<!--        <div class="mw_col_inner_wrapper">-->
<!--            <?php if($blog->image!=NULL): ?>-->
<!--                <img src="<?php echo e(asset($blog->image)); ?>" class="mw_blog_img">-->
<!--            <?php else: ?>-->
<!--                <img src="<?php echo e(asset('web/images/blog_01.jpg')); ?>" class="mw_blog_img">-->
<!--            <?php endif; ?>-->
<!--            <div class="mw_blog_content_wrapper">-->
<!--                <ul class="blog_time_list">-->
<!--                    <li><?php echo e(date("d M Y", strtotime($blog->posted_date))); ?></li>-->
<!--                </ul>-->
<!--                <?php echo $blog->list_description; ?>-->
<!--            </div>-->
<!--        </div>-->
<!--    </a> -->
<!--</div>-->


 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
              <a href="<?php echo e(url('blog/'.$blog->short_url)); ?>" class="blog-card" style="background-color:#dddcfe">
                <div class="image">
                  <?php if($blog->image!=NULL): ?>
                      <img src="<?php echo e(asset($blog->image)); ?>" <?php echo $blog->image_attribute; ?>>
                  <?php else: ?>
                      <img src="<?php echo e(asset('web/images/home-images/blog1.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
                  <?php endif; ?>
                  <div class="date">
                    <?php echo e(date("d", strtotime($blog->posted_date))); ?>

                   <span><?php echo e(date("M", strtotime($blog->posted_date))); ?></span>

                  </div>
                </div>
                <div class="content">
                  <h5><?php echo $blog->title; ?></h5>
                  <p><?php echo limit_text($blog->list_description, 50); ?></p>
                </div>
              </a>
            </div><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/render/_single_blog.blade.php ENDPATH**/ ?>