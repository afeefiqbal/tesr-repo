<li class="nav-item">
    <a href="<?php echo e(url(sitePrefix().'administration')); ?>" class="nav-link <?php echo e((Request::segment(2)=='administration')?'active':''); ?>">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
            Administration             
        </p>
    </a>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='home')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th-list"></i>
    <p>
      Home
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='home')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'home/slider')); ?>" class="nav-link <?php echo e((Request::segment(3)=='slider')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Slider</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'home/why-choose-us')); ?>" class="nav-link <?php echo e((Request::segment(3)=='why-choose-us')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Why Choose Us</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'home/testimonial')); ?>" class="nav-link <?php echo e((Request::segment(3)=='testimonial')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Testimonial</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'home/brand')); ?>" class="nav-link <?php echo e((Request::segment(3)=='brand' && Request::segment(2)=='home')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Brands</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='about-us')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas icon fas fa-info"></i>
    <p>
      About-us
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='about-us')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'about-us')); ?>" class="nav-link <?php echo e((Request::segment(3)=='')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>About-us </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'about-us/key-feature')); ?>" class="nav-link <?php echo e((Request::segment(3)=='key-feature')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Key-features </p>
      </a>
    </li> 
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(3)=='product'||Request::segment(2)=='product')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
      Products
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(3)=='item'||Request::segment(2)=='product')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'product/category')); ?>" class="nav-link <?php echo e((Request::segment(2)=='product' && (Request::segment(3)=='category' || Request::segment(3)=='sub-category'))?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Category</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'product/brand')); ?>" class="nav-link <?php echo e((Request::segment(3)=='brand' && Request::segment(2)=='product')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Brands</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'product/item')); ?>" class="nav-link <?php echo e((Request::segment(2)=='product' && Request::segment(3)=='item')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Product </p>
      </a>
    </li>  
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='blog')); ?>">
  <a href="<?php echo e(url(sitePrefix().'blog')); ?>" class="nav-link <?php echo e((Request::segment(2)=='blog')?'active':''); ?>">
    <i class="far fa-comments nav-icon"></i>
    <p>Blogs</p>
  </a>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='banner')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-image"></i>
    <p>
      Banner
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='banner')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'banner/about')); ?>" class="nav-link <?php echo e((Request::segment(3)=='about')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>About-us </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'banner/product')); ?>" class="nav-link <?php echo e((Request::segment(3)=='product')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Product </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'banner/blog')); ?>" class="nav-link <?php echo e((Request::segment(3)=='blog')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Blog </p>
      </a>
    </li>  
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'banner/contact')); ?>" class="nav-link <?php echo e((Request::segment(3)=='contact')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='heding-section')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas icon fas fa-info"></i>
    <p>
      Heading Sections
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='heading-section')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'heading-section/fproduct')); ?>" class="nav-link <?php echo e((Request::segment(3)=='fproduct')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Featured Products </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'heading-section/blog')); ?>" class="nav-link <?php echo e((Request::segment(3)=='blog')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Blog </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'heading-section/whychooseus')); ?>" class="nav-link <?php echo e((Request::segment(3)=='whychooseus')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Why Choose us </p>
      </a>
    </li> 
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='tag')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-asterisk"></i>
    <p>
      Metatags
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='tag'|| Request::segment(2)=='other-meta-tag')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'tag/home')); ?>" class="nav-link <?php echo e((Request::segment(3)=='home')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Home</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'tag/about')); ?>" class="nav-link <?php echo e((Request::segment(3)=='about')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>About</p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'tag/product')); ?>" class="nav-link <?php echo e((Request::segment(3)=='product')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Product </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'tag/blog')); ?>" class="nav-link <?php echo e((Request::segment(3)=='blog')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Blog</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'tag/contact')); ?>" class="nav-link <?php echo e((Request::segment(3)=='contact')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'other-meta-tag/')); ?>" class="nav-link <?php echo e((Request::segment(2)=='other-meta-tag')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Other Meta Tag</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item <?php echo e((Request::segment(2)=='contact')?'menu-is-opening menu-open':''); ?>">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-envelope"></i>
    <p>
      Contact
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: <?php echo e((Request::segment(2)=='contact')?'block':'none'); ?>">
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'contact/list')); ?>" class="nav-link <?php echo e((Request::segment(3)=='list')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact Request List </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'contact/quote_list')); ?>" class="nav-link <?php echo e((Request::segment(3)=='quote_list')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Quote List </p>
      </a>
    </li>  
    <li class="nav-item">
      <a href="<?php echo e(url(sitePrefix().'contact/page')); ?>" class="nav-link <?php echo e((Request::segment(3)=='page')?'active':''); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact Page</p>
      </a>
    </li> 
  </ul>
</li>
<li class="nav-item">
    <a href="<?php echo e(url(sitePrefix().'site-information')); ?>" class="nav-link <?php echo e((Request::segment(2)=='site-information')?'active':''); ?>">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
            Site Information             
        </p>
    </a>
</li><?php /**PATH C:\Users\Pentacodes.Marketing\Desktop\LaravelProjects\2025\Medwe\resources\views/app/includes/menus/_menu.blade.php ENDPATH**/ ?>