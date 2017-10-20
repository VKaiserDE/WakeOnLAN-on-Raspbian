<?php
    class Umrechnen extends CI_Model {

        public function zuProzent($Teil, $Ganze) {

            $Ergebnis = $Teil / $Ganze;
            $Ergebnis = $Ergebnis * 100;

            $Ergebnis = round($Ergebnis, 1);

            return $Ergebnis;
        }
    }