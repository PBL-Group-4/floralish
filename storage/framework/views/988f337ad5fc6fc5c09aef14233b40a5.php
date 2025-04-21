<html>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($dataku['id']); ?></td>
                <td><?php echo e($dataku['nama']); ?></td>
                <td><?php echo e($dataku['harga']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</html><?php /**PATH C:\laragon\www\jualbunga\resources\views/list_barang.blade.php ENDPATH**/ ?>