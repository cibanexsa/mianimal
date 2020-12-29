<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Laravel 8 con Ajax</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Animales</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mantenimiento
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Propietarios</a></li>
                  <li><a class="dropdown-item" href="#">Medicos</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Citas</a></li>
                </ul>
              </li>
 
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de Animales</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo Animal</a>
            </li>
      
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3>Lista de Animales</h3>    

                <table id="tabla-animal" class="table table-hover">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>ESPECIE</td>
                        <td>GENERO</td>
                        <td>ACCIONES</td>
                    </thead>

                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3>Nuevo  Animal</h3>

                <form id="registro-animal">
                  @csrf
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Especie</label>
                    <select class="form-control" id="selEspecie" nombre="selEspecie">
                      <option selected>Seleccionar especie</option>
                      <option value="Gato">Gato</option>
                      <option value="Perro">Perro</option>
                      <option value="Ave">Ave</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Genero</label>
                  </div>

                  <div class="form-check">
                    <input class="custom-control-input" type="radio" id="rbGeneroMacho" name="rbGenero" value="Macho" >
                    <label>
                      Macho
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="custom-control-input" type="radio" id="rbGeneroHembra" name="rbGenero" value="Hembra" >
                    <label>
                      Hembra
                    </label>
                  </div>

                  <button type="submit" class="btn btn-primary">Registrar</button>
                </form>

            </div>
          </div>

<!-- Modal para editar datos-->
<!-- Modal -->
<div class="modal fade" id="animal_edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar animal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form id="animal_edit_form">
          @csrf
          <input type="hidden" id="txtIdEdit" name="txtIdEdit">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Nombre</label>
            <input type="text" class="form-control" id="txtNombreEdit" name="txtNombreEdit">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Especie</label>
            <select class="form-control" id="selEspecieEdit" nombre="selEspecieEdit">
              <option selected>Seleccionar especie</option>
              <option value="Gato">Gato</option>
              <option value="Perro">Perro</option>
              <option value="Ave">Ave</option>
              <option value="Otros">Otros</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Genero</label>
          </div>

          <div class="form-check">
            <input class="custom-control-input" type="radio" id="rbGeneroMachoEdit" name="rbGeneroEdit" value="Macho" >
            <label>
              Macho
            </label>
          </div>
          <div class="form-check">
            <input class="custom-control-input" type="radio" id="rbGeneroHembraEdit" name="rbGeneroEdit" value="Hembra" >
            <label>
              Hembra
            </label>
          </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Modal eliminar-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
      </div><!-- fin container -->

<script>
    $(document).ready(function(){
        var tablaAnimal = $('#tabla-animal').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url: "{{ route('animal.index') }}",
            },
            columns:[
                {data: 'id'},
                {data: 'nombre'},
                {data: 'especie'},
                {data: 'genero'},
                {data: 'action', orderable: false}
            ]
        });
    });
</script>


<script>
  $('#registro-animal').submit(function(e){
    e.preventDefault();
    var nombre = $('#txtNombre').val();
    var especie = $('#selEspecie').val();
    var genero = $("input[name='rbGenero']:checked").val();
    var _token = $("input[name=_token]").val();

    $.ajax({
      url: "{{ route('animal.registrar') }}",
      type: "POST",
      data: {
        nombre: nombre,
        especie: especie,
        genero: genero, 
        _token: _token
      },
      success:function(response){
        if(response){
          $('#registro-animal')[0].reset();
          toastr.success('El registro se ingresó correctamente', 'Nuevo Registro', {timeOut:3000});
          $('#tabla-animal').DataTable().ajax.reload();
        }
      }
    });

  });
  
</script>

<script>
  var ani_id;

  $(document).on('click', '.delete', function(){
    ani_id = $(this).attr('id');

    $('#confirmModal').modal('show');
  });

  $('#btnEliminar').click(function(){
    $.ajax({
      url: "animal/eliminar/"+ani_id,
      beforeSend:function(){
        $('#btnEliminar').text('Eliminando...');
      },
      success:function(data){
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          toastr.warning('El registro se eliminó correctamente', 'Eliminar Registro', {timeOut:3000});
          $('#tabla-animal').DataTable().ajax.reload();

        }, 2000);
      }
    });
  });

</script>


<script>
  function editarAnimal(id){
    $.get('animal/editar/'+id, function(animal){
      //asignar los datos a la ventana modal
      $('#txtIdEdit').val(animal[0].id);
      $('#txtNombreEdit').val(animal[0].nombre);
      $('#selEspecieEdit').val(animal[0].especie);
      $('#rbGeneroEdit').val(animal[0].genero);
      if(animal[0].genero == "Macho"){
        $('input[name=rbGeneroEdit][value="Macho"]').prop('checked', true);
      }else{
        $('input[name=rbGeneroEdit][value="Hembra"]').prop('checked', true);
      }

      $("input[name=_token]").val();
      $('#animal_edit_modal').modal('toggle');
    });
  }
</script>


<script>

  $('#animal_edit_form').submit(function(e){
    e.preventDefault();

    var idEdit = $('#txtIdEdit').val();
    var nombreEdit = $('#txtNombreEdit').val();
    var especieEdit = $('#selEspecieEdit').val();
    var generoEdit = $("input[name='rbGeneroEdit']:checked").val();
    var _tokenEdit = $("input[name=_token]").val();

    $.ajax({
      url: "{{ route('animal.actualizar') }}",
      type: "POST",
      data: {
        id: idEdit,
        nombre: nombreEdit,
        especie: especieEdit,
        genero: generoEdit, 
        _token: _tokenEdit
      },
      success:function(response){
        if(response){
          $('#animal_edit_modal').modal('hide');
         // $('#animal_edit_form')[0].reset();
          toastr.info('El registro se actualizó correctamente', 'Actualizar Registro', {timeOut:3000});
          $('#tabla-animal').DataTable().ajax.reload();
        }
      }
    });

  });

</script>
</body>
</html>