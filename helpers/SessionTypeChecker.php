<?php

class SessionTypeChecker{
    public static function puedeAcceder($usuarioQuePuedeAcceder){
        switch ($usuarioQuePuedeAcceder) {
            case 'ADMIN':
                if($_SESSION['UsrType'] == 1){
                    return true;
                }   return false;
            case 'LECTOR':
                if($_SESSION['UsrType'] == 2){
                    return true;
                }   return false;
            case 'ESCRITOR':
                if($_SESSION['UsrType'] == 3){
                    return true;
                }   return false;

            case 'EDITOR':
                if($_SESSION['UsrType'] == 4){
                    return true;
                }   return false;
        }
    }
}