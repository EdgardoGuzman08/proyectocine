<?php
namespace Dao\Mnt;

use Dao\Table;
use DateTime;

class Agregars extends Table{

    /**
     * Crea un nuevo registro en la tabla cinesinventario.
     *
     * @param string|null $titulo
     * @param string|null $contenido
     * @param string|null $fecha
     * @param string|null $autor
     * @param string|null $imagen
     * @param string|null $genero
     * @param string|null $idioma
     * @param float|null $precio
     * @param int|null $popularidad
     * @param string $publicidadEspecial
     * @param string|null $imagen2
     *
     * @return int
     */
    public static function insert(
        ?string $titulo,
        ?string $contenido,
        ?string $fecha,
        ?string $autor,
        ?string $imagen,
        ?string $genero,
        ?string $idioma,
        ?float $precio,
        ?int $popularidad,
        string $publicidadEspecial = 'NOACT',
        ?string $imagen2
    ): int 
    
    {
         // Leer el contenido del archivo de imagen
        $contenidoImagen = file_get_contents($imagen);
        $contenidoImagen2 = file_get_contents($imagen2);

        // Codificar el contenido en base64
        $imagenCodificada = base64_encode($contenidoImagen);
        $imagenCodificada2 = base64_encode($contenidoImagen2);
        $sqlstr = "INSERT INTO cinesinventario (Titulo, Contenido, Fecha, Autor, Imagen, Genero, Idioma, Precio, Popularidad, PublicidadEspecial, Imagen2)
                values(:titulo, :contenido, :fecha, :autor, :imagen, :genero, :idioma, :precio, :popularidad, :publicidadEspecial, :imagen2);";
        $params = [
            "titulo" => $titulo,
            "contenido" => $contenido,
            "fecha" => $fecha,
            "autor" => $autor,
            "imagen" => $imagenCodificada,
            "genero" => $genero,
            "idioma" => $idioma,
            "precio" => $precio,
            "popularidad" => $popularidad,
            "publicidadEspecial" => $publicidadEspecial,
            "imagen2" => $imagenCodificada2
        ];

        return self::executeNonQuery($sqlstr, $params);
    }


    public static function update(
        ?string $titulo, 
        ?string $contenido, 
        ?string $fecha, 
        ?string $autor, 
        ?string $imagen, 
        ?string $genero, 
        ?string $idioma, 
        ?string $precio, 
        ?int $popularidad, 
        ?string $publicidadEspecial, 
        ?string $imagen2,
        ?int $ID
    ){
         // Leer el contenido del archivo de imagen
        $contenidoImagen = file_get_contents($imagen);
        $contenidoImagen2 = file_get_contents($imagen2);
 
         // Codificar el contenido en base64
        $imagenCodificada = base64_encode($contenidoImagen);
        $imagenCodificada2 = base64_encode($contenidoImagen2);
        $sqlstr = "UPDATE cines.cinesinventario set Titulo = :titulo, Contenido = :contenido, Fecha = :fecha , Autor = :autor, 
        Imagen = :imagen, Idioma = :idioma, Precio = :precio, Popularidad = :popularidad, PublicidadEspecial = :publicidadEspecial, 
        Imagen2 = :imagen2 where ID=:ID;";
        $rowsUpdated = self::executeNonQuery(
            $sqlstr,
            array(
                "titulo"=>$titulo, 
                "contenido"=>$contenido, 
                "fecha"=>$fecha, 
                "autor"=>$autor, 
                "imagen"=>$imagenCodificada, 
                "genero"=>$genero, 
                "idioma"=>$idioma, 
                "precio"=>$precio, 
                "popularidad"=>$popularidad, 
                "publicidadEspecial"=>$publicidadEspecial,
                "imagen2"=>$imagenCodificada2,
                "ID" => $ID
            )
        );
        return $rowsUpdated;
    }
    public static function delete(int $ID){
        $sqlstr = "DELETE from cines.cinesinventario where ID=:ID;";
        $rowsDeleted = self::executeNonQuery(
            $sqlstr,
            array(
                "ID" => $ID
            )
        );
        return $rowsDeleted;
    }
    public static function findAll()
    {
        $sqlstr = "SELECT * FROM cines.cinesinventario;";
        return self::obtenerRegistros($sqlstr, array());
    }
    public static function findByFilter(){

    }
    public static function findById(int $ID){
        $sqlstr = "SELECT Titulo, Contenido, Fecha, Autor, Genero, Idioma, Precio, Popularidad, PublicidadEspecial from cinesinventario where ID = :ID;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "ID"=> $ID
            )
        );
        return $row;
    }
}
?>