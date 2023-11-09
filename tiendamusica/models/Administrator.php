<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class Administrator extends db{
	
	private function view_users(){
		

		try {
			$SQL = "SELECT * FROM tbl_producto";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_users(){
		return $this->view_users();
	}

	private function register_users($data){
		

		try {
			
			$SQL = 'INSERT INTO tbl_producto (Descripcion_user,	Categoria_user,Precio_user,IdProveedor_user,NomProveedor_user,unidades_user,PresioTotal_user) VALUES (?,?,?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									
									$data['nameComercial'],
									$data['rfc'],
									$data['nameSocial'],
									$data['tipoProducto'],
									$data['direccion'],
									$data['telefono'],
									$data['correo']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(register_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_user($data){
		$this->register_users($data);
	}

	private function update_user($data){
		try {
			$SQL = 'UPDATE tbl_producto SET  Descripcion_user = ?, Categoria_user = ?, Precio_user	 = ?, IdProveedor_user	 = ?, NomProveedor_user = ?, unidades_user = ?, PresioTotal_user = ? WHERE id_user = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
								
									$data['nameComercial'],
									$data['rfc'],
									$data['nameSocial'],
									$data['tipoProducto'],
									$data['direccion'],
									$data['telefono'],
									$data['correo'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_user($data){
		$this->update_user($data);
	}

	private function delete_user($id){
		try {
			$SQL = 'DELETE FROM tbl_producto WHERE id_user = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_user($id){
		$this->delete_user($id);
	}	
}
?>