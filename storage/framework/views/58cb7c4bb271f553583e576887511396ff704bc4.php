<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('web/css/products-landing/newLand.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('web/css/products-landing/products-page.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($banner) && $banner != NULL): ?>
<div class="newBannerSer" <?php if($banner->banner): ?> style="background: linear-gradient(rgba(0, 57, 87, 0.88), rgba(0, 57, 87, 0.88)), url(<?php echo e(asset($banner->banner)); ?>) center/cover no-repeat;" <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="white_color fw-bold font50"><?php echo e($banner->title); ?></h2>
                <h6 class="white_color mt-2 fw-Light">Home / <?php echo e($banner->title); ?></h6>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="newBannerSer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="white_color fw-bold font50">Products</h2>
                <h6 class="white_color mt-2 fw-Light">Home / Products</h6>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<section class="featuredEquipment productsListing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="fontSize13 capital fw-SemiBold letterSpace">Medical Equipment</p>
                <h2 class="fw-bold">Browse our product catalogue</h2>
                <p class="fontSize16 mt-2">From single devices to full clinic fit-outs — sourced from world-leading manufacturers.</p>
            </div>
        </div>
        <div class="row align-items-start mt-4">
            <?php echo $__env->make('web.render._product_category_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-9">
                <div id="filter-result">
                    <?php echo $__env->make('web.render._filter_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="formBox">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 pe-lg-5 d-flex align-items-center">
                <div class="w-100">
                    <h2 class="fw-Black white_color font50">Need pricing or availability?</h2>
                    <h6 class="fw-Regular white_color mt-3">Tell us what you need. A specialist will call you back within <b>1 business hour</b> with the best UAE pricing and availability.</h6>
                    <ul>
                        <?php if(isset($siteInformation) && $siteInformation->phone_number): ?>
                        <li>
                            <a href="tel:<?php echo e($siteInformation->phone_number); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>
                                <?php echo e($siteInformation->phone_number); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(isset($siteInformation) && $siteInformation->email_id): ?>
                        <li>
                            <a href="mailto:<?php echo e($siteInformation->email_id); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2" y="4" width="20" height="16" rx="2"></rect></svg>
                                <?php echo e($siteInformation->email_id); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url('contact-us')); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                Dubai · Abu Dhabi · Sharjah · UAE-wide
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 ms-auto mt-lg-0 mt-5">
                <div class="formCard">
                    <div class="hgBox">
                        <div class="box"></div>
                        <p>Reply within 1 hour</p>
                    </div>
                    <div class="w-100">
                        <div class="form-group mt-4">
                            <p>No obligations. UAE-wide delivery and installation.</p>
                        </div>
                        <a href="<?php echo e(url('request-quote')); ?>" class="w-100 primaryBtn secondaryBtn d-inline-block text-center">Request my quote →</a>
                        <p class="text-center fontSize13 mt-3">Your details are kept confidential.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/products.blade.php ENDPATH**/ ?>