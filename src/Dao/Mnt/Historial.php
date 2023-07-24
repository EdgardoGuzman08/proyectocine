<?php

namespace Dao\Mnt;

use Dao\Table;
use Monolog\Handler\WhatFailureGroupHandler;

class Historial extends Table
{
    public static function getAll($userCode)
    {
        $sqlstr = "SELECT a.Titulo, a.Precio, b.Fecha from cinesinventario a inner join transacciones b
        ON a.ID = b.Cine inner join Usuario c
        ON b.Usuario = c.usercod
        where c.usercod = :userCode";
        $sqlParams = array("userCode" => $userCode);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }

    public static function insert($Cine, $Usuario)
    {
        $sqlstr = "INSERT INTO `transacciones` ( `Cine`, `Usuario`) VALUES (:Cine, :Usuario)";
        $sqlParams = [
            "Cine" => $Cine,
            "Usuario" => $Usuario,
        ];
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

    public static function Total($Usuario){
        $sqlstr = "
        select sum(b.Precio) as Total from Transacciones a inner join cinesinventario b
        on a.Cine = b.ID  
        where a.Usuario =:Usuario";
        $sqlParams = array("Usuario" => $Usuario);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }


    public static function TotalCines($Usuario){
        $sqlstr = "
        select count(*) as Total from Transacciones a inner join cinesinventario b
        on a.Cine = b.ID  
        where a.Usuario = :Usuario";
        $sqlParams = array("Usuario" => $Usuario);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }
}
