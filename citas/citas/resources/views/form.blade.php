<h1>Agregar cita</h1>

<form action="api/citas/agregar" method="post">
  @csrf

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
  </div>

  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="tel" class="form-control" id="celular" name="celular" required>
  </div>

  <div class="form-group">
    <label for="correo">Correo electrónico</label>
    <input type="email" class="form-control" id="correo" name="correo" required>
  </div>

  <div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha" required>
  </div>

  <div class="form-group">
    <label for="hora">Hora</label>
    <input type="time" class="form-control" id="hora" name="hora" required>
  </div>

  <div class="form-group">
    <label for="paquete">Paquete</label>
    <select class="form-control" id="paquete" name="paquete" required>
      <option value="1">Paquete 1</option>
      <option value="2">Paquete 2</option>
      <option value="3">Paquete 3</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>