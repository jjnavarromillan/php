
<link rel="stylesheet" type="text/css" href="menu-categorias.css" />
<link rel="stylesheet" type="text/css" href="carrito/menu-categorias.css" />


<div id="divContMenCategorias">
  <div class="tipoMenPriCategorias" id="divEstMenCategorias">Estación</div>
  <div id="divComEstMenCategorias">
    <label>
      <select class="combitoMenCategorias" name="combo" id="combo" onclick="cargarCombosFiltro(this.value)">
</select>
    </label>
  </div>
  <div class="tipoMenPriCategorias" id="divTipMenCategorias">Tipo</div>
  <div id="divComTipMenCategorias">
    <label>
      <select class="combitoMenCategorias" name="select3" id="select3">
        <option value="Zapatilla">Zapatilla</option>
        <option value="Bota">Bota</option>
        <option value="Flats">Flats</option>
        <option value="Balerinas">Balerinas</option>
        <option value="Tennis">Tennis</option>
      </select>
    </label>
  </div>
  <div class="tipoMenPriCategorias" id="divMatMenCategorias">Materiales</div>
  <div id="divComMatMenCategorias">
    <label>
      <select class="combitoMenCategorias" name="comboMateriales" id="comboMateriales">
        <option value="Africa">Africa</option>
        <option value="Daytona">Daytona</option>
        <option value="Suede">Suede</option>
        <option value="New Lino">New Lino</option>
      </select>
    </label>
  </div>
  <div class="tipoMenPriCategorias" id="divColMenCategorias">Colores</div>
  <div id="divComColMenColores">
    <label>
      <select  class="combitoMenCategorias" name="comboColores" id="comboColores">
        <option value="Amarillos">Amarillos</option>
        <option value="Azules">Azules</option>
        <option value="Blancos">Blancos</option>
        <option value="Negros">Negros</option>
        <option value="Metalicos">Metalicos</option>
      </select>
    </label>
  </div>
  <div class="tipoMenPriCategorias" id="divLinMenCategorias">Lineas</div>
  <div id="divComLinMenCategorias">
    <label>
      <select  class="combitoMenCategorias" name="comboLineasFiltro" id="comboLineasFiltro" onchange="llena_combo_materiales(this.value,document.getElementById('comboPlantillas').value);llena_combo_colores(this.value,document.getElementById('comboPlantillas').value);llena_combo_estilo(this.value,document.getElementById('comboPlantillas').value);">
        <option value="Melissa">Melissa</option>
        <option value="Fashion">Fashion</option>
        <option value="Madrid">Madrid</option>
      </select>
    </label>
  </div>
  <div id="divBtnMenuCategoriasBuscar">Buscar</div>
</div>

