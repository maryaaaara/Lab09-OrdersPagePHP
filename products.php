<?php
$page='Products';

include 'includes/products.php';

$search = $_GET['search'] ?? "";
$products = getFilteredProducts($search);
?>

<!doctype html>
<html lang="en">
  <?php
    include 'includes/head.php';
  ?>
  <body>
  <?php
    include 'includes/nav.php';
  ?> 

<div class="container-fluid">
  <div class="row">
   <?php
    include 'includes/sidebar.php';
  ?> 

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>        
      </div>

      <!-- search bar or something -->
      <div class="col6">
        <form method="GET">
          <div class="form-row">
            <div class="form-group">
              <label for="code">Search</label>
              <input type="text" class="form-control" id="productcode" name="search">
              <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Code</th>
              <th>Name</th>              
              <th>Price</th>
              <th>Stocks</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>            
          
          <?php
            $counter = 1;
            foreach($products as $product) {
          ?>

            <tr>
              <td><?=$counter?></td>
              <td><?=$product['p_code']?></td>
              <td><?=$product['p_descript']?></td>
              <td><?=number_format($product['p_price'], 2)?></td>
              <td><?=$product['p_qoh']?></td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>

          <?php    
            $counter += 1;
            }
          ?>

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>