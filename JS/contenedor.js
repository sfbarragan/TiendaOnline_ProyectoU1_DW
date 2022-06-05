const $container = document.querySelector(".img"),
  $template = document.getElementById("template-img").content,
  $fragment = document.createDocumentFragment(),
  contenedor = [
    {
      title: "Combo mouse y teclado",
      img: "https://www.tecnosmart.com.ec/wp-content/uploads/2021/09/TEC0006.jpg",
    },
    {
      title: "Laptop Gamer",
      img: "https://blog.soltekonline.com/content/images/size/w2000/2019/11/0-2.jpg",
    },
    {
      title: "Ventilador RGB",
      img: "https://i.blogs.es/58de84/fan-01/1366_2000.jpeg",
    },
    {
      title: "Audio Gamer RGB",
      img: "https://m.media-amazon.com/images/I/319UcQ9TFLL._SL500_.jpg",
    },
  ];

contenedor.forEach((el) => {
  $template.querySelector("img").setAttribute("src", el.img);
  $template.querySelector("img").setAttribute("alt", el.title);
  $template.querySelector("figcaption").textContent = el.title;

  let $clone = document.importNode($template, true);
  $fragment.appendChild($clone);
});

$container.appendChild($fragment); 
