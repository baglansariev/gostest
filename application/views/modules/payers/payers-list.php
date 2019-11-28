<section class="account-module">
    <h3 class="row-title title-center">Список пайщиков</h3>
    <div class="row">
        <div class="payers-table col-lg-12">
            <table border="1">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Ф.И.О</th>
                        <th>Телефон</th>
                        <th>Сумма</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($payers_list)):
                            $i = 1;
                    ?>
                        <?php foreach($payers_list as $payer): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $payer['name']; ?></td>
                                <td><?php echo $payer['phone']; ?></td>
                                <td><?php echo $payer['payed_sum']; ?></td>
                                <td><?php echo $payer['status']; ?></td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
