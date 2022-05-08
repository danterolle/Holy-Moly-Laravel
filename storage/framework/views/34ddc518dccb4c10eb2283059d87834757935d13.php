<?php $__env->startSection('content'); ?>

    <div class="menu in-left">
       <ul style="list-style-type: none;">
       <li><a href="<?php echo e(url('/home')); ?>"><i class="fas fa-home"></i> Home </a></li>
       <li><a href="<?php echo e(url('/search')); ?>"><i class="fas fa-search"></i> Ricerca </a></li>
       <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       <i class="fas fa-sign-out-alt"></i> Logout </a></li>
       </ul>
     </div>
     <div class="container-fluid">
         <div class="row justify-content-center">
             <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom-->
                <div class="card-header d-flex align-items-center justify-content-center header fade-in">
                    Crea una nuova playlist!
                </div>
                 <div class="card">
                         <form name="crea" id="ricerca" class="fade-in" method="POST" action="<?php echo e(route('crea_collection')); ?>"> <!-- set route crea playlist -->
                            <?php echo csrf_field(); ?>
                             <p><label id="label"> <input type="text" name="crea" size="40"></label></p>
                             <p>
                                <button type="submit" class="btn btn-success btn-lg" style="width: 50%;">
                                  Crea!
                                </button>
                             </p>
                          </form>
                          <br>
                  <div class="card-header home_title justify-content-center fade-in">
                    <h1 id="title" class="fade-in"> Le tue playlist... </h1>
                        <?php if(session('message')): ?>
                            <div class="alert alert-danger text-center mx-auto w-25">
                             <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
                     <div class="card">
                      <?php $__currentLoopData = $raccolta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raccolte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="raccolta" id="<?php echo e($raccolte["id"]); ?>">
                         <a class="raccolte">
                             <h3>
                             ID: <?php echo e($raccolte["id"]); ?> -
                             Titolo: <?php echo e($raccolte["Titolo"]); ?>

                             </h3>
                         </a>
                         <a class="raccolte" id="immagine" href="<?php echo e(route('playlist', ['id' => $raccolte['id']])); ?>">
                             <img src="<?php echo e($raccolte["UrlImg"]); ?>">
                         </a>
                       </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/myProject/resources/views/home.blade.php ENDPATH**/ ?>