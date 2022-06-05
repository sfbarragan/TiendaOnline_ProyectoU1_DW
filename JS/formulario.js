class Formulario extends HTMLElement{
    constructor(){
        super();
    }
    connectedCallback(){
        let shaDOMRoot=this.attachShadow({mode:"open"});
        shaDOMRoot.innerHTML=`
        <style>
        h1 {
          text-align: center;
          color: #a8a8a8;
          text-shadow: 1px 1px 0 white;
          
        }
        form {
          max-width: 50%;
          text-align: center;
          margin: 20px auto;
          background-color: rgba(66, 65, 65, 0.479);
          border-radius: 1.5rem;
          padding: 12px;
        }
        form input,
        form textarea {
          border: 0;
          padding: 1em;
          border-radius: 8px;
          display: inline-block;
          width: 100%;
          margin-top: 1em;
          font-family: "Merriweather", sans-serif;
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        form #input-submit {
          color: white;
          font-size: 0.9rem;
          background: #32c92d;
          cursor: pointer;
          display:inline-block;
          width: 25%;
          font-weight: bold;
        }
        form textarea {
          height: 180px;
        }
        .half {
          float: left;
          width: 45%;
          margin-bottom: 1em;
        }    
        .right {
          width: 46%;
        }    
        .left {
          margin-right: 5%;
        }
        </style>
        
        <div id="cont">
           <form class="btn">
            <h1>Formulario</h1>
            <div class="half left cf">
              <input type="text" id="input-nombre" placeholder="Nombre" />
              <input type="text" id="input-apellido" placeholder="Apellido" />
              <input type="text" id="input-numero" placeholder="Teléfono" />
              <input type="email" id="input-email" placeholder="Email" />
            </div>
            <div class="half right cf">
              <textarea name="message" type="text" id="input-message" placeholder="Mensaje"></textarea>
            </div>
            <input type="submit" value="Enviar" id="input-submit" />
          </form>
        </div>
        `;
    }
}
window.customElements.define('boton-formulario',Formulario)
