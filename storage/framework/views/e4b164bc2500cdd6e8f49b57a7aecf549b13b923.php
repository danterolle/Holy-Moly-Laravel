<?php $__env->startSection('content'); ?>

    <div class="menu in-left">
        <ul style="list-style-type:none;">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fas fa-home"></i> Home </a></li>
            <li><a href="<?php echo e(url('/search')); ?>"><i class="fas fa-search"></i> Ricerca</a></li>
            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt">
                </i> Logout</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid fade-in">
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom-->
                <article>
                    <h1 id="title"> Playlist </h1>
                    <?php $__currentLoopData = $contenuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_contenuti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php for($i = 0; $i < count($all_contenuti); $i++): ?>
                      <div class="raccolta" id="">
                        <div class="card w-100">
                        <div class="card-header w-100 border-bottom-0">
                        <div class="card float-left">
                          <h2>
                              Brano: <?php echo e($all_contenuti[$i]['Track_name']); ?>

                          </h2>
                          <h4 class="hidden" id="album" style="display: none;">
                            Album: <?php echo e($all_contenuti[$i]['album']); ?>

                          </h4>
                          <h4 class="hidden" id="artista" style="display: none;">
                            Artista: <?php echo e($all_contenuti[$i]['artista']); ?>

                          </h4>
                        </div>
                        <img id="image" class="float-right w-40" src="<?php echo e($all_contenuti[$i]['UrlImg']); ?>">
                        </div>
                        </div>
                        <div class="button" style="width: 100%; text-align: right; padding-right: 6.5%;">
                        <a href="<?php echo e(route('delete',  ['raccolta' => $all_contenuti[$i]['Raccolte_id'], 'track' => $all_contenuti[$i]['Track_id']])); ?>">
                            <button class="btn btn-danger btn-lg">
                                Elimina
                            </button>
                        </a>
                    </div>
                      </div>
                      <?php endfor; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </article>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/myProject/resources/views/collection.blade.php ENDPATH**/ ?>