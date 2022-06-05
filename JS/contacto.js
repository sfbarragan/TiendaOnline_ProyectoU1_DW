function showContact() {
    var temp = document.querySelector("#contacto");
    var clon = temp.content.cloneNode(true);
    document.body.appendChild(clon);
}