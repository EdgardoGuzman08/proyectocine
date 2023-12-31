<section class="ContenedorCompras">
    <div class="Caja1">
        {{foreach CantidadCines}}
        <p>Peliculas Agregadas({{CantidadCines}})</p>
        {{endfor CantidadCines}}
    </div>
    <div class="Caja2">
        <a href="index.php?page=mnt-index">Añade peliculas a tu biblioteca</a>
        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" style="margin-right: 5%;" onclick="location.href='index.php?page=mnt-index'"><path d="m12 10-1.4-1.4L12.175 7H8V5h4.175l-1.6-1.6L12 2l4 4ZM7 22q-.825 0-1.412-.587Q5 20.825 5 20q0-.825.588-1.413Q6.175 18 7 18t1.412.587Q9 19.175 9 20q0 .825-.588 1.413Q7.825 22 7 22Zm10 0q-.825 0-1.412-.587Q15 20.825 15 20q0-.825.588-1.413Q16.175 18 17 18t1.413.587Q19 19.175 19 20q0 .825-.587 1.413Q17.825 22 17 22ZM1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.4 7.95q-.275.5-.738.775Q16.1 13 15.55 13H8.1L7 15h12v2H7q-1.125 0-1.713-.975-.587-.975-.037-1.975L6.6 11.6 3 4Z"/></svg>
    </div>
</section>

<section class="Detalle">
    <div class="BoxSvg">
        <p>Mis Peliculas</p>
        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48" onclick="MoverTotal()"><path d="M24 40 8 24l2.1-2.1 12.4 12.4V8h3v26.3l12.4-12.4L40 24Z"/></svg>
    </div>

    {{foreach CargarCines}}
    <div class="BoxDetalle">

        <div class="imgDetalle" style="background-image: url({{Imagen64}});"></div>
        <div class="BoxInformacion">
            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M10.5 20V7H5V4h14v3h-5.5v13Z" />
                </svg>
                <h3>Titulo</h3>
                <p>{{Titulo}}</p>
            </div>

            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M12 12q-1.65 0-2.825-1.175Q8 9.65 8 8q0-1.65 1.175-2.825Q10.35 4 12 4q1.65 0 2.825 1.175Q16 6.35 16 8q0 1.65-1.175 2.825Q13.65 12 12 12Zm-8 8v-2.8q0-.85.438-1.563.437-.712 1.162-1.087 1.55-.775 3.15-1.163Q10.35 13 12 13t3.25.387q1.6.388 3.15 1.163.725.375 1.162 1.087Q20 16.35 20 17.2V20Zm2-2h12v-.8q0-.275-.137-.5-.138-.225-.363-.35-1.35-.675-2.725-1.013Q13.4 15 12 15t-2.775.337Q7.85 15.675 6.5 16.35q-.225.125-.362.35-.138.225-.138.5Zm6-8q.825 0 1.413-.588Q14 8.825 14 8t-.587-1.412Q12.825 6 12 6q-.825 0-1.412.588Q10 7.175 10 8t.588 1.412Q11.175 10 12 10Zm0-2Zm0 10Z" />
                </svg>
                <h3>Autor</h3>
                <p>{{Autor}}</p>
            </div>

            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="m11.9 22 4.55-12h2.1l4.55 12H21l-1.05-3.05H15.1L14 22Zm3.8-4.8h3.6l-1.75-4.95h-.1ZM4 19l-1.4-1.4 5.05-5.05q-.95-1.05-1.662-2.175Q5.275 9.25 4.75 8h2.1q.45.9.963 1.625.512.725 1.237 1.525 1.1-1.2 1.825-2.462Q11.6 7.425 12.1 6H1V4h7V2h2v2h7v2h-2.9q-.525 1.775-1.425 3.45-.9 1.675-2.225 3.15l2.4 2.45-.75 2.05L9 14Z" />
                </svg>
                <h3>Idioma</h3>
                <p>{{Idioma}}</p>
            </div>

            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M12 20q-1.2-.95-2.6-1.475Q8 18 6.5 18q-1.05 0-2.062.275-1.013.275-1.938.775-.525.275-1.012-.025Q1 18.725 1 18.15V6.1q0-.275.138-.525.137-.25.412-.375 1.15-.6 2.4-.9Q5.2 4 6.5 4q1.45 0 2.838.375Q10.725 4.75 12 5.5v12.1q1.275-.8 2.675-1.2 1.4-.4 2.825-.4.9 0 1.763.15.862.15 1.737.45v-12q.375.125.738.262.362.138.712.338.275.125.413.375.137.25.137.525v12.05q0 .575-.487.875-.488.3-1.013.025-.925-.5-1.938-.775Q18.55 18 17.5 18q-1.5 0-2.9.525T12 20Zm2-5V5.5l5-5v10Zm-4 1.625v-9.9q-.825-.35-1.712-.537Q7.4 6 6.5 6q-.925 0-1.8.175T3 6.7v9.925q.875-.325 1.738-.475Q5.6 16 6.5 16t1.762.15q.863.15 1.738.475Zm0 0v-9.9Z" />
                </svg>
                <h3>Genero</h3>
                <p>{{Genero}}</p>
            </div>
            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M14 13q-1.25 0-2.125-.875T11 10q0-1.25.875-2.125T14 7q1.25 0 2.125.875T17 10q0 1.25-.875 2.125T14 13Zm-7 3q-.825 0-1.412-.588Q5 14.825 5 14V6q0-.825.588-1.412Q6.175 4 7 4h14q.825 0 1.413.588Q23 5.175 23 6v8q0 .825-.587 1.412Q21.825 16 21 16Zm2-2h10q0-.825.587-1.413Q20.175 12 21 12V8q-.825 0-1.413-.588Q19 6.825 19 6H9q0 .825-.588 1.412Q7.825 8 7 8v4q.825 0 1.412.587Q9 13.175 9 14Zm11 6H3q-.825 0-1.412-.587Q1 18.825 1 18V7h2v11h17ZM7 14V6v8Z" />
                </svg>
                <h3>Precio</h3>
                <p>{{Precio}}</p>
            </div>

            <div class="Cajita">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M5 22q-.825 0-1.413-.587Q3 20.825 3 20V6q0-.825.587-1.412Q4.175 4 5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588Q21 5.175 21 6v14q0 .825-.587 1.413Q19.825 22 19 22Zm0-2h14V10H5v10ZM5 8h14V6H5Zm0 0V6v2Zm7 6q-.425 0-.712-.288Q11 13.425 11 13t.288-.713Q11.575 12 12 12t.713.287Q13 12.575 13 13t-.287.712Q12.425 14 12 14Zm-4 0q-.425 0-.713-.288Q7 13.425 7 13t.287-.713Q7.575 12 8 12t.713.287Q9 12.575 9 13t-.287.712Q8.425 14 8 14Zm8 0q-.425 0-.712-.288Q15 13.425 15 13t.288-.713Q15.575 12 16 12t.712.287Q17 12.575 17 13t-.288.712Q16.425 14 16 14Zm-4 4q-.425 0-.712-.288Q11 17.425 11 17t.288-.712Q11.575 16 12 16t.713.288Q13 16.575 13 17t-.287.712Q12.425 18 12 18Zm-4 0q-.425 0-.713-.288Q7 17.425 7 17t.287-.712Q7.575 16 8 16t.713.288Q9 16.575 9 17t-.287.712Q8.425 18 8 18Zm8 0q-.425 0-.712-.288Q15 17.425 15 17t.288-.712Q15.575 16 16 16t.712.288Q17 16.575 17 17t-.288.712Q16.425 18 16 18Z" />
                </svg>
                <h3>Publicación</h3>
                <p id="txtPublicacion">{{Fecha}}</p>
            </div>            
        </div>
        <div class="OpcionesBox">
            <label for="Leer">Ver Pelicula</label>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48" onclick="VisorPDF()"><path d="M24 40q-2.4-1.9-5.2-2.95Q16 36 13 36q-2.1 0-4.125.55T5 38.1q-1.05.55-2.025-.05Q2 37.45 2 36.3V12.2q0-.55.275-1.05t.825-.75q2.3-1.2 4.8-1.8Q10.4 8 13 8q2.9 0 5.675.75T24 11v25.3q2.55-1.65 5.35-2.475Q32.15 33 35 33q1.8 0 3.925.35T43 34.8V9.55q.5.2.975.4t.925.45q.5.3.8.775.3.475.3 1.025v24.1q0 1.15-.975 1.75-.975.6-2.025.05-1.85-1-3.875-1.55T35 36q-3 0-5.8 1.05T24 40Zm3-8.35V14L40 1v19.35Zm-6 3.15V12.85q-1.7-.95-3.95-1.4Q14.8 11 13 11q-2.35 0-4.375.5T5 12.8v22q1.75-.85 3.775-1.325T13.05 33q2.2 0 4.2.475T21 34.8Zm0 0V12.85Z"/></svg>
            <label for="Leer">Descargar Pelicula</label>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M21.8 43.9q-3.8-.4-7.05-2.1-3.25-1.7-5.625-4.4T5.4 31.25q-1.35-3.45-1.35-7.3 0-7.75 5.075-13.45Q14.2 4.8 21.85 4v3q-6.4.95-10.6 5.75-4.2 4.8-4.2 11.2 0 6.4 4.175 11.2Q15.4 39.95 21.8 40.9ZM24 34 14 24l2.15-2.15 6.35 6.35V14h3v14.2l6.35-6.35L34 24Zm2.2 9.9v-3q2.3-.3 4.425-1.175T34.55 37.4l2.2 2.2q-2.3 1.75-4.975 2.9T26.2 43.9Zm8.4-33.35q-1.9-1.35-4-2.275Q28.5 7.35 26.2 7V4q2.9.35 5.55 1.475t5 2.875Zm5 25.95-2.15-2.1q1.45-1.85 2.3-3.975Q40.6 28.3 40.9 26h3.05q-.35 2.9-1.45 5.575-1.1 2.675-2.9 4.925Zm1.3-14.6q-.3-2.3-1.15-4.45-.85-2.15-2.3-3.95l2.35-2.05q1.75 2.3 2.8 4.95 1.05 2.65 1.35 5.5Z"/></svg>
        </div>        
    </div>
    {{endfor CargarCines}}
</section>