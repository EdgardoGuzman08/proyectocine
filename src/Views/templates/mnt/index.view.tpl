<section class="ContenedorBotonesSeccion">
    <div class="BoxSeccion">
        <input readonly type="button" class="btnInvestigar" href="#recientes" onclick="Seccion4('Peliculas Recientes')" id="Btn1" value="Peliculas Recientes">
        <input readonly type="button" class="btnInvestigar" href="#masbuscados" onclick="Seccion4('Mas Buscados')" id="Btn2" value="Mas Buscados">        
        <input readonly type="button" class="btnInvestigar" href="#populares" onclick="Seccion4('Peliculas Populares')" id="Btn4" value="Peliculas Populares">
        <input readonly type="button" class="btnInvestigar" href="#recentpopulares" onclick="Seccion4('Recientes Populares')" id="Btn7" value="Recientes Populares">        
    </div>
</section>

<section class="ContenedorPrincipalPortada">
    <div class="imgPortada"><img src="/{{BASE_DIR}}/public/imgs/portada1.jpg"></div>
    <p>Una experiencia Unica en cada pelicula</p>
    <h1>Donde las historias se hacen realidad</h1>
    <input type="button" value="Explora nuestras peliculas" onclick="Explorar()">
</section>


<section class="ContenedorSeccionSeparador" id="recientes">
    <p>Peliculas Recientes</p>
</section>

<section class="ContenedorBooks">
    {{foreach CinesRecientes}}
    <div class="box Animado">
        <img class="img255" src="{{Imagen64}}" alt="">
        <button class="btnAdd" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                class="text">Lps</span><span>Comprar</span></button>
        <button class="btnAdd" role="button" onclick="Visualizar({{ID}})"><span
                class="text">❤️</span><span>Favoritos</span></button>
        <button class="btnAdd" role="button"
            onclick="OpenModal('{{Titulo}}', '{{Contenido}}', '{{Autor}}', '{{Genero}}', '{{Idioma}}', '{{Fecha}}', '{{Precio}}', {{ID}})"><span
                class="text">→</span><span>Detalles</span></button>
    </div>
    {{endfor CinesRecientes}}
</section>

<section class="ContenedorSeccionSeparador" id="populares">
    <p>Peliculas Populares</p>
</section>

<section class="ContenedorPrincipalBoxes Animado">
    {{foreach CinesPopulares}}
    <div class="CajaA1">
        <img class="imgCA" src="{{Imagen64}}" alt="Portada Imagen">
        <div class="GeneroLibro">
            <p></p>
        </div>
        <div class="PequenaInfo">
            <p></p>
        </div>
        <div class="ContenedorBotonCajaA1">
            <button class="btnAdd" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                    class="text">Lps</span><span>Comprar</span></button>
            <button class="btnAdd" role="button" onclick="Visualizar({{ID}})"><span id="txtFav" class="text">❤️</span><span>Favoritos</span></button>
            <button class="btnAdd" role="button"
                onclick="OpenModal('{{Titulo}}', '{{Contenido}}', '{{Autor}}', '{{Genero}}', '{{Idioma}}', '{{Fecha}}', '{{Precio}}', {{ID}})"><span
                    class="text">→</span><span>Detalles</span></button>
        </div>
    </div>
    {{endfor CinesPopulares}}
</section>

<section class="ContenedorSeccionSeparador" id="masbuscados">
    <p>Peliculas mas Buscadas</p>
</section>

{{foreach CinesPublicidad}}
<section class="ContenedorVista Animado">
    <div class="Fondo">
        <img src="{{Imagen64}}" class="imgContenedorVista" alt="">
        <div class="Titulo">
            <h1>{{Titulo}}</h1>
            <h3>{{Autor}}</h3>
        </div>
        <div class="InformacionPublicidad">
            <div class="Informacion">
                <h1><br></h1>
                <p>{{Contenido}}</p>
            </div>

            <div class="Continuar">
                <button class="btnAdd2" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                        class="text">Lps</span><span>Comprar</span></button>
                <button class="btnAdd2" role="button" onclick="Visualizar({{ID}})"><span id="txtFav"
                        class="text">❤️</span><span>Favoritos</span></button>
            </div>
        </div>
    </div>
</section>
{{endfor CinesPublicidad}}

<section class="ContenedorSeccionSeparador" id="recentpopulares">
    <p>Peliculas Recientes Populares</p>
</section>

{{foreach CinesPublicidad2}}
<section class="ContenedorVista Animado">
    <div class="Fondo">
        <img src="{{Imagen64}}" class="imgContenedorVista" alt="">
        <div class="Titulo">
            <h1>{{Titulo}}</h1>
            <h3>{{Autor}}</h3>
        </div>
        <div class="InformacionPublicidad">
            <div class="Informacion">
            <h1><br></h1>
                <p>{{Contenido}}</p>
            </div>

            <div class="Continuar">
                <button class="btnAdd2" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                        class="text">Lps</span><span>Comprar</span></button>
                <button class="btnAdd2" role="button" onclick="Visualizar({{ID}})"><span id="txtFav"
                        class="text">❤️</span><span>Favoritos</span></button>
            </div>
        </div>
    </div>
</section>
{{endfor CinesPublicidad2}}

<section class="ContenedorSeccionSeparador">
    <p>Lo mejor de Star Wars</p>
</section>

<section class="ContenedorPrincipalPortada3 Animado">
    <div class="imgPortada3"><img src="/{{BASE_DIR}}/public/imgs/starwars.jpg"></div>

    <div class="ContenidoPortada4">
        <h1>Star Wars</h1>
        <input type="button" id="btnManga" onclick="Seccion3()" value="Descubrir Más">
    </div>

    <div class="ContenidoLibs">
        {{foreach CinesMangas2}}
        <div class="boxPopsAni">
            <div class="img256" style="background-image: url({{Imagen64}})"></div>
            <button class="btnAdd2" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                    class="text">Lps</span><span>Comprar</span></button>
            <button class="btnAdd" role="button" onclick="Visualizar({{ID}})"><span
                class="text">❤️</span><span>Favoritos</span></button>
            <button class="btnAdd2" role="button"
                onclick="OpenModal('{{Titulo}}', '{{Contenido}}', '{{Autor}}', '{{Genero}}', '{{Idioma}}', '{{Fecha}}', '{{Precio}}', {{ID}})"><span
                    class="text">→</span><span>Detalles</span></button>
        </div>
        {{endfor CinesMangas2}}
    </div>

    <div class="ContenidoPortadaLib">
        {{foreach CinesMangas}}
        <div class="boxPopsAni">
            <div class="img256" style="background-image: url({{Imagen64}})"></div>

            <button class="btnAdd2" role="button" onclick="Agregar( '{{Titulo}}',{{ID}})"><span
                    class="text">Lps</span><span>Comprar</span></button>
            <button class="btnAdd2" role="button" onclick="Visualizar({{ID}})"><span
                    class="text">❤️</span><span>Favoritos</span></button>
            <button class="btnAdd3" role="button"
                onclick="OpenModal('{{Titulo}}', '{{Contenido}}', '{{Autor}}', '{{Genero}}', '{{Idioma}}', '{{Fecha}}', '{{Precio}}', {{ID}})"><span
                    class="text">→</span><span>Detalles</span></button>
        </div>
        {{endfor CinesMangas}}
    </div>
</section>

