
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
        background-color: #04969bcf;
    }
/* 04969bcf */
    .link-cont {
        border-top-left-radius:10px;
        border-top-right-radius:10px;
    }
    
    .link-box > div {
        display: flex;
        align-items: center;
        justify-content: center;
        /* border: solid; */
    }

    .link-box > div > a {
        width: 100%;
        background-color: #04969bcf;
        text-align: center;
        padding: 25px 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        color: white;
        letter-spacing: 3px;
        position: relative;
    }


    .link-cont2 {
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

    .link-box > div > a:hover{
        background-color: #03869bcf;
    }

    .link-box > div > a svg {
        position: absolute;
        left: 52px;
        top: 1.5rem;
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
                <div class="link-cont"><a href="afficherAvance.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                                 <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
</svg>RAPPORT AVANCE</a></div>
                <div class="link-cont2"><a href="afficherPointage.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                     <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                                                     <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                                     </svg>RAPPORT POINTAGE</a></div>
        </div>
            <a class="retour" href="../../index.php">Retour</a>
        </div>
    </div>
</body>
</html>