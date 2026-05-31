<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo e(url(sitePrefix().'dashboard')); ?>" class="brand-link">
    <img src="<?php echo e(asset('app/dist/img/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">&nbsp</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo e(loggedUserProfileImage()); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo e(url(sitePrefix().'dashboard')); ?>" class="nav-link <?php echo e((Request::segment(3)=='dashboard' && Request::segment(2)=='admin')?'active':''); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard              
            </p>
          </a>
        </li>
        <?php echo $__env->make('app.includes.menus._menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;        
      </ul>
    </nav>
  </div>
</aside><?php /**PATH C:\Users\Pentacodes.Marketing\Desktop\LaravelProjects\2025\Medwe\resources\views/app/includes/menu.blade.php ENDPATH**/ ?>