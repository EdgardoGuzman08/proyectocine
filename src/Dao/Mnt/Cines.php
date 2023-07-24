<?php

namespace Dao\Mnt;

use Dao\Table;
use Monolog\Handler\WhatFailureGroupHandler;

class Cines extends Table
{
    public static function getAll()
    {
        $sqlstr = "SELECT * FROM cines.cinesinventario;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function CinesRecientes()
    {
        $sqlstr = "SELECT * from cinesinventario 
        where PublicidadEspecial  = 'NOACT' and Genero != 'Manga'
        order by ID Desc limit 0,3";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function cinesPopulares(){
        $sqlstr = "SELECT  * from cinesinventario 
        where PublicidadEspecial  = 'NOACT' and Genero != 'Manga'
        order by Popularidad Desc limit 0,6";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function CinesPublicidad(){
        $sqlstr = "SELECT  * from cinesinventario 
        where PublicidadEspecial  = 'ACT'
        order by Popularidad ASC limit 0,2";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function CinesPublicidad2(){
        $sqlstr = "SELECT  * from cinesinventario 
        where PublicidadEspecial  = 'ACT'
        order by Popularidad ASC limit 4,2";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function Mangas(){
        $sqlstr = "SELECT * from cinesinventario 
        where Genero  = 'Manga'
        order by Popularidad Desc limit 0,4";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function Mangas2(){
        $sqlstr = "SELECT * from cinesinventario 
        where Genero  = 'Manga'
        order by Popularidad Desc limit 4,12";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function getById(int $ID)
    {
        $sqlstr = "SELECT * from `cinesinventario` where ID=:ID;";
        $sqlParams = array("ID" => $ID);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function obtenerCine(int $ID)
    {
        $sqlstr = "SELECT * from `cinesinventario` where ID =:ID;";
        $sqlParams = array("ID" => $ID);
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }

    public static function obtenerCine2(int $ID)
    {
        $sqlstr = "SELECT * from `cinesinventario` where ID =:ID;";
        $sqlParams = array("ID" => $ID);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function buscarCine($Nombre)
    {
        $sqlstr = "SELECT * from cinesinventario
        where Genero like :Nombre or Autor like :Nombre or Titulo like :Nombre
        order by Genero";
        $sqlParams = array("Nombre" => "%". $Nombre . "%");
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }

    public static function ObtenerGenerosSeccion($Nombre){
        $sqlstr = "SELECT * from cinesinventario
        where Genero like :Nombre";
        $sqlParams = array("Nombre" => "%". $Nombre . "%");
        return self::obtenerRegistros($sqlstr, $sqlParams);
    }

    public static function insert(
        $Imagen,
        $Imagen2,
        $Titulo,
        $Autor,
        $Contenido,
        $Fecha,                
        $Genero,
        $Idioma,
        $Precio,
        $PublicidadEspecial,
    ){
        $sqlstr = "INSERT INTO `cinesinventario` (`Imagen`, `Imagen2`,`Titulo`, `Autor`, `Contenido`, `Fecha`, `Genero`, `Idioma`, `Precio`, `PublicidadEspecial`) VALUES(:Imagen, :Imagen2, :Titulo, :Autor, :Contenido, :Fecha, :Genero, :Idioma, :Precio, :PublicidadEspecial);";
        $sqlParams = [
            "Imagen" => $Imagen,
            "Imagen2" => $Imagen2,
            "Titulo" => $Titulo,
            "Autor" => $Autor,
            "Contenido" => $Contenido,
            "Fecha" => $Fecha,            
            "Genero" => $Genero,
            "Idioma" => $Idioma,
            "Precio" => $Precio,            
            "PublicidadEspecial" => $PublicidadEspecial,            
        ];
        return self::executeNonQuery($sqlstr, $sqlParams);
    }


    public static function update(
        $Imagen,
        $Imagen2,
        $Titulo,
        $Autor,
        $Contenido,        
        $Genero,
        $Idioma,
        $Precio,
        $Fecha,
        $PublicidadEspecial,
        $ID
    ) {
        $sqlstr = "UPDATE `cinesinventario` set 
        `Titulo` = :Titulo, `Autor` = :Autor , `Contenido` = :Contenido, `Genero` =:Genero , `Idioma` = :Idioma, `Precio`= :Precio, `Fecha` = :Fecha, `PublicidadEspecial` = :PublicidadEspecial, `Imagen` = :Imagen, `Imagen2` = :Imagen2  where `ID` = :ID;";
        $sqlParams = array(
            "Imagen" => $Imagen,
            "Imagen2" => $Imagen2,
            "Titulo" => $Titulo,
            "Autor" => $Autor,
            "Contenido" => $Contenido,                      
            "Genero" => $Genero,
            "Idioma" => $Idioma,
            "Precio" => $Precio,
            "Fecha" => $Fecha,
            "PublicidadEspecial" => $PublicidadEspecial,        
            "ID" => $ID
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

    public static function delete($ID)
    {
        $sqlstr = "DELETE from `cinesinventario` where ID = :ID;";
        $sqlParams = array(
            "ID" => $ID
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }    

    public static function LlenarCbProductos()
    {
        $sqlstr = "select * from productos order by ID Desc";
        return self::obtenerRegistros($sqlstr, array());
    }
}
