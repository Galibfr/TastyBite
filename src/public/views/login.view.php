<body style="background:url('../assets/images/chicken-haleem.jpg')">
    <style>
        .wrapper {
            max-width: 500px;
            width: 100%;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
        }
        .wrapper .title {
            height: 80px;
            background: #FC5647;
            border-radius: 5px 5px 0 0;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper form {
            padding: 25px 35px;
        }
        .wrapper form .row {
            height: 60px;
            margin-top: 15px;
            position: relative;
        }
        .wrapper form .row input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 70px;
            border-radius: 5px;
            border: 1px solid #000;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        form .row input:focus {
            border-color: #FC5647;
        }
        form .row input::placeholder {
            color: #999;
        }
        .wrapper form .row i {
            position: absolute;
            width: 55px;
            height: 100%;
            color: #fff;
            font-size: 22px;
            background: #FC5647;
            border: 1px solid #000;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper form .pass {
            margin-top: 12px;
        }
        .wrapper form .pass a {
            color: #FC5647;
            font-size: 17px;
            text-decoration: none;
        }
        .wrapper form .pass a:hover {
            text-decoration: underline;
        }
        .wrapper form .button input {
            margin-top: 20px;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding-left: 0px;
            background: #FC5647;
            border: 1px solid #000;
            cursor: pointer;
        }
        form .button input:hover {
            background: #d81503;
        }
        .wrapper form .signup-link {
            text-align: center;
            margin-top: 45px;
            font-size: 17px;
        }
        .wrapper form .signup-link a {
            color: #16a085;
            text-decoration: none;
        }
        form .signup-link a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="wrapper">
        <div class="title"><span>Connectez-vous</span></div>
        
        <!-- Display message passed from the controller -->
        <?php if(isset($message)) { echo "<p style='text-align: center; color: red;'>$message</p>"; } ?>

        <form action="/login" method="post">
            <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="email" placeholder="Email" required />
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mot de Passe" required />
            </div>
            <div class="pass"><a href="#">Mot de passe oublié?</a></div>
            <div class="row button">
                <input type="submit" name="submit" value="Se connecter" />
            </div>
            <div class="signup-link">Not a member? <a href="/register">Inscrivez-vous</a></div>
        </form>
    </div>
</body>
