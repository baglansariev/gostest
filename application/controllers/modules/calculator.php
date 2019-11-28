<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Calculator extends Controller
    {
        // Локализация
        public $lang;
        // Срок выделения средств
        public $duration;
        // Стоимость объекта
        public $objPrice;
        // Первоначальный взнос в %
        public $initFeePercent;
        // Первоначальный взнос
        public $initFee;
        // Вступительный взнос
        public $entranceFee;
        // Членский взнос
        public $membershipFee;
        // Итого членский взнос
        public $totalMembershipFee;
        // Первоначальный остаток паквого взноса
        public $initShareRemain;
        // Ежемесячный паевой взнос
        public $monthlyShareFee;
        // Ежемесячный платеж
        public $monthlyPayment;
        // Итого переплата
        public $totalOverPayment;
        // Сообщения об ошибках
        public $error_msg = [
            'duration' => '',
            'obj_price' => '',
            'init_fee' => '',
        ];

        // Месячный Расчетный Показатель МРП
        private $mrp = 2525;
        // Вступительный взнос в % (7%)
        private $entranceFeePercent = 0.07;
        // Минимальный срок выделения средств
        private $durationMin = 1;
        // Максимальный срок выделения средств
        private $durationMax = 180;
        // Минимальная стоимость объекта
        private $objPriceMin = 3000000;
        // Мнимальный процент перваначального взноса
        private $initFeeMin = 28;

        public function __construct()
        {
            parent::__construct();
            $this->lang = $this->load->language('modules/calculator');

            if($this->calcFormValidate()){
                $this->entranceFee = $this->objPrice * $this->entranceFeePercent;
                $this->initFee = ($this->objPrice * $this->initFeePercent) / 100;
                $this->initShareRemain = $this->objPrice - $this->initFee;
                $this->monthlyShareFee = $this->initShareRemain / $this->duration;
                $this->membershipFee = $this->mrp * 2;
                $this->monthlyPayment = $this->membershipFee + $this->monthlyShareFee;
                $this->totalMembershipFee = $this->membershipFee * $this->duration;
                $this->totalOverPayment = $this->entranceFee + $this->totalMembershipFee;
            }
        }

        public function getCalcModule()
        {
            $data = array();

            // Локализация
            $data['local_calculator_main_title'] = $this->lang->get('local_calculator_main_title');
            $data['local_duration'] = $this->lang->get('local_duration');
            $data['local_duration_unit'] = $this->lang->get('local_duration_unit');
            $data['local_duration_placeholder'] = $this->lang->get('local_duration_placeholder');
            $data['local_object_price'] = $this->lang->get('local_object_price');
            $data['local_object_price_unit'] = $this->lang->get('local_object_price_unit');
            $data['local_object_price_placeholder'] = $this->lang->get('local_object_price_placeholder');
            $data['local_initial_fee'] = $this->lang->get('local_initial_fee');
            $data['local_initial_fee_unit'] = $this->lang->get('local_initial_fee_unit');
            $data['local_initial_fee_placeholder'] = $this->lang->get('local_initial_fee_placeholder');
            $data['local_overpayment_text'] = $this->lang->get('local_overpayment_text');
            $data['local_overpayment_unit'] = $this->lang->get('local_overpayment_unit');
            $data['local_calc_button'] = $this->lang->get('local_calc_button');
            $data['local_table_title'] = $this->lang->get('local_table_title');
            $data['local_table_month'] = $this->lang->get('local_table_month');
            $data['local_table_object_price'] = $this->lang->get('local_table_object_price');
            $data['local_table_entrance_fee'] = $this->lang->get('local_table_entrance_fee');
            $data['local_table_initial_fee'] = $this->lang->get('local_table_initial_fee');
            $data['local_table_monthly_share_fee'] = $this->lang->get('local_table_monthly_share_fee');
            $data['local_table_membership_fee'] = $this->lang->get('local_table_membership_fee');
            $data['local_table_membership_fee_unit'] = $this->lang->get('local_table_membership_fee_unit');
            $data['local_table_share_fee_remain'] = $this->lang->get('local_table_share_fee_remain');
            $data['local_table_monthly_payment'] = $this->lang->get('local_table_monthly_payment');
            $data['local_table_overpayment'] = $this->lang->get('local_table_overpayment');

            $data['duration'] = $this->duration;
            $data['obj_price'] = $this->objPrice;
            $data['init_fee_percent'] = $this->initFeePercent;
            $data['init_fee'] = number_format($this->initFee, 0, '', ' ');
            $data['entrance_fee'] = number_format($this->entranceFee, 0, '', ' ');
            $data['membership_fee'] = number_format($this->membershipFee, 0, '', ' ');
            $data['init_share_remain'] = $this->initShareRemain;
            $data['monthly_share_fee'] = $this->monthlyShareFee;
            $data['monthly_payment'] = number_format(ceil($this->monthlyPayment), 0, '', ' ');
            $data['total_membership_fee'] = number_format($this->totalMembershipFee, 0, '', ' ');
            $data['total_overpayment'] = number_format($this->totalOverPayment, 0, '', ' ');

            $data['duration_msg'] = $this->error_msg['duration'];
            $data['obj_price_msg'] = $this->error_msg['obj_price'];
            $data['init_fee_msg'] = $this->error_msg['init_fee'];

            return $this->load->view('modules/calculator', $data);
        }

        public function calcFormValidate()
        {
            if(
                $this->request->has('duration', 'post') &&
                $this->request->has('object-price', 'post') &&
                $this->request->has('initial-fee', 'post')
            ){
                if((int)$this->request->post['duration'] >= $this->durationMin && (int)$this->request->post['duration'] <= $this->durationMax){ $this->duration = (int)$this->request->post['duration']; }
                else{ $this->error_msg['duration'] = $this->lang->get('local_duration_msg'); }

                if((int)$this->request->post['object-price'] >= $this->objPriceMin){ $this->objPrice = (int)$this->request->post['object-price']; }
                else{ $this->error_msg['obj_price'] = $this->lang->get('local_object_price_msg'); }

                if((int)$this->request->post['initial-fee'] >= $this->initFeeMin){ $this->initFeePercent = $this->request->post['initial-fee']; }
                else{ $this->error_msg['init_fee'] = $this->lang->get('local_initial_fee_msg'); }

                if(!empty($this->duration && !empty($this->objPrice) && !empty($this->initFeePercent))){ return true; }
                return false;
            }
            return false;
        }

        public function popupCalcModule()
        {
            return $this->load->view('modules/popup-calculator');
        }
    }