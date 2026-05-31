<?php $__env->startSection('content'); ?>
<?php if($homeBanners->isNotEmpty()): ?>
  <section class="hero">
    <div class="swiper hero-swiper">
      <div class="swiper-wrapper">
        <?php $__currentLoopData = $homeBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide">
            <div class="hero-main">
              <picture>
                <?php if($hBanner->image): ?>
                  <source media="(max-width: 768px)" srcset="<?php echo e(asset($hBanner->image)); ?>">
                  <img src="<?php echo e(asset($hBanner->image)); ?>" <?php echo $hBanner->image_attribute; ?>>
                <?php endif; ?>
              </picture>
              <div class="container">
                <div class="content">
                  <?php if($hBanner->title): ?>
                    <h1>
                      <?php echo $hBanner->title; ?>

                    </h1>
                  <?php endif; ?>
                  <?php if($hBanner->description): ?>
                    <?php echo $hBanner->description; ?>

                  <?php endif; ?>
                  <div class="btns">
                   <?php if($hBanner->button_url): ?>
  <a href="<?php echo e($hBanner->button_url); ?>" class="btn btn-default">
    <?php echo $hBanner->button_text; ?>

  </a>
<?php endif; ?>

<?php if($hBanner->alternate_button_url): ?>
  <a href="<?php echo e($hBanner->alternate_button_url); ?>" class="btn btn-border clickable-element">
    <?php echo $hBanner->alternate_button_text; ?>

  </a>
<?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="container">
        <div class="dots">
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php if($about): ?>
  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <?php if($about->short_title): ?>
              <p class="sub-heading"><?php echo $about->short_title; ?></p>
            <?php endif; ?>
            <?php if($about->title): ?>
              <h2>
                <?php echo $about->title; ?>

              </h2>
            <?php endif; ?>
            <?php if($about->home_description): ?>
              <?php echo $about->home_description; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <figure>
            <?php if($about->home_image): ?>
              <img class="w-100" src="<?php echo e(asset('web/images/images/img2.png')); ?>" <?php echo $about->home_image_attribute; ?> />
            <?php else: ?>
              <img class="w-100" src="<?php echo e(asset('web/images/images/img2.png')); ?>" alt="<?php echo e(config('app.name')); ?>" />
            <?php endif; ?>
          </figure>
        </div>
        <?php if($keyFeatures->isNotEmpty()): ?>
          <div class="col-md-6">
            <div class="content">
              <?php $__currentLoopData = $keyFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="counter-section">
                  <span>
                    <span class="count"><?php echo e($key->count); ?></span>
                    +</span
                  >
                  <p class="mb-0"><?php echo $key->title; ?></p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endif; ?>  
      </div>
    </div>
  </section>
<?php endif; ?>  
<?php if($featuredProducts->isNotEmpty()): ?>  
<section class="featured-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <?php if(headingContent('Fproduct')): ?>
            <p class="sub-heading">
              <?php echo headingContent('Fproduct')->short_title; ?>

            </p>
            <?php if(headingContent('Fproduct')->title): ?>
              <h2>
                <?php echo headingContent('Fproduct')->title; ?>

              </h2>
            <?php endif; ?>
            <?php if(headingContent('Fproduct')->description): ?>
              <?php echo headingContent('Fproduct')->description; ?>

            <?php endif; ?>
          <?php endif; ?>  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="swiper featured-products-list">
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php 
                  $productUrl = url('product/'.$product->short_url);
                  $message = 'Hi there, You have an enquiry, Product Name : '.$product->title.', Product Url : '.$productUrl;
              ?>
              <div class="swiper-slide">
                <div class="product-card">
                  <?php if($product->thumbnail_image): ?>
                    <img src="<?php echo e(asset($product->thumbnail_image)); ?>" <?php echo $product->thumbnail_image_attribute; ?>/>
                  <?php else: ?>
                    <img src="<?php echo e(asset('web/images/home-images/product1 (1).png')); ?>" alt="<?php echo e($featured->short_url); ?>"/>
                  <?php endif; ?>
                  <div class="content">
                    <h5><?php echo e($product->title); ?></h5>
                    <!--<?php if($product->description): ?>-->
                    <!--  <?php echo $product->home_description; ?>-->
                    <!--<?php endif; ?>-->
                    <div class="btns">
                      <a href="#" class="btn btn-default clickable-element cursor-pointer whatsapp" data-href="https://api.whatsapp.com/send/?phone=<?php echo e($siteInformation->whatsapp_number); ?>&text=<?php echo e(nl2br($message)); ?>&type=phone_number&app_absent=0" data-target="_blank">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="20"
                          height="20"
                          viewBox="0 0 24 24">
                          <path
                            d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"
                          />
                        </svg>
                        Buy now
                      </a>
                      <a href="<?php echo e(url('product/'.$product->short_url)); ?>" class="btn btn-border">Details</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="controls">
            <div class="swiper-button-prev"></div>
            <a href="<?php echo e(url('products')); ?>" class="btn btn-border">View all Products</a>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="why-choose-us" style="background-image: url(<?php echo e(asset('web/images/home-images/Why\ choose\ us.png')); ?>);">
  <div class="container">
    <div class="grid-col">
     <div class="column">
      <img class="first-bg" src="<?php echo e(asset('web/images/home-images/why-choose-img.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
       <?php if(headingContent('Whychooseus')): ?>
         <div class="heading container">        
           <?php if(headingContent('Whychooseus')->short_title): ?>
             <p class="sub-heading">
              <?php echo headingContent('Whychooseus')->short_title; ?>

             </p>
           <?php endif; ?>
           <?php if(headingContent('Whychooseus')->title): ?>
             <h2>
               <?php echo headingContent('Whychooseus')->title; ?>

             </h2>
           <?php endif; ?>
           <?php if(headingContent('Whychooseus')->description): ?>
              <?php echo headingContent('Whychooseus')->description; ?>

           <?php endif; ?>
         </div>
       <?php endif; ?>
     </div>
     <?php if($whyChooseUs->isNotEmpty()): ?>
       <div class="column">
        <img class="shadow-bg" src="<?php echo e(asset('web/images/home-images/choose-us-shadow.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
         <div class="accordion">
           <?php $__currentLoopData = $whyChooseUs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $why): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="accordion-item">
              <span>0<?php echo e($loop->iteration); ?></span>
               <div class="accordion-item-header">
                <?php echo e($why->title); ?>

               </div>
               <?php if($why->description): ?>
                 <!-- /.accordion-item-header -->
                 <div class="accordion-item-body">
                   <div class="accordion-item-body-content">
                     <?php echo $why->description; ?>

                   </div>
                 </div>
                 <!-- /.accordion-item-body -->
              <?php endif; ?>   
             </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
         </div>
       </div>
     <?php endif; ?>
    </div>
  </div>
</section>
<?php if($blogs->isNotEmpty()): ?>
    <section class="blogs">
      <img src="<?php echo e(asset('web/images/home-images/img4.png')); ?>" class="bg-img" alt="<?php echo e(config('app.name')); ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <?php if(headingContent('Blog')): ?>
               <div class="heading">        
                 <?php if(headingContent('Blog')->short_title): ?>
                   <p class="sub-heading">
                    <?php echo headingContent('Blog')->short_title; ?>

                   </p>
                 <?php endif; ?>
                 <?php if(headingContent('Blog')->title): ?>
                   <h2>
                     <?php echo headingContent('Blog')->title; ?>

                   </h2>
                 <?php endif; ?>
                 <?php if(headingContent('Blog')->description): ?>
                    <?php echo headingContent('Blog')->description; ?>

                 <?php endif; ?>
               </div>
              <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <a href="<?php echo e(url('blog/'.$blog->short_url)); ?>" class="blog-card">
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
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12">
            <button class="btn blog-details" data-href="<?php echo e(url('blogs')); ?>">View all Blogs</button>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/home.blade.php ENDPATH**/ ?>