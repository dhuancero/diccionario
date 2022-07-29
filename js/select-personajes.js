$(document).ready(function () {
  $(".personaje-select").select2();
  let personajes = [];

  $(".personaje-select").on("select2:select", function (e) {
    console.log("ID seleccionado: " + e.params.data.id);
    personajes.push(e.params.data.id);
    console.log(personajes);
    document.getElementById("val-person").value = personajes.toString();
  });

  $(".personaje-select").on("select2:unselect", function (e) {
    console.log("ID  no seleccionado: " + e.params.data.id);
    personajes = personajes.filter((item) => item !== e.params.data.id);
    console.log(personajes);
    document.getElementById("val-person").value = personajes.toString();
  });

  console.log("terminado: " + personajes);
  console.log(" value: " + document.getElementById("val-person").value);
});
