<?php

    class Game {
        private $id;
        private $date;
        private $bet;
        private $profit;

        public function __construct($i,$d,$b,$p){
            $this->id = $i;
            $this->date = $d;
            $this->bet = $b;
            $this->profit = $p;
        }

        public function __set($input,$value){
            switch($input){
                case 'id':
                    $this->id = $value;
                    break;
                case 'date':
                    $this->date = $value;
                    break;
                case 'bet':
                    $this->bet = $value;
                    break;
                case 'profit':
                    $this->profit = $value;
                    break;
                default:
                    return null;
            }
        }

        public function __get($input){
            switch($input){
                case 'id':
                    return $this->id;
                    break;
                case 'date':
                    return $this->date;
                    break;
                case 'bet':
                    return $this->bet;
                    break;
                case 'profit':
                    return $this->profit;
                    break;
                default:
                    return null;
            }
        }
    }