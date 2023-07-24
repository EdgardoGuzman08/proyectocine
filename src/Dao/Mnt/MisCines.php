<?php

namespace Dao\Mnt;

use Dao\Table;

class MisCines extends Table
{
    public static function Insert($Cines, $Usuario)
    {
        $sqlstr = "INSERT INTO miscines (`ID`, `IdCine`,`IdUsuario`) VALUES(:Cines, :Cines, :Usuario)";
        $sqlParams = array("Cines" => $Cines, "Usuario" => $Usuario);
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

    public static function ObtenerMisCines(int $ID)
    {
        $sqlstr = "
        select c.username as Usuario, a.IdUsuario ,b.* from MisCines a inner join cinesinventario b 
        ON a.IdCine = b.ID inner join Usuario c  ON c.usercod = a.IdUsuario where a.IdUsuario = :ID";
        $sqlParams = array("ID" => $ID);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }

    public static function CantidadCines(int $ID){
        $sqlstr = "
        select count(*) as CantidadCines from MisCines a inner join cinesinventario b 
        ON a.IdCine = b.ID inner join Usuario c  ON c.usercod = a.IdUsuario where a.IdUsuario = :ID";
        $sqlParams = array("ID" => $ID);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }
}
