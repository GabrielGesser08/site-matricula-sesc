  const cpfInput = document.getElementById('cpf');

  cpfInput.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, ''); // Remove tudo que não for dígito
  });