<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link rel="icon" href="/assets/login/images/logos/logo.png">
    <link rel="stylesheet" href="/assets/login/style.css" />
    <title>PrepUni | UTP</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{route('login')}}" method="post" class="sign-in-form">
                @csrf
                <h2 class="title">
                    <img src="/assets/images/logos/logo_principal.png" alt="x" width="400">
                </h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required />
                </div>
                <input type="submit" value="Ingresar" class="btn solid" />
                <div style="text-align: center; margin-top: 30px;">
                    <p style=" font-size: 16px;">
                        Desarrollado por el Grupo 9 - Innovación y Transformación Digital
                    </p>
                    <img src="/assets/images/logos/logo_utp.png" alt="Logo UTP" style="height: 60px; margin-top: 10px;">
                </div>

            </form>
            <form action="#" class="sign-up-form">
                <h2 class="title">
                    <img src="/assets/images/logos/logo_principal.png" alt="x" width="400">
                </h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" />
                </div>
                <input type="submit" class="btn" value="Registrarse" />
                <div style="text-align: center; margin-top: 30px;">
                    <p style=" font-size: 16px;">
                        Desarrollado por el Grupo 9 - Innovación y Transformación Digital
                    </p>
                    <img src="/assets/images/logos/logo_utp.png" alt="Logo UTP" style="height: 60px; margin-top: 10px;">
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>¿Nuevo en PrepUni?</h3>
                <p>
                    Prepárate para ingresar a la universidad con las mejores herramientas y recursos.
                    ¡Empieza tu camino hacia el éxito académico!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    REGÍSTRATE
                </button>
            </div>
            <img src="/assets/login/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>¿Ya eres parte de PrepUni?</h3>
                <p>
                    Ingresa a tu cuenta y sigue preparándote para alcanzar tus metas académicas.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    INGRESAR
                </button>
            </div>
            <img src="/assets/login/img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>

<script src="/assets/login/app.js"></script>
</body>
</html>
