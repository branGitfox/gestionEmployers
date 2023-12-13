
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/employé.css">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #f0f8ff;
    }

    .link-box {
        width: 30%;
        height:20vh;
        border: solid;
        margin:10rem auto;
        border-radius: 10px;
        border: none;
        box-shadow: 0px 0px 10px black;
        display: grid;
        grid-template-rows: 1fr 1fr;
    }
/* 04969bcf */
    .link-cont {
        background-color: red;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
    }
    
    .link-box > div {
        background-color: blue;
        display: flex;
        align-items: center;
        justify-content: center;
        border: solid;
    }

    .link-box > div > a {
        width: 100%;
        background-color: red;
        text-align: center;
        padding: 25px 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        color: white;
    }


    .link-cont2 {
        background-color: red;
        border-bottom-left-radius:10px;
        border-bottom-right-radius:10px;
    }

    .link-cont2 a {
        border-bottom-left-radius:10px;
        border-bottom-right-radius:10px;
    }

    .link-cont a {
        border-top-left-radius:10px;
        border-top-right-radius:10px;
    }
</style>
<body>
    <div class="container">
        <header class="box">
            <h1>STE TAV<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                    class="bi bi-buildings" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                    <path
                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                </svg>RATRA</h1>
        </header>
        <div class="link-box">
                <div class="link-cont"><a href="">s</a></div>
                <div class="link-cont2"><a href="">s</a></div>
        </div>
            <a class="retour" href="../../index.php">Retour</a>
        </div>
    </div>
</body>
</html>