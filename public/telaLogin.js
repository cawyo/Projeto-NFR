var users = [];
        const loginForm = document.getElementById('login-form');
        const signupLink = document.getElementById('signup-link');
        const signupContainer = document.getElementById('signup-container');
        const signupForm = document.getElementById('signup-form');
        const loginLink = document.getElementById('login-link');
        const forgotPasswordLink = document.getElementById('forgot-password-link');

        signupLink.addEventListener('click', () => {
            loginForm.style.display = 'none';
            signupContainer.style.display = 'block';
        });

        loginLink.addEventListener('click', () => {
            loginForm.style.display = 'block';
            signupContainer.style.display = 'none';
        });

        signupForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const nomeInput = signupForm.querySelector('#username');
            const emailInput = signupForm.querySelector('#email');
            const senhaInput = signupForm.querySelector('#password');

            const newUser = {
                username: nomeInput.value,
                email: emailInput.value,
                password: senhaInput.value
            };

            users.push(newUser);

            alert('Cadastro realizado com sucesso!');
        });

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const usernameInput = loginForm.querySelector('#username');
            const passwordInput = loginForm.querySelector('#password');
            const username = usernameInput.value;
            const password = passwordInput.value;

            const user = users.find(user => user.username === username && user.password === password);

            if (user) {
                alert('Login realizado com sucesso!');

                window.location.href = 'home.html';
            } else {
                alert('Usuário não cadastrado ou senha incorreta.');
            }
        });

        forgotPasswordLink.addEventListener('click', () => {
            alert('Você receberá instruções de redefinição de senha por e-mail.');
        });