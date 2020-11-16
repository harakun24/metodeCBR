<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- STYLES -->

    <style {csp-style-nonce}>
    * {
        transition: background-color 300ms ease, color 300ms ease;
    }

    *:focus {
        background-color: rgba(221, 72, 20, .2);
        outline: none;
    }

    html,
    body {
        color: rgba(33, 37, 41, 1);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
        font-size: 16px;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
        min-height: 100vh;
        position: relative;
    }

    header {
        background-color: rgba(247, 248, 249, 1);
        padding: .4rem 0 0;
    }

    .menu {
        padding: .4rem 2rem;
    }

    header ul {
        border-bottom: 1px solid rgba(242, 242, 242, 1);
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
        text-align: right;
    }

    header li {
        display: inline-block;
    }

    header li a {
        border-radius: 5px;
        color: rgba(0, 0, 0, .5);
        display: block;
        height: 44px;
        text-decoration: none;
    }

    header li.menu-item a {
        border-radius: 5px;
        margin: 5px 0;
        height: 38px;
        line-height: 36px;
        padding: .4rem .65rem;
        text-align: center;
    }

    header li.menu-item a:hover,
    header li.menu-item a:focus {
        background-color: rgb(145 189 228);
        color: white;
    }

    header .logo {
        float: left;
        height: 44px;
        padding: .4rem .5rem;
    }

    header .menu-toggle {
        display: none;
        float: right;
        font-size: 2rem;
        font-weight: bold;
    }

    header .menu-toggle button {
        background-color: rgba(221, 72, 20, .6);
        border: none;
        border-radius: 3px;
        color: rgba(255, 255, 255, 1);
        cursor: pointer;
        font: inherit;
        font-size: 1.3rem;
        height: 36px;
        padding: 0;
        margin: 11px 0;
        overflow: visible;
        width: 40px;
    }

    header .menu-toggle button:hover,
    header .menu-toggle button:focus {
        background-color: rgba(221, 72, 20, .8);
        color: rgba(255, 255, 255, .8);
    }

    header .heroe {
        margin: 0 auto;
        max-width: 1100px;
        padding: 1rem 1.75rem 1.75rem 1.75rem;
    }

    header .heroe h1 {
        font-size: 2.5rem;
        font-weight: 500;
    }

    header .heroe h2 {
        font-size: 1.5rem;
        font-weight: 300;
    }

    section {
        margin: 0 auto;
        max-width: 1100px;
        padding: 2.5rem 1.75rem 3.5rem 1.75rem;
    }

    section h1 {
        margin-bottom: 2.5rem;
    }

    section h2 {
        font-size: 120%;
        line-height: 2.5rem;
        padding-top: 1.5rem;
    }

    section pre {
        background-color: rgba(247, 248, 249, 1);
        border: 1px solid rgba(242, 242, 242, 1);
        display: block;
        font-size: .9rem;
        margin: 2rem 0;
        padding: 1rem 1.5rem;
        white-space: pre-wrap;
        word-break: break-all;
    }

    section code {
        display: block;
    }

    section a {
        color: rgba(221, 72, 20, 1);
    }

    section svg {
        margin-bottom: -5px;
        margin-right: 5px;
        width: 25px;
    }

    .further {
        background-color: rgba(247, 248, 249, 1);
        border-bottom: 1px solid rgba(242, 242, 242, 1);
        border-top: 1px solid rgba(242, 242, 242, 1);
    }

    .further h2:first-of-type {
        padding-top: 0;
    }

    footer {
        background-color: rgba(221, 72, 20, .8);
        text-align: center;
    }

    footer .environment {
        color: rgba(255, 255, 255, 1);
        padding: 2rem 1.75rem;
    }

    footer .copyrights {
        background-color: rgba(62, 62, 62, 1);
        color: rgba(200, 200, 200, 1);
        padding: .25rem 1.75rem;
    }

    @media (max-width: 559px) {
        header ul {
            padding: 0;
        }

        header .menu-toggle {
            padding: 0 1rem;
        }

        header .menu-item {
            background-color: rgba(244, 245, 246, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
            margin: 0 15px;
            width: calc(100% - 30px);
        }

        header .menu-toggle {
            display: block;
        }

        header .hidden {
            display: none;
        }

        header li.menu-item a {
            background-color: rgba(221, 72, 20, .1);
        }

        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgb(145 189 228);
            color: white;
        }
    }
    </style>
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <div class="menu">
            <ul>
                <li class="logo text-primary">
                    <h1>
                        <i class="fa fa-cat"></i>
                        Cat finder
                    </h1>
                </li>
                <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li>
                <li class="menu-item hidden"><a href="#">Home</a></li>
                <li class="menu-item hidden"><a href="https://codeigniter4.github.io/userguide/" target="_blank">Lakukan
                        uji</a>
                </li>
                <li class="menu-item hidden"><a href="https://forum.codeigniter.com/" target="_blank">Sampel</a></li>
                <li class="menu-item hidden"><a
                        href="https://github.com/codeigniter4/CodeIgniter4/blob/master/CONTRIBUTING.md"
                        target="_blank">Log in</a>
                </li>
            </ul>
        </div>



    </header>

    <!-- CONTENT -->

    <section>
        <div>

            <h1>Sistem Pakar dengan Metode CBR</h1>
            <p>
                Case Based Reasoning (CBR) merupakan suatu metode untuk menyelesaikan masalah dengan berpatokan pada
                kasus sebelumnya.Konsep dari metode case based reasoning ditemukan dari ide untuk menggunakan pengalaman
                – pengalaman yang terdokumentasi untuk menyelesaikan masalah yang baru. Permasalahan baru dapat
                diselesaikan dengan memanfaatkan kembali dan
                mungkin malakukan penyesuaian terhadap permasalahan yang memiliki kesamaan yang telah diselesaikan
                sebelumnya.
            </p>
            <div class="col-12 d-flex justify-content-center">
                <div class="col-6 bg-dark p-4">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel"
                        data-interval="2500">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-12 d-flex justify-content-around">
                                    <img src="assets/img/jap.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/manx.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/ragdoll.jpeg" class="d-block col-3" alt="...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 d-flex justify-content-around">
                                    <img src="assets/img/angora.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/korat.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/russian.jpeg" class="d-block col-3" alt="...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 d-flex justify-content-around">
                                    <img src="assets/img/abyssinian.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/charteus.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/domestik.jpeg" class="d-block col-3" alt="...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-12 d-flex justify-content-around">
                                    <img src="assets/img/coon.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/persia.jpeg" class="d-block col-3" alt="...">
                                    <img src="assets/img/manx.jpeg" class="d-block col-3" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="#" class="btn btn-lg mt-4 btn-outline-primary">mulai pengujian</a>
            </div>
        </div>

    </section>



    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer class="position-absolute" style="width:100%;bottom:0;">


        <div class="copyrights">

            <p class=" d-flex justify-content-between mt-4">&copy; <?= date('Y') ?> UTS 18-IF-01
                <span>Mata kuliah Kecerdasan
                    Buatan </span>
            </p>

        </div>

    </footer>

    <!-- SCRIPTS -->

    <script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
    </script>

    <!-- -->

</body>

</html>