<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>註冊頁面</title>
    <?php require_once "../../method/bootstrap.html" ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="" action="add.php" method="post">
            <div class="input-group">
              <span class="input-group-addon">@</span>
              <input type="mail" name="mail" value="" placeholder="輸入註冊信箱">
            </div>
            <div class="input-group">
              <input type="text" name="password" value=""panel placeholder="輸入密碼">
            </div>
            <div class="input-group">
              <input type="password" name="pwcheck" value=""panel placeholder="再次輸入密碼">
            </div>
            <div class="input-group">
              <span class="glyphicon glyphicon-user" aria-hidden = "ture"></span>
              <input type="text" name="name" value="" placeholder="輸入姓名">
            </div>
            <div class="input-group">
              <span class="glyphicon glyphicon-phone" aria-hidden = "ture"></span>
              <input type="text" name="phone" value="" onkeyup="value=value.replace(/[^\d]/g,'') "  placeholder="輸入電話">
            </div>
            <div class="input-group">
              <span class="glyphicon glyphicon-home" aria-hidden = "ture"></span>
              <input type="text" name="addr" value="" placeholder="輸入地址">
            </div>
             <button type="submit" class = "btn btn-primary " name="button" >註冊</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
