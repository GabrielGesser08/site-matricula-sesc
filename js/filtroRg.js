 const rgInput = document.getElementById('rg');

  rgInput.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, ''); // Remove tudo que não for número
  });