<?php

    namespace App\Payment;

    class PaymentFacade{

        protected static function getFacadeAccessor(){
            return 'Payment';
        }

    }
