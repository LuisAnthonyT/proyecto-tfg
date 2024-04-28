const emailInput = document.getElementById('email');

emailInput.addEventListener('keyup', (event) => {
    const email = document.getElementById('email').value;

    const data = {email};
    const options = {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data),
    };

    document.getElementById('emailStatus').textContent = "";

    fetch('api/verifyEmail', options).then(response => response.json())
    .then(data => {
        if (data.validEmail === 0) {
            emailStatus.textContent = 'Email disponible';
            emailStatus.classList.remove('text-red-600');
            emailStatus.classList.add('text-green-600');
        } else {
            emailStatus.textContent = 'Email ya registrado';
            emailStatus.classList.remove('text-green-600');
            emailStatus.classList.add('text-red-600');
        }
    })
    .catch(error => {
        console.error('Hubo un error al verificar el correo electrónico:', error);
    });
});

