<h3 class="row-title">Тесты</h3>
<div class="row">
    <div class="col-lg-12">
        <table class="test-list" cellspacing="0">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Действие</th>
                    <th>Изменить</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($tests)): $i = 1; ?>
                    <?php foreach($tests as $test): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $test['text'] ?></td>
                            <td><?php echo $test['price'] . 'т'; ?></td>
                            <td>
                                <button type="button" class="main-btn gen-btn">Сдать</button>
                            </td>
                            <td>
                                <a href="#">Изменить</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>