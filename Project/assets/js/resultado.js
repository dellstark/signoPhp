document.addEventListener("DOMContentLoaded", function () {
  const resultado = document.getElementById("resultado");
  const signo = localStorage.getItem("signo");
  resultado.innerText = signo
    ? `Seu signo é ${signo}`
    : "Não foi possível determinar o signo.";
});

function voltar() {
  window.location.href = "./index.php";
}
