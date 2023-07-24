<link rel="stylesheet" type="text/css" href="/{{BASE_DIR}}/public/css/appstyle3.css" />
<section class="CajaProducto">
    <!--<h1>{{modedsc}}</h1>-->
    <section class="row">
    <form action="index.php?page=Mnt_Agregar&mode={{mode}}&ID={{ID}}"
        method="POST"
        enctype="multipart/form-data
        class="col-6 col-3-offset">

        <div class="Box1">
        <label for="ID" class="col-4">Código</label>
        <input type="hidden" id="ID" name="ID" value="{{ID}}"/>
        <input type="hidden" id="mode" name="mode" value="{{mode}}"/>

        <input type="text" readonly name="IDdummy" value="{{ID}}"/>
        
            <label for="Titulo" class="col-4">Titulo</label>
            <input type="text" {{readonly}} name="Titulo" value="{{Titulo}}" maxlength="45" placeholder="Nombre de la pelicula"/>
            {{if Titulo_error}}
                <span class="error col-12">{{Titulo_error}}</span>
            {{endif Titulo_error}}

            <label for="Contenido" class="col-4">Contenido</label>
            <input type="textarea" {{readonly}} name="Contenido" value="{{Contenido}}" maxlength="4000" placeholder="Contenido de la pelicula"/>

            <label for="Fecha" class="col-4">Fecha</label>
            <input type="date" {{readonly}} name="Fecha" value="{{Fecha}}"/>
            
            <label for="Idioma" class="col-4">Idioma</label>
            <input type="text" {{readonly}} name="Idioma" value="{{Idioma}}" maxlength="45" placeholder="Idioma de la pelicula"/>
        
            <label for="Autor" class="col-4">Autor</label>
            <input type="text" {{readonly}} name="Autor" value="{{Autor}}" maxlength="45" placeholder="Autor de la pelicula"/>
        
        </div>
        
        
        <div class="Box2">
    
            <label for="Genero" class="col-4">Genero</label>
            <input type="text" {{readonly}} name="Genero" value="{{Genero}}" maxlength="45" placeholder="Genero de la pelicula"/>
        
            <label for="Popularidad" class="col-4">Popularidad</label>
            <input type="text" {{readonly}} name="Popularidad" value="{{Popularidad}}"/>
    
            <label for="PublicidadEspecial" class="col-4">Estado</label>
            <select id="PublicidadEspecial" name="PublicidadEspecial" {{if readonly}}disabled{{endif readonly}}>
            <option value="ACT" {{PublicidadEspecial_ACT}}>Activo</option>
            <option value="NOACT" {{PublicidadEspecial_NOACT}}>Inactivo</option>

            <label for="Precio" class="col-4">Precio</label>
            <input type="text" {{readonly}} name="Precio" value="{{Precio}}" placeholder="Precio de la pelicula"/>
    
            <div id="imagenesdiv">
                <label for="Imagen" class="col-4">Imagen Primera</label>
                <input type="File" {{readonly}} name="Imagen" value="{{Imagen}}" placeholder="Imagen de la pelicula"/>
                

                <label for="Imagen2" class="col-4">Imagen Segunda</label>
                <input type="File" {{readonly}} name="Imagen2" value="{{Imagen2}}" placeholder="Imagen2 de la pelicula"/>
            </div>
        </div>

        

        
        {{if has_errors}}
            <section>
            <ul>
                {{foreach general_errors}}
                    <li>{{this}}</li>
                {{endfor general_errors}}
            </ul>
            </section>
        {{endif has_errors}}
        <fieldset>
            {{if show_action}}
            <button type="submit" name="btnGuardar" value="G">Guardar</button>
            <br><br><br>
            {{endif show_action}}
            <button type="button" id="btnCancelar">Cancelar</button>
        </fieldset>
    </form>
    </section>
</section>


<script>
document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=Mnt_Agregars");
    });
});
</script>