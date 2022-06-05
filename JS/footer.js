class Footer extends HTMLElement{
    constructor(){
        super();
    }
    connectedCallback(){
        this.innerHTML=`
        <style>
        .main-footer {
          background: #282828;
          color: #828282;
        }

        .main-footer .container {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
        }

        .footer__title {
          font-size: 22px;
          color: white;
          text-transform: uppercase;
        }

        .column--50-25 {
          width: 48%;
          padding: 20px;
        }

        .footer__txt .fa-twitter {
          color: #3bbef5;
          margin-right: 5px;
        }

        .footer__link {
          color: #3498db;
        }

        .social-icon {
          display: flex;
          align-items: center;
          margin-bottom: 20px;
        }

        .social-icon i {
          margin-right: 10px;
          width: 35px;
          height: 35px;
          text-align: center;
          color: white;
          padding: 10px;
          border-radius: 50%;
        }

        .social-icon .fa-facebook-f {
          background: #3b5998;
        }

        .social-icon .fa-twitter {
          background: #3bbef5;
        }

        .social-icon .fa-pinterest {
          background: #e23139;
        }

        .social__link {
          display: block;
          text-decoration: none;
          color: #828282;
        }

        .contact-icon {
          display: flex;
          align-items: center;
        }

        .contact-icon .fas {
          color: white;
          display: block;
          margin-right: 10px;
        }
        .copy {
          background: #211e1e;
          padding: 15px;
          color: white;
          text-align: center;
          width: 98%;
        }
        .column--50-25 {
          width: 24%;
        }
      </style>
      <footer class="main-footer">
        <div class="container">
          <div class="column column--50-25">
            <h2 class="footer__title">ESPE Tecnologies 👨‍💻👩‍💻</h2>
            <p class="footer__txt">
              ESPE Tecnologies es una tienda de tecnologia con componentes de
              alta gama de las mejores marcas del mundo
            </p>
            <cite class="footer__author"> ESPE Tecnologies </cite>
          </div>
          <div class="column column--50-25">
            <h2 class="footer__title">Connect</h2>
            <div class="footer__socials">
              <div class="social-icon">
                <i class="fab fa-facebook-f"></i>
                <a class="social__link" href="">Like us on Facebook</a>
              </div>
              <div class="social-icon">
                <i class="fab fa-twitter"></i>
                <a class="social__link" href="">Like us on Twiter</a>
              </div>
              <div class="social-icon">
                <i class="fab fa-pinterest"></i>
                <a class="social__link" href="">Follow us on Instagram</a>
              </div>
            </div>
          </div>
          <div class="column column--50-25">
            <h2 class="footer__title">Contact</h2>
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
              <p class="contact__txt">ESPE TECNOLOGIES</p>
            </div>
            <div class="contact-icon">
              <i class="fas fa-phone-alt"></i>
              <p class="contact__txt">0992113464</p>
            </div>
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
              <p class="contact__txt">espetec@gmail.com</p>
            </div>
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
          </div>
        </div>
        <p class="copy">
          © 2022 ESPE TECNOLOGIES | Design by
          <span class="color-span"> ESPE Tecnologies </span>
        </p>
      </footer>
        `
    }
}
window.customElements.define('pag-footer',Footer)
