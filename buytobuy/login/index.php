<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登入頁面</title>
    <?php require_once "../method/bootstrap.html" ?>
  </head>
  <body >
    <div class="container">
      <div class="row">
       <div class="col-md-6 col-md-offset-3" >
         <form class="form-signin" role="form" action="logcheck.php" method="post">
           <h2 class="form-signin-heading">Please sign in</h2>
           <label for="inputEmail" class="sr-only">Email address</label>
           <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""  name="account">
           <label for="inputPassword" class="sr-only">Password</label>
           <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
           <div class="checkbox"><label>
              <a href="./sign">還沒註冊嗎?</a>
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
       </div>
      </div>
   </div>
    <?php if ($_GET['sig_suc']!=''): ?>
        <?php echo $_GET['sig_suc'] ?>
    <?php endif; ?>
    <?php if ($_GET['error']!=''): ?>
         <?php echo $_GET['error'] ?>
    <?php endif; ?>
  </body>
</html>
