<header>
  <div class="container" id="myHeader">
    <nav>
      <a href="<?php echo e(url('/')); ?>" class="logo">
        <img src="<?php echo e(asset('web/images/images/Medwe logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>"  style="width:156px; height:80px"/>
      </a>
      <div class="hamburger" id="hamburgerBtn" >
        <svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 24 24">
        	<path fill="#00ce7c" d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
        </svg>
      </div>
      <ul class="menu" id="menu">
        <svg id="closeBtn" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
          <path fill="#00ce7c" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4" />
        </svg>
        <li>
          <a href="<?php echo e(url('/')); ?>"  class="<?php echo e((Request::segment(1)=='/')?'active':''); ?>" >HOME</a>
        </li>
        <li>
          <a href="<?php echo e(url('about-us')); ?>"  class="<?php echo e((Request::segment(1)=='about-us')?'active':''); ?>">ABOUT US</a>
        </li>
        <li >
          <a href="<?php echo e(url('products')); ?>" class="<?php echo e((Request::segment(1)=='products')?'active':''); ?>">PRODUCTS</a>
        </li>
        <li>
          <a href="<?php echo e(url('blogs')); ?>"  class="<?php echo e((Request::segment(1)=='blogs')?'active':''); ?>">BLOGS</a>
        </li>
        <li >
          <a href="<?php echo e(url('contact-us')); ?>" class="<?php echo e((Request::segment(1)=='contact-us')?'active':''); ?>">CONTACT US</a>
        </li>
        <li class="request-quote-item">
          <a href="<?php echo e(url('request-quote')); ?>" class="request-quote-link">
              <span>Requested products</span>
          </a>
        </li>
      </ul>
      <a href="<?php echo e(url('request-quote')); ?>" class="btn desktop-request-quote">
        <span>Requested products</span>
      </a>

    </nav>
  </div>
</header><?php /**PATH /Users/afeef/works/website-works/well-known/resources/views/web/includes/menu.blade.php ENDPATH**/ ?>