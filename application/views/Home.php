<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url("/assets/css/bootstrap.css") ?>">
	<title><?= $titulo ?></title>
</head>
<body>
	<section class="container">
		<h1 class="text-center my-5 h2">Upload de arquivos - Codeigniter 3</h1>
			<div class="row">
				<div class="col-md-6">
			<?php
				echo form_open_multipart("Home/Cadastrar");
				echo form_input(array(
					"id" => "nome",
					"name" => "nome",
					"placeholder" => "Nome do arquivo",
					"type" => "text",
					"class" => "form-control mb-2"
				));

				echo form_upload(array(
					"id" => "arquivo",
					"name" => "arquivo",
					"type" => "file",
				));

				echo form_button(array("content" => "Enviar","type" => "submit", "class" => "btn btn-primary mx-5"));

				echo form_close();
			?>
		<p class="alert-danger text-center lead mt-5"><?= $this->session->flashdata("falha") ?></p>
		<p class="alert-success text-center lead mt-5"><?= $this->session->flashdata("sucesso") ?></p>
		</div>
		
		<div class="col-md-6">
				<h2 class="text-center">Arquivos cadastrados</h2>
				<table class="table text-center">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome arquivo</th>
						</tr>
					</thead>
					<?php foreach($arquivos as $arquivo) { ?>
					<tr>
						<td><?= $arquivo['id'] ?></td>
						<td><?= $arquivo['nome'] ?></td>
					</tr>
					<?php } ?>
				</table>
		</div>

		
		</div>
	</section>

	
	
</body>
</html>