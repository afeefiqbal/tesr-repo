<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($meta_data)?$meta_data->meta_title:''; ?> - <?php echo e(config('app.name')); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('web/images/home-images/fav-icon.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('web/css/sweetalert.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/sweetalert-overrides.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('web/css/home-style.css')); ?>" />
    <?php echo $__env->yieldPushContent('styles'); ?>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', @$siteInfo->meta_description ?? ''); ?>">
    <?php if(isset($meta_data)): ?>
    <?php echo $meta_data->other_meta_tag; ?>

    <meta name="description" content="<?php echo $meta_data->meta_description; ?>">
    <meta name="keywords" content=" <?php echo $meta_data->meta_keyword; ?>">
    <meta name="title" content=" <?php echo $meta_data->meta_title; ?>">
   
    <?php endif; ?>
        <?php if(@$extra_meta_data && @$extra_meta_data->header_tag): ?>
            <?php echo $extra_meta_data->header_tag; ?>

        <?php endif; ?>

    <?php echo $__env->make('web.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
     <?php if(@$extra_meta_data && @$extra_meta_data->body_tag): ?>
            <?php echo $extra_meta_data->body_tag; ?>

        <?php endif; ?>
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keyword', @$siteInfo->meta_keyword ?? ''); ?>">
    </head>
    <?php if(isset($siteInformation)): ?>
    
        <section class="mobile_fixed_footer">
            <ul>
                <?php if($siteInformation->email_id!=NULL): ?>
                    <li>
                        <a href="mailto:<?php echo e($siteInformation->email_id); ?>">
                            <img src="<?php echo e(asset('web/images/email_icon.png')); ?>">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($siteInformation->phone_number!=NULL): ?>
                    <li>
                        <a href="tel:<?php echo e($siteInformation->phone_number); ?>">
                            <img src="<?php echo e(asset('web/images/phone_icon.png')); ?>">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($siteInformation->whatsapp_number!=NULL): ?>
                    <li>
                        <a href="https://wa.me/<?php echo e($siteInformation->whatsapp_number); ?>">
                            <img src="<?php echo e(asset('web/images/whatsapp_icon_product_details.png')); ?>">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </section>
    <?php endif; ?>
    <footer>
        <?php if(Request::segment(1) == '/' || Request::segment(1) == 'about-us'): ?>
            <?php if($brands->isNotEmpty()): ?>
                <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-10" >
                        <div class="swiper company-logo">
                          <div class="swiper-wrapper">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide" style="width: 185.5px;">
                                  <img src="<?php echo e(asset($brand->image)); ?>" class="swiper-img" <?php echo $brand->image_attribute; ?>>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          <!-- Add Pagination -->
                          <!--<div class="swiper-pagination"></div>-->
                       </div>
                      </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
      <div class="container">
        <div class="footer-section row">
            <div class="col-md-2">
            <a href="<?php echo e(url('/')); ?>">
              <img class="logo" src="<?php echo e(asset('web/images/home-images/Footer Logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>" />
            </a>
            <!--<?php if(isset($siteInformation) && $siteInformation->footer_text): ?>-->
            <!--    <?php echo $siteInformation->footer_text; ?>-->
            <!--<?php endif; ?>-->
            
          </div>
            <div class="col-md-2">
            <div class="quick-details">
              <h6>Quick Links</h6>
              <div class="footer-bottom-links">
              <ul>
                <li>
                  <a class="<?php echo e((Request::segment(1)=='/')?'active':''); ?>" href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li>
                  <a class="<?php echo e((Request::segment(1)=='about-us')?'active':''); ?>" href="<?php echo e(url('about-us')); ?>">About us</a>
                </li>
                <li>
                  <a class="<?php echo e((Request::segment(1)=='products')?'active':''); ?>" href="<?php echo e(url('products')); ?>">Products</a>
                </li>
                <li>
                  <a  class="<?php echo e((Request::segment(1)=='blogs')?'active':''); ?>" href="<?php echo e(url('blogs')); ?>">Blog</a>
                </li>
                <li>
                  <a class="<?php echo e((Request::segment(1)=='contact-us')?'active':''); ?>" href="<?php echo e(url('contact-us')); ?>">contact us</a>
                </li>
              </ul>
            </div>
            </div>
          </div>
          <div class="col-md-4">
                <div class="quick-details">
                    <h6>Our Services</h6>
                <div class="footer-bottom-links">
              <ul>
                
                    <li>
                        <a href="javascript:void(0)">Medical Equipment</a>
                    </li>    
                    <li>
                        <a href="javascript:void(0)">Homecare Equipment</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Dental Equipment</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Laboratory Equipment</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Respiratory Care products</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Examination & Diagnostics</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Physiotherapy Equipments</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Nursing Supplies & Equipments</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">PPM & AMC</a>
                    </li>
                
              </ul>
              </div>
              </div>
            </div>
          <div class="col-md-3">
            <div class="contact-details">
              <h6>Contact Us</h6>
              <!--<p>-->
              <!--  <img src="<?php echo e(asset('web/images/location.png')); ?>" alt="<?php echo e(config('app.name')); ?>">-->
              <!--  <?php if($siteInformation->address!=NULL): ?>-->
              <!--      <?php echo $siteInformation->address; ?>-->
              <!--  <?php endif; ?>-->
             
              <!--<?php if(isset($siteinformation->email_id) && $siteinformation->email_id!=NULL): ?>-->
              <!--    <a href="mailto:<?php echo e($siteinformation->email_id); ?>" class="contact-links">-->
              <!--      <img src="<?php echo e(asset('web/images/mail.png')); ?>" alt="<?php echo e(config('app.name')); ?>">-->
              <!--      <?php echo e($siteinformation->email_id); ?>-->
              <!--    </a>-->
              <!--<?php endif; ?>-->
              <!--<?php if(isset($siteinformation->phone_number) && $siteinformation->phone_number!=NULL): ?>-->
              <!--    <a href="tel:<?php echo e($siteinformation->phone_number); ?>" class="contact-links pb-0 ">-->
              <!--      <img src="<?php echo e(asset('web/images/phone.png')); ?>" alt="<?php echo e(config('app.name')); ?>">-->
              <!--      <?php echo e($siteinformation->phone_number); ?>-->
              <!--    </a>-->
              <!--<?php endif; ?>-->
              <!--<?php if(isset($siteinformation->phone_number) && $siteinformation->alternate_phone_number!=NULL): ?>-->
              <!--    <a href="tel:<?php echo e($siteinformation->alternate_phone_number); ?>" class="contact-links" style="padding-left: 34px;  ">-->
              <!--     <?php echo e($siteinformation->alternate_phone_number); ?>-->
              <!--    </a>-->
              <!--<?php endif; ?>-->
              <!-- </p>-->
              
              
              <div style="    display: flex
;
    align-items: start;
    gap: 10px;">
              <img src="<?php echo e(asset('web/images/home-images/location.png')); ?>" alt="<?php echo e(config('app.name')); ?> " style="width:23px">
                <?php if($siteInformation->address!=NULL): ?>
                    <?php echo $siteInformation->address; ?>

                <?php endif; ?>
</div >

                <?php if(isset($siteInformation->email_id) && $siteInformation->email_id!=NULL): ?>
                  <a href="mailto:<?php echo e($siteInformation->email_id); ?>" class="contact-links">
                    <img src="<?php echo e(asset('web/images/home-images/mail.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
                    <?php echo e($siteInformation->email_id); ?>

                  </a>
                <?php endif; ?>
                <?php if(isset($siteInformation->phone_number) && $siteInformation->phone_number!=NULL): ?>
                  <a href="tel:<?php echo e($siteInformation->phone_number); ?>" class="contact-links pb-0 ">
                    <img src="<?php echo e(asset('web/images/home-images/contact_icon_01.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
                    <?php echo e($siteInformation->phone_number); ?>

                  </a>
                <?php endif; ?>
                <?php if(isset($siteInformation->phone_number) && $siteInformation->alternate_phone_number!=NULL): ?>
                    <a href="tel:<?php echo e($siteInformation->alternate_phone_number); ?>" class="contact-links">
                      <img src="<?php echo e(asset('web/images/home-images/contact_icon_01.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
                      <?php echo e($siteInformation->alternate_phone_number); ?>

                    </a>
                <?php endif; ?>

            </div>
          </div>
        </div>

      </div>
      <div class="copy-right">
         
       <span>© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?> All rights reserved. Design and Developed by <a href="https://www.hexacodesmarketing.com/"> Hexacodes</a></span> 
        <div class="social-icons">
               <?php if(isset($siteInformation) && $siteInformation->facebook_url): ?>
<a href="<?php echo e($siteInformation->facebook_url); ?>" target="_blank">
    <svg xmlns="http://www.w3.org/2000/svg"
         width="24" height="24"
         viewBox="0 0 512 512"
         fill="white">
      <path d="M256 42.667c-111.476-.174-204.29 85.51-213.011 196.644c-8.72 111.134 69.593 210.245 179.731 227.462V317.44h-54.187V256h54.187v-46.933a75.094 75.094 0 0 1 80.427-82.987a335.5 335.5 0 0 1 47.786 4.053v52.48h-26.88a30.934 30.934 0 0 0-34.773 33.28V256h59.307l-9.6 61.653H289.28v149.334c110.805-16.546 189.934-115.984 181.174-227.675S368.03 41.735 256 42.667"/>
    </svg>
</a>
<?php endif; ?>

                <?php if(isset($siteInformation) && $siteInformation->instagram_url): ?>
                    <a href="<?php echo e($siteInformation->instagram_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M2.5 12c0-4.478 0-6.718 1.391-8.109S7.521 2.5 12 2.5c4.478 0 6.718 0 8.109 1.391S21.5 7.521 21.5 12c0 4.478 0 6.718-1.391 8.109S16.479 21.5 12 21.5c-4.478 0-6.718 0-8.109-1.391S2.5 16.479 2.5 12"
                            />
                            <path d="M16.5 12a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m1.008-5.5h-.01" />
                          </g>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if(isset($siteInformation) && $siteInformation->linkedin_url): ?>
                <a href="<?php echo e($siteInformation->linkedin_url); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"  fill="white">>
                      <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z" />
                    </svg>
                </a>
                <?php endif; ?>
            </div>
      </div>
    </footer>
      <?php if(@$extra_meta_data && @$extra_meta_data->footer_tag): ?>
            <?php echo $extra_meta_data->footer_tag; ?>

        <?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/js/sweetalert.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/js/sweetalert-init.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/jquery.fancybox.js?v=2.1.4')); ?>"></script>
    <script src="<?php echo e(asset('web/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/home-script.js')); ?>"></script>
    <script type="text/javascript">
        var base_url = "<?php echo e(url('/')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
    </script>
    <?php echo $__env->yieldPushContent('script'); ?>
  </body>
</html>
        <?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/layouts/main.blade.php ENDPATH**/ ?>