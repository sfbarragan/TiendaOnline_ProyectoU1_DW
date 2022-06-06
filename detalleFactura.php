<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Factura</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script>
</head>
<body>
<div class="row expanded">
  <main class="columns">
    <div class="inner-container">
    <header class="row align-center">
        <a class="button hollow secondary"><i class="ion ion-chevron-left"></i>Volver al Catálogo</a>
      </header>
    <section class="row align-center">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="">
              <img src="http://www.travelerie.com/wp-content/uploads/2014/04/PlaceholderLogoBlue.jpg" alt="Company Name" />
            </td>
            <td class="align-right">
              <h2>Detalle Factura</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hello, Philip Brooks.<br>
              Thank you for your order.
            </td>
            <td class="text-right">
              <span class="num">Order #00302</span><br>
              October 18, 2017
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Item Description</th>
                    <th class="qty">Quantity</th>
                    <th class="amt">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="item">
                    <td class="desc">Name or Description of item</td>
                    <td class="qty">1</td>
                    <td class="amt">$100.00</td>
                  </tr>
                </tbody>
              </table>
            </td> 
          </tr>
          <tr class="totals">
            <td></td>
            <td>
              <table>
                <tr class="subtotal">
                  <td class="num">Subtotal</td>
                  <td class="num">$100.00</td>
                </tr>
                <tr class="fees">
                  <td class="num">Shipping & Handling</td>
                  <td class="num">$0.00</td>
                </tr>
                <tr class="tax">
                  <td class="num">Tax (7%)</td>
                  <td class="num">$7.00</td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <td>$107.00</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        
        <section class="additional-info">
        <div class="row">
          <div class="columns">
            <h5>Billing Information</h5>
            <p>Philip Brooks<br>
              134 Madison Ave.<br>
              New York NY 00102<br>
              United States</p>
          </div>
          <div class="columns">
            <h5>Payment Information</h5>
            <p>Credit Card<br>
              Card Type: Visa<br>
              &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; 1234
              </p>
          </div>
        </div>
        </section>
      </div>
    </section>
    </div>
  </main>
</div>
</body>
</html>