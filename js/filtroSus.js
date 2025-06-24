 const susInput = document.getElementById('sus');

  susInput.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, ''); // Remove tudo que não for número
  });