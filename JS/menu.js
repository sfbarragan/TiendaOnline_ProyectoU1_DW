class Menu extends HTMLElement{
    constructor(){
        super();
    }
    connectedCallback(){
    
        this.innerHTML =`
        <style>
        .menu {
          display: flex;
          justify-content: center;
          align-items: center;
          max-width: 720px;
          margin: 0 auto;
          height: 200px;
          list-style: none;
        }

        .menu li {
          width: 125px;
          height: 50px;
          transition: background-position-x 0.9s linear;
          text-align: center;
        }
        .menu li a {
          font-size: 22px;
          color: #777;
          text-decoration: none;
          transition: all 0.45s;
        }
        .menu li:hover {
          background: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEi%0D%0AIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhs%0D%0AaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB3aWR0%0D%0AaD0iMzkwcHgiIGhlaWdodD0iNTBweCIgdmlld0JveD0iMCAwIDM5MCA1MCIgZW5hYmxlLWJhY2tn%0D%0Acm91bmQ9Im5ldyAwIDAgMzkwIDUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHBhdGggZmlsbD0i%0D%0Abm9uZSIgc3Ryb2tlPSIjZDk0ZjVjIiBzdHJva2Utd2lkdGg9IjEuNSIgc3Ryb2tlLW1pdGVybGlt%0D%0AaXQ9IjEwIiBkPSJNMCw0Ny41ODVjMCwwLDk3LjUsMCwxMzAsMAoJYzEzLjc1LDAsMjguNzQtMzgu%0D%0ANzc4LDQ2LjE2OC0xOS40MTZDMTkyLjY2OSw0Ni41LDI0My42MDMsNDcuNTg1LDI2MCw0Ny41ODVj%0D%0AMzEuODIxLDAsMTMwLDAsMTMwLDAiLz4KPC9zdmc+Cg==");
          -webkit-animation: line 1s;
          animation: line 1s;
        }
        .menu li:hover a {
          color: #d94f5c;
        }
        .menu li:not(:last-child) {
          margin-right: 30px;
        }
          
        .men li a{
          font-size: 22px;
          color: #777;
          text-decoration: none;
          transition: all 0.45s;
        }

        .men > li {
          float: left;
        }

        .men li ul {
          display: none;
          position: absolute;
          min-width: 140px;

        }

        .men li:hover > ul {
          display: block;

        }
        ul, ol{
          list-style: none;
          }
      @-webkit-keyframes line {
          0% {
            background-position-x: 390px;
          }
        }

      @keyframes line {
          0% {
            background-position-x: 390px;
          }
        }
      </style>

      <nav>
        <ul class="menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="catalogo.php">Catálogo</a></li>
          <li><a href="nosotros.html">Nosotros</a></li>
          <li>
          <ul class="men">
            <li>
              <a href="">LOGIN</a>
              <ul>
                  <li><a href="login.html">Iniciar Sesión </a></li>
              </ul>
            </li>
          </ul>
        </ul>
      </nav>`
    }
}
window.customElements.define('pag-menu',Menu)
