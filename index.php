<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="CSS/base.css" />
    <link rel="stylesheet" href="CSS/boton_contacto.css" />
    <title>Inicio</title>
    <script src="JS/gallery.js"></script>
    <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
    <script src="JS/contacto.js"></script>
    <link rel="stylesheet" href="CSS/usuario.css">
  </head>

  <body>
    <div class="menu_container">
      <div class="menu">
        <pag-menu></pag-menu> 
      </div>
      
        <?php
          if (isset($_SESSION['nombre_cliente'])) {
            echo '<div class="usuario"><p>Bienvenido, '.$_SESSION['nombre_cliente'].'</p></div> ';
          }
        ?>
      
    </div>
    
    <template id="acordionGallery">
      <style>
        .gallery_conteiner {
          width: 1000px;
          height: 450px;
          align-items: center;
          justify-content: center;
          overflow: hidden;
          margin: 100px auto;
          box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
          -webkit-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
          -moz-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
        }

        .gallery_conteiner ul {
          width: 2000px;
        }

        .gallery_conteiner li {
          position: relative;
          display: block;
          width: 160px;
          float: left;
          border-left: 1px solid #888;
          box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
          -webkit-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
          -moz-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
          transition: all 0.5s;
          -webkit-transition: all 0.5s;
          -moz-transition: all 0.5s;
        }

        .gallery_conteiner ul:hover li {
          width: 40px;
        }

        .gallery_conteiner ul li:hover {
          width: 1040px;
        }

        .gallery_conteiner li img {
          display: block;
        }

        .image_title {
          font-family: "Franklin Gothic Medium", "Arial Narrow", Arial,
            sans-serif;
          background: rgba(0, 0, 0, 0.5);
          position: absolute;
          left: 0;
          bottom: 0;
          width: 1040px;
          margin-left: -40px;
        }

        .image_title a {
          display: block;
          color: #fff;
          text-decoration: none;
          padding: 20px;
          font-size: 20px;
        }

        .item {
          height: 450px;
          width: 1000px;
          object-fit: fill;
          margin-left: -40px;
        }
      </style>
      <section>
        <div class="gallery_conteiner">
          <ul>
            <li>
              <div class="image_title">
                <a href="#">Construye tu lugar Especial</a>
              </div>
              <a href="#">
                <img
                  src="img/gaming-setup-4.jpg"
                  alt="gaming-setup-4"
                  class="item"
                />
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Nvidia RTX 3090 Founders Edition</a>
              </div>
              <a href="#">
                <img src="img/rtx3090.jpg" alt="rtx3090" class="item" />
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Laptop Asus Zenbook</a>
              </div>
              <a href="#">
                <img
                  src="img/asus-zenbook.webp"
                  alt="asus-zenbook"
                  class="item"
                />
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Laptop Alienware M15</a>
              </div>
              <a href="#">
                <img
                  src="img/alienwarem15.jpg"
                  alt="alienwarem15"
                  class="item"
                />
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Laptop Lenovo Legion Y530</a>
              </div>
              <a href="#">
                <img
                  src="img/y530teaser.jpg"
                  alt="lenovo-legion-y530"
                  class="item"
                />
              </a>
            </li>
            <li>
              <div class="image_title">
                <a href="#">Laptop Asus G531</a>
              </div>
              <a href="#">
                <img
                  src="img/G531-1-780x405.webp"
                  alt="asus g531"
                  class="item"
                />
              </a>
            </li>
          </ul>
        </div>
      </section>
    </template>
    <acordion-gallery></acordion-gallery>
    <div class="texto">
      <p>Los mejores Productos solo los obtendras aqui</p>
      <p>Ofrecemos los productos m??s recientes y de mejor calidad</p>
    </div>

    <div class="btnContact" align="center">Productos</div>
    <section class="img">
      <style>
        figure {
          display: inline-block;
          background-color: var(--dark-color);
          color: white;
          text-align: center;
          margin-left: 15rem;
          border-radius: 20px;
          
        }
        img {
          width: 23rem;
          height: 18rem;
          box-shadow: rgba(255, 255, 255, 0.25) 0px 25px 50px -12px;
        }

        figcaption {
          display: block;
          text-align: center;
          font-size: 20px;
          font-weight: bold;
        }
      </style>
      <template id="template-img">
        <figure>
          <img />
          <figcaption></figcaption>
        </figure>
      </template>
    </section>
    <script src="JS/contenedor.js"></script>
    <button class="btnContact" onclick="showContact()">Contactanos</button>

    <template id="contacto">
      <style>
        h1 {
          text-align: center;
          color: #a8a8a8;
          text-shadow: 1px 1px 0 white;
        }

        form {
          max-width: 800px;
          text-align: center;
          margin: 20px auto;
        }
        form input,
        form textarea {
          border: 0;
          outline: 0;
          padding: 1em;
          -moz-border-radius: 8px;
          -webkit-border-radius: 8px;
          border-radius: 8px;
          display: block;
          width: 100%;
          margin-top: 1em;
          font-family: "Merriweather", sans-serif;
          -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
          -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
          resize: none;
        }
        form input:focus,
        form textarea:focus {
          -moz-box-shadow: 0 0px 2px #e74c3c !important;
          -webkit-box-shadow: 0 0px 2px #e74c3c !important;
          box-shadow: 0 0px 2px #e74c3c !important;
        }
        form #input-submit {
          color: white;
          background: #e74c3c;
          cursor: pointer;
        }
        form #input-submit:hover {
          -moz-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
          -webkit-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
          box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
        }
        form textarea {
          height: 126px;
        }

        .half {
          float: left;
          width: 45%;
          margin-bottom: 1em;
        }

        .right {
          width: 50%;
        }

        .left {
          margin-right: 5%;
        }

        @media (max-width: 480px) {
          .half {
            width: 100%;
            float: none;
            margin-bottom: 0;
          }
        }
        /* Clearfix */
        .cf:before,
        .cf:after {
          content: " ";
          /* 1 */
          display: table;
          /* 2 */
        }

        .cf:after {
          clear: both;
        }
      </style>
      <h1>Comunicate Con Nosotros</h1>
      <form class="cf">
        <div class="half left cf">
          <input type="text" id="input-name" placeholder="Name" />
          <input type="email" id="input-email" placeholder="Email address" />
          <input type="text" id="input-subject" placeholder="Subject" />
        </div>
        <div class="half right cf">
          <textarea
            name="message"
            type="text"
            id="input-message"
            placeholder="Message"
          ></textarea>
        </div>
        <input type="submit" value="Submit" id="input-submit" />
      </form>
    </template>
  </body>
  <pag-footer></pag-footer>
</html>
