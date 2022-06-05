class AcordionGallery extends HTMLElement{
    //Aqui iria el codigo del elemento
    constructor() {
      super();
    }


    connectedCallback(){
        
        let shadowRoot = this.attachShadow({mode:'open'});
        const t = document.querySelector('#acordionGallery');
        const instancia = t.content.cloneNode(true);
        shadowRoot.appendChild(instancia);
        
    }
}

window.customElements.define('acordion-gallery', AcordionGallery);

