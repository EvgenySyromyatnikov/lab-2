<?php
  require_once 'config/connect.php';
  $item_id = $_GET['id'];
  $item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id`='$item_id'");
  $item = mysqli_fetch_assoc($item);
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
  <title>Просмотр заметки</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col mt-1">
        <table class="table shadow ">
          <thead class="thead-dark">
            <a class="btn btn-primary" href="/" role="button">Главная</a>

                  <tr>
                    <td><h3>Название заметки:</h3><?= $item['title'] ?></td>
                  </tr>
                  <tr>
                    <td>  <h3>Описание заметки:</h3>   <textarea class="form-control" aria-label="With textarea"name="description"readonly="readonly" ><?= $item['description'] ?></textarea></td>
                  </tr>
                  <tr>
                    <td><h3>Добавить комментарий</h3>  </td>
                  </tr>
                  <tr>
                    <td><form action="vendor/create_comment.php" method="post" style="padding-left:2px;">
                      <input type="hidden" name="id" value="<?= $item['id'] ?>">
                      <div class="form-group">
                         <textarea class="form-control" aria-label="With textarea"name="comment" placeholder="Комментарий"></textarea>
                      </div>
                      <button type="submit">Отправить</button>
                    </form></td>
                  </tr>
                  <tr>
                    <td>  <h3>Комментарии</h3>  </td>
                  </tr>
                  <tr>
                    <td>  <ul>
                        <?php
                          $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `items_id`='$item_id'");
                          $comments = mysqli_fetch_all($comments);
                          foreach($comments as $comment) {
                            ?>
                              <li><?= $comment[2] ?></li>
                            <?php
                          }
                        ?>
                      </ul>    </td>
                  </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
