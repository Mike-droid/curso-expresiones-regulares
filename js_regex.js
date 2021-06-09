function validate(str) {
  if (str.match(/^[^@_]+@[\w\.]{2,}\.[\w]{2,5}$/i)) {
    //* Validando un email con una expresión regular
    document.getElementById("boton").disabled = false
    document.getElementById("email").style.backgroundColor = "green"
  } else {
    document.getElementById("boton").disabled = true
    document.getElementById("email").style.backgroundColor = "red"
  }
  console.log(str)
}