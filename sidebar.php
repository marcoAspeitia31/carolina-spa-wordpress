<aside class="col-lg-4 pt-4 pt-lg-0 text-light align-self-start">
    <div class="sidebar schedules">
        <h2 class="text-center text-uppercase font-weight-bold mt-5">horarios</h2>
        <p class="text-center lead mt-3"><?php the_field('horarios_texto'); ?></p>
        <?php $horario = get_field('horario'); ?>
        <table class="table table-hover text-center mt-3 mb-5 text-light">
            <thead>
                <tr>
                    <?php foreach($horario['header'] as $th): ?>

                    <th class="text-center"><?php echo $th['c']; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($horario['body'] as $tr): ?>
                <tr>
                    <?php foreach($tr as $td): ?>
                    <td><?php echo $td['c']; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</aside>