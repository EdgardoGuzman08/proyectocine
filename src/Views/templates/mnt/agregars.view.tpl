<h1>Gestión de Pelicula</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Autor</th>
        <th>Genero</th>
        <th>Idioma</th>
        <th>Precio</th>
        <th>PublicidadEspecial</th>
        <th>
          {{if new_enabled}}
          <button id="btnAgregar">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody>
      {{foreach agregars}}
      <tr>
        <td>{{ID}}</td>
        <td><a href="index.php?page=mnt_agregar&mode=DSP&ID={{ID}}">{{Titulo}}</a></td>
        <td>{{Fecha}}</td>
        <td>{{Autor}}</td>
        <td>{{Genero}}</td>
        <td>{{Idioma}}</td>
        <td>{{Precio}}</td>
        <td>{{PublicidadEspecial}}</td>
        <td>
          {{if ~edit_enabled}}
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_agregar"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="ID" value={{ID}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_agregar"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="ID" value={{ID}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
        </td>
      </tr>
      {{endfor agregars}}
    </tbody>
  </table>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAgregar").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_agregar&mode=INS&ID=0");
      });
    });
</script>