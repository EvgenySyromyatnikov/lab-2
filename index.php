<?php
  require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Лента заметок</title>
</head>
<body>

  <div class="container">
		<div class="row">
			<div class="col mt-1">
				<button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></button>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>№</th>
							<th>Название заметки</th>
							<th>Подробное описание заметки</th>
              <th>Действия</th>
						</tr>
            <?php
              $items = mysqli_query($connect, "SELECT * FROM `items`");
              $items = mysqli_fetch_all($items);
              $items=array_reverse($items);
              $val = 0;
              foreach($items as $item) {
                  if ($val > 99) {break; }
                  $val = ++$val;
                ?>
                  <tr>
                    <td><?= $item[0] ?></td>
                    <td><?= $item[1] ?></td>
                    <td><textarea class="form-control" aria-label="With textarea"name="description" readonly="readonly"><?= $item[3] ?></textarea></td>
                    <td>
                        <a href="like.php?id=<?= $item[0] ?>" class="btn btn-danger btn-sm" data-toggle="" data-target=""><?= $item[2] ?>  <i class="fa fa-heart"></i></a>
                        <a href="item.php?id=<?= $item[0] ?>" class="btn btn-success btn-sm" data-toggle="" data-target=""><i class="fa fa-align-justify"></i></a>
                      <a href="update.php?id=<?= $item[0] ?>" class="btn btn-success btn-sm" data-toggle="" data-target=""><i class="fa fa-edit"></i></a>
                      <a href="vendor/delete.php?id=<?= $item[0] ?>" class="btn btn-danger btn-sm" data-toggle="" data-target=""><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
              }
            ?>
					</thead>
				</table>

			</div>
		</div>
	</div>

  <!-- Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="Modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title">Добавить Заметку</h5>
        </div>
        <div class="modal-body">
          <form action="vendor/create.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Название">
            </div>
            <div class="form-group">
               <textarea class="form-control" aria-label="With textarea"name="description" placeholder="Описание"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
          <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
        </div>
        </form>
      </div>
    </div>
  </div>







  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
