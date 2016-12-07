<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登入頁面</title>
  </head>
  <body>
    <a href="./sign">還沒註冊嗎?</a>
    <form action="logcheck.php" method="post">
         <input type="text" name="account" value="" placeholder="輸入帳號">
         <input type="password" name="password" value="" placeholder="輸入密碼">
         <input type="submit" name="" value="登入">
    </form>
    <?php if ($_GET['sig_suc']!=''): ?>
        <?php echo $_GET['sig_suc'] ?>
    <?php endif; ?>
    <?php if ($_GET['error']!=''): ?>
         <?php echo $_GET['error'] ?>
    <?php endif; ?>
  </body>
</html>
