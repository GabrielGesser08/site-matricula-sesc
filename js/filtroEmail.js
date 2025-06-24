  const emailInput = document.getElementById('email');

  emailInput.addEventListener('blur', function () {
    const email = this.value;
    const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    if (!isValid) {
      alert('Por favor, insira um e-mail válido.');
      this.focus();
    }
  });