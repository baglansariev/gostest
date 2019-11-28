<section class="calculator">
    <div class="container">
        <h3 class="row-title title-center"><?php echo $local_calculator_main_title; ?></h3>
        <div class="row d-flex justify-content-center">
            <div class="calc-module col-lg-6 col-md-8 col-sm-10 col-xs-12">
                <form method="post" class="calc">
                    <div class="form-group">
                        <label for="duration"><?php echo $local_duration; ?> <span>(<?php echo $local_duration_unit; ?>)</span></label>
                        <i class="calc-message"><?php if(isset($duration_msg)) echo $duration_msg; ?></i>
                        <input id="duration" type="number" name="duration" value="<?php if(isset($duration)) echo $duration; ?>" placeholder="<?php echo $local_duration_placeholder; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="object-price"><?php echo $local_object_price; ?> <span>(<?php echo $local_object_price_unit; ?>)</span></label>
                        <i class="calc-message"><?php if(isset($obj_price_msg)) echo $obj_price_msg; ?></i>
                        <input id="object-price" type="number" name="object-price" value="<?php if(isset($obj_price)) echo $obj_price; ?>" placeholder="<?php echo $local_object_price_placeholder; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="initial-fee"><?php echo $local_initial_fee; ?> <span>(<?php echo $local_initial_fee_unit; ?>)</span></label>
                        <i class="calc-message"><?php if(isset($init_fee_msg)) echo $init_fee_msg; ?></i>
                        <input id="initial-fee" type="number" name="initial-fee" value="<?php if(isset($init_fee_percent)) echo $init_fee_percent; ?>" placeholder="<?php echo $local_initial_fee_placeholder; ?>" required>
                    </div>
                    <div class="form-froup">
                        <p class="form-group-title"><?php echo $local_overpayment_text; ?> <span>(<?php echo $local_overpayment_unit; ?>)</span></p>
                        <p class="calc-result">
                            <b><?php if(isset($total_overpayment) && $total_overpayment != 0) echo $total_overpayment . ' тг'; ?></b>
                        </p>
                    </div>
                    <input class="gen-btn main-btn" type="submit" value="<?php echo $local_calc_button; ?>">
                </form>
            </div>
        </div>
    </div>
</section>
<section class="calculator-table">
    <div class="container-fluid">
        <h3 class="row-title title-center"><?php echo $local_table_title; ?></h3>
        <div class="row">
            <div class="calc-table col-lg-12">
                <table border="1">
                    <thead>
                        <tr>
                            <th><?php echo $local_table_month; ?></th>
                            <th><?php echo $local_table_object_price; ?></th>
                            <th><?php echo $local_table_entrance_fee; ?></th>
                            <th><?php echo $local_table_initial_fee; ?></th>
                            <th><?php echo $local_table_monthly_share_fee; ?></th>
                            <th><?php echo $local_table_membership_fee; ?> <span><?php echo $local_table_membership_fee_unit; ?></span></th>
                            <th><?php echo $local_table_share_fee_remain; ?></th>
                            <th><?php echo $local_table_monthly_payment; ?></th>
                        </tr>
                    </thead>
                    <?php if(isset($duration) && isset($obj_price) && isset($init_fee_percent)): ?>
                        <tbody>
                        <?php for($i = 1; $i <= $duration; $i++): ?>
                            <?php $i%12 == 0 ? $class = 'calc-year': $class = ''; ?>
                            <tr class="<?php echo $class; ?>">
                                <td><?php echo $i; ?></td>
                                <?php if($i == 1): ?>
                                    <td><?php echo number_format($obj_price, 0, '', ' '); ?></td>
                                    <td><?php echo $entrance_fee ?></td>
                                    <td><?php echo $init_fee ?></td>
                                <?php else: ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                <?php endif; ?>
                                <td><?php echo number_format($monthly_share_fee, 0, '', ' '); ?></td>
                                <td><?php echo $membership_fee; ?></td>
                                <td><?php echo number_format(ceil($init_share_remain - ($monthly_share_fee * $i)), 0, '', ' '); ?></td>
                                <td><?php echo $monthly_payment; ?></td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <td></td>
                            <th><?php echo $local_table_overpayment; ?></th>
                            <td><?php echo $entrance_fee?></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_membership_fee; ?></td>
                            <td></td>
                            <th><?php echo $total_overpayment; ?></th>
                        </tr>
                        </tbody>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</section>