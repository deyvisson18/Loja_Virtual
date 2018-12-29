<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>

<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Loja Virtual</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="adicionar.php" class="waves-effect waves-light btn">Adicionar Produtos</a></li>
        <li><a class="waves-effect waves-light btn">Listar Produtos</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="adicionar.php">Adicionar Produtos</a></li>
    <li><a href="index.php">Listar Produtos</a></li>
  </ul>

<div class="row">
	<div class="col s12 m8 push-m2">
		<h3 class="light"> Produtos </h3>
		<table class="striped">
	
			<thead>
				<tr>
					<th>Nome:</th>
					<th>Descrição:</th>
					<th>Email:</th>
					<th>Preço:</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM clientes";
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['descricao']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['preco']; ?></td>
					<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['id']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse produto?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


				</tr>
			   <?php 
				endwhile;
				else: ?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
		<br>
	<!--	<a href="adicionar.php" class="btn">Adicionar Produtos</a> -->
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

