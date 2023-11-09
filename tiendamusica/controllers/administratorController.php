<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_users(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>ID</th>
				<th>Descripcion</th>
				<th>Categoria</th>
				<th>Precio</th>
				<th>ID Proveedor</th>
				<th>Nombre Proveedor</th>
				<th>Unidades</th>
				<th>precio total</th>
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_users()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_user; ?> </td>
			<td><?php echo $data->Descripcion_user; ?> </td>
			<td><?php echo $data->Categoria_user; ?> </td>
			<td><?php echo $data->Precio_user; ?> </td>
			<td><?php echo $data->IdProveedor_user; ?> </td>
			<td><?php echo $data->NomProveedor_user; ?> </td>
			<td><?php echo $data->unidades_user; ?> </td>
			<td><?php echo $data->PresioTotal_user; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Seleccionar <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdate('<?php echo $data->id_user; ?>','<?php echo $data->Descripcion_user; ?>','<?php echo $data->Categoria_user; ?> ','<?php echo $data->Precio_user; ?> ','<?php echo $data->IdProveedor_user; ?>','<?php echo $data->NomProveedor_user; ?>','<?php echo $data->unidades_user; ?>','<?php echo $data->PresioTotal_user; ?>');">Actualizar</a></li>
			      <li><a href="#" onclick="deleteUser('<?php echo $data->id_user; ?>');">Borrar</a></li>
			    </ul>
			  </div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>	
	<?php	
    }
    
	function deleteuser(){		
			parent::set_delete_user($_REQUEST['id']);		
    }

	function registeruser(){
		$data = array(
					
					'nameComercial' 	=> $_REQUEST['nameComercial'],
					'rfc'				=> $_REQUEST['rfc'],
					'nameSocial'		=> $_REQUEST['nameSocial'],
					'tipoProducto'		=> $_REQUEST['tipoProducto'],
					'direccion'			=> $_REQUEST['direccion'],
					'telefono'			=> $_REQUEST['telefono'],
					'correo'			=> $_REQUEST['correo']
					);		
					parent::set_register_user($data);		
    }    
    
	function updateuser(){
		$data = array(
					'id'				=> $_REQUEST['id'],
					'nameComercial'		=> $_REQUEST['nameComercial'],
					'rfc'				=> $_REQUEST['rfc'],
					'nameSocial'		=> $_REQUEST['nameSocial'],
					'tipoProducto'		=> $_REQUEST['tipoProducto'],
					'direccion'			=> $_REQUEST['direccion'],
					'telefono'			=> $_REQUEST['telefono'],
					'correo'			=> $_REQUEST['correo']
					);		
			parent::set_update_user($data);		
	}    
    
}

