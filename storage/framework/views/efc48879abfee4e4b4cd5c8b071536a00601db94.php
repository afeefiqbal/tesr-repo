<?php
    $productUrl = url('product/' . $product->short_url);
    $message = 'Hi there, You have an enquiry, Product Name : ' . $product->title . ', Product Url : ' . $productUrl;
    $brandLabel = optional($product->brandData)->title ?? optional($product->category)->title ?? 'Medical Equipment';
?>
<div class="col-lg-<?php echo e($column); ?> col-sm-6 mt-4">
    <div class="equipmentCard">
        <div class="imgBox">
            <?php if($product->thumbnail_image != NULL): ?>
                <img src="<?php echo e(asset($product->thumbnail_image)); ?>" class="img-fluid" alt="<?php echo e($product->title); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('web/images/product_img_01.png')); ?>" class="img-fluid" alt="<?php echo e($product->title); ?>">
            <?php endif; ?>
        </div>
        <div class="detailsBox">
            <h6><?php echo e($brandLabel); ?></h6>
            <h5><?php echo e($product->title); ?></h5>
            <?php if($product->home_description): ?>
                <p><?php echo limit_text(strip_tags($product->home_description), 90); ?></p>
            <?php elseif($product->description): ?>
                <p><?php echo limit_text(strip_tags($product->description), 90); ?></p>
            <?php endif; ?>
            <div class="cardActions">
                <a href="https://api.whatsapp.com/send/?phone=<?php echo e($siteInformation->whatsapp_number); ?>&text=<?php echo e(urlencode($message)); ?>&type=phone_number&app_absent=0" target="_blank" class="btnWhatsApp">Get price</a>
                <a href="<?php echo e($productUrl); ?>" class="btnDetails">View details →</a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/render/_single_product.blade.php ENDPATH**/ ?>