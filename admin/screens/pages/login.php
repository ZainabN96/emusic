
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

 <?php
    include "../../includes/header.php";
    include "../../../class/cls_db.php";

    if(isset($_SESSION['admin']))
        header("location: home.php");

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'POST'){
      foreach($_POST as $name => $value)
        $$name=$value;

        authenticate($email, $password);
    }

 ?>
  <body class="bg-nav">
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <div class="row flex-center min-vh-100 py-6">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="d-flex flex-center mb-4 text-black">
                    <span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">𝐸-𝓂𝓊𝓈𝒾𝒸 𝒜𝒹𝓂𝒾𝓃</span>
                </div>
            <div class="card bg-custom">
              <div class="card-body p-4 p-sm-5">
                <div class="row text-left justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5>Log in</h5>
                    <p class="text-danger fs--1"><?php
                    if (isset($_GET['message'])){
                        echo $_GET['message'];} ?></p>
                  </div>
                </div>
                <form action="" method="post">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Email address" name="email" />
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password"  name="password" />
                  </div>
                  <div class="form-group">
                    <button class="btn bg-nav btn-block mt-3" type="submit" name="submit">Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
