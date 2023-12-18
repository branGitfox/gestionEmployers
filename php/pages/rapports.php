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
        height: 20vh;
        border: solid;
        margin: 10rem auto;
        border-radius: 10px;
        border: none;
        box-shadow: 0px 0px 10px black;
        display: grid;
        grid-template-rows: 1fr 1fr;
        background-color: #04969bcf;
    }

    /* 04969bcf */
    .link-cont {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .link-box>div {
        display: flex;
        align-items: center;
        justify-content: center;
        /* border: solid; */
    }

    .link-box>div>a {
        width: 100%;
        background-color: blue;
        text-align: center;
        padding: 25px 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        color: white;
        letter-spacing: 3px;
        position: relative;
    }


    .link-cont2 {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .link-cont2 a {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .link-cont a {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .link-box>div>a:hover {
        background-color: #03869bcf;
    }

    .link-box>div>a svg {
        position: absolute;
        left: 52px;
        top: 1.5rem;
    }


    .hide {
        display: none;
    }

    .flex {
        display: flex;
    }

    .nav-links a {
        padding:18.5px 15px;
        background-color: blue;
        text-decoration: none;
        color: white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 400;
        letter-spacing: 2px;
    }


    .worker-hide-menu {
        flex-direction: column;
        align-items: center;
        border: solid;
        justify-content: center;
        width: 117px;
        position: absolute;
        /* padding: 10px; */
        border: solid .1px rgba(0, 0, 255, 0.753);
        background-color: blue;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        z-index: 100;
        /* box-shadow: 0px 0px 1px; */
        right: 30.5%;

    }

    .worker-hide-menu a {
        padding: 10px 5px;
        text-decoration: none;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: white;
        font-size: 15px;
        width: 100%;
        text-align: center;
    }

    .worker-hide-menu a:hover {
        background-color: rgb(3, 3, 57);
    }

    nav {
        width: 100%;
        height: 8vh;
        background-color: blue;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-links a:hover {
        background-color: rgb(97, 97, 248);
    }

    .btn-w {
        padding: 17.5px 5px;
        background-color: blue;
        border: none;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 15px;
        color: white;
        font-weight: 400;
        letter-spacing: 2px;
    }

    .btn-w:hover {
        background-color: rgb(97, 97, 248);
    }

    .nav-logo {
        margin-left: 3rem;
    }

    svg {
        position: relative;
        top: 5px;
        left: -5px;
    }

    .logo {
        top: 0;
        left: 0;
    }

    h1 {
        font-weight: bold;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: whitesmoke;
        font-size: 2.5rem;
        line-height: 5px;
    }

    #active-a {
        background-color: blueviolet;
    }
    .body {
        width: 100%;
        height: 100vh;
    }

    body {
        overflow: hidden;
        z-index: 101;
    }
</style>

<body>
    <nav>
        <div class="nav-logo">
            <h1>STE TAV<svg class="logo" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                    class="bi bi-buildings" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                    <path
                        d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                </svg>RATRA</h1>
        </div>
        <div class="nav-links">
         <a href="../../index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                        </svg>ACCEUIL
                    </a>
            <button class="btn-w"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path
                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>EMPLOYER</button>
            <span class="worker-hide-menu hide">
                <a href="ajouterunemployer.php">NOUVEAU</a>
                <a href="listeemployer.php">LISTE</a>
                <a href="avance.php">AVANCE</a>
                <a href="pointage.php">POINTAGE</a>
                <a href="">FONCTION</a>
            </span>
            <a href="salaires.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-coin" viewBox="0 0 16 16">
                    <path
                        d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                </svg>SALAIRES</a>
            <a id="active-a" href=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-journals" viewBox="0 0 16 16">
                    <path
                        d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2" />
                    <path
                        d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0" />
                </svg>RAPPORTS</a>
            <a href><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>DECONNEXION</a>
        </div>
    </nav>
    <div class="body">
    <div class="containers">
        <div class="link-box">
            <div class="link-cont"><a href="afficherAvance.php"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                        <path
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg>RAPPORT AVANCE</a></div>
            <div class="link-cont2"><a href="afficherPointage.php"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                        <path
                            d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>RAPPORT POINTAGE</a></div>
        </div>
    </div>

        <!-- <a class="retour" href="../../index.php">Retour</a> -->
    </div>
    </div>
    <script>
            const linkList = document.querySelector('.worker-hide-menu')
            const btn = document.querySelector('.btn-w')
            btn.addEventListener('click', () => {
                linkList.classList.toggle('flex')
                linkList.classList.toggle('hide')
            })

            document.querySelector('.body').addEventListener('click', () => {
                linkList.classList.add('hide')
                linkList.classList.remove('flex')
            })
        </script>
</body>
</html>