function consultarSigno() {
  const birthdate = document.getElementById("birthdate").value;
  const date = new Date(birthdate);
  const day = date.getDate();
  const month = date.getMonth() + 1;

  fetch("signos.xml")
    .then((response) => response.text())
    .then((data) => {
      const parser = new DOMParser();
      const xml = parser.parseFromString(data, "application/xml");
      const signos = xml.getElementsByTagName("signo");

      let signoEncontrado = "Não encontrado";
      for (let signo of signos) {
        const nome = signo.getElementsByTagName("nome")[0].textContent;
        const dataInicio = signo
          .getElementsByTagName("dataInicio")[0]
          .textContent.split("-");
        const dataFim = signo
          .getElementsByTagName("dataFim")[0]
          .textContent.split("-");

        const inicio = new Date(
          date.getFullYear(),
          dataInicio[1] - 1,
          dataInicio[0]
        );
        const fim = new Date(date.getFullYear(), dataFim[1] - 1, dataFim[0]);

        if (date >= inicio && date <= fim) {
          signoEncontrado = nome;
          break;
        }
      }

      localStorage.setItem("signo", signoEncontrado);
      window.location.href = "./resultado.html";
    })
    .catch((error) => console.error("Erro ao carregar o XML:", error));
}
