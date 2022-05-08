<?php $__env->startSection('content'); ?>

    <div class="menu in-left">
        <ul style="list-style-type:none;">
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fas fa-home"></i> Home </a></li>
            <li><a href="<?php echo e(url('/search')); ?>"><i class="fas fa-search"></i> Ricerca</a></li>
            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt">
                </i> Logout</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom -->
                 <div class="card-header text-white d-flex align-items-center justify-content-center header fade-in" style="background-color: green;">
                    Cerca un brano, un artista o un album...
                 </div>
                <div class="card">
                    <form name="search" id="ricerca" class="fade-in" method="POST" action="<?php echo e(route('cerca')); ?>">
                        <!-- Set search method/action -->
                        <?php echo csrf_field(); ?>
                        <p><label><input type="text" name="cerca" size="40"></label></p>
                        <p><button type = "submit" class="btn btn-success btn-lg" style="width: 50%;">
                            Cerca!
                        </button></p>
                    </form>
                    <!-- New card to show search contents -->
                       <div class="card-header text-white d-flex align-items-center justify-content-center header fade-in" style="background-color: green;">
                          <h4 id="afterSelect" class="hidden" style="margin: 0;"> Inserisci il titolo della playlist in cui vuoi aggiungere il brano selezionato </h4>
                       </div>
                    <div class="card fade-in">
                    <form name="selectPlaylist" id="selezionaRaccolta" class="hidden" method="POST" action="<?php echo e(route('add')); ?>">
                        <?php echo csrf_field(); ?>
                        <p>
                            <label>
                              <input type="text" name="raccolta" size="40">
                            </label>
                            <input id="found_nome" name="nome" type="hidden" value="">
                            <input id="found_id" name="spotify_id" type="hidden" value="">
                            <input id="found_album" name="album" type="hidden" value="">
                            <input id="found_artista" name="artista" type="hidden" value="">
                            <input id="found_img" name="img" type="hidden" value="">
                        </p>
                         <p>
                          <button type="submit" class="btn btn-success btn-lg" style="width: 40%;">
                            Aggiungi!
                          </button>
                         </p>
                        <?php if(session('message')): ?>
                          <div class="alert alert-success text-center">
                            <?php echo e(session('message')); ?>

                          </div>
                        <?php endif; ?>
                        <?php if(session('msg')): ?>
                          <div class="alert alert-warning text-center">
                            <?php echo e(session('msg')); ?>

                          </div>
                        <?php endif; ?>
                        <?php if(session('messg')): ?>
                          <div class="alert alert-danger text-center">
                            <?php echo e(session('messg')); ?>

                          </div>
                        <?php endif; ?>
                    </form>
                    <?php echo $__env->yieldContent('findContents'); ?>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/myProject/resources/views/search.blade.php ENDPATH**/ ?>