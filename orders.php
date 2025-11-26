<?php
$page='Orders';

include 'includes/orders.php';

$orders = getAllOrders();
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
        <h1 class="h2">Orders</h1>        
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Date</th>              
              <th>Sub Total</th>
              <th>Tax</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>            
          
          <?php
            $counter = 1;
            foreach($orders as $order) {
            
            // customer name
            $firstName = $order['cus_fname'];
            $lastName = $order['cus_lname'];
            $initial = $order['cus_initial'];

            if ($initial) {
                $initial = $initial . ". ";
            }

            $customerName = $firstName . " " . $initial . " " . $lastName;

            // date
            $date = strtotime($order['inv_date']);
            $subTotal = $order['inv_subtotal'];
            $tax = $order['inv_tax'];
            $total = $order['inv_total'];
          ?>

            <tr>
              <td><?=$counter?></td>
              <td><?=$customerName?></td>
              <td><?=strtoupper(date('d M Y', $date))?></td>
              <td><?=number_format($subTotal, 2)?></td>
              <td><?=number_format($tax, 2)?></td>
              <td><?=number_format($total, 2)?></td>
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