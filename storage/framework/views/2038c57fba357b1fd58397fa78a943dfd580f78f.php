<?php $__env->startSection('findContents'); ?>

<?php $__currentLoopData = $research; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $researchs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card-header container bg-success">
    <div class="card">
    <div class="card-header">
    <div class="card float-left">
      <p class="p_found">
          Nome: <a id="nome" name="nome"> <?php echo e($researchs['name']); ?> </a>
      </p>
      <p class="p_found">
          ID: <a id="ID"> <?php echo e($researchs['id']); ?> </a>
      </p>
      <p class="p_found">
          Album: <a id="Album"> <?php echo e($researchs['album']['name']); ?> </a>
      </p>
      <p class="p_found">
          Artista: <a id="Artista"> <?php echo e($researchs['artists']['0']['name']); ?> </a>
      </p>
    </div>
      <img id="image" class="float-right" src="<?php echo e($researchs['album']['images']['0']['url']); ?>">
    </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/myProject/resources/views/findContents.blade.php ENDPATH**/ ?>