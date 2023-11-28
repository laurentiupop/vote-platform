<?php
include('session.php');
?>
<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo(strtotime('now')) ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scout mureș</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <style>
        .toggleClass-privat{
            background-image: linear-gradient(to left, #516630, #425427, #34431f, #263316, #1a230d);
            color: white;
            padding: 5px;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
        }
        .hidden{
            display:none;
        }

        .iToggle{
            font-size: 25px;
        }

        .alignCenter{
            text-align: center;
        }
    </style>
</head>
<header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-image: linear-gradient(to left, #516630, #425427, #34431f, #263316, #1a230d);">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img height="50px" src="img/logo.png">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <div class="nav-link js-scroll-trigger" style="color: #fed235;"> Bun venit, <?php echo $_SESSION['login_user'] ?>!</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Ordinea de zi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">Documente AG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#team">Echipă</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Ieșire</a>
                    </li>
                    <?php if( $_SESSION['user_ccl'] == 1){ ?>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="/admin">Admin</a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bune venit!</div>
                <div class="intro-heading text-uppercase">Sistem de vot</div>
                <?php if (isset($_SESSION['canvote'])){
                    if($_SESSION['canvote'] == 1){
                        echo '<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger btnVt" href="/vote">Votează!</a>';
                    }else{ ?>
                        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Inactiv</a>
                    <?php }} ?>
            </div>
        </div>
    </header>
</header>


<!-- Services -->
<section id="services">
    <div class="container">
        <!--<div class="row">-->
        <!--<div class="col-lg-12 text-center">-->
        <!--<h2 class="section-heading text-uppercase">Ordinea de zi</h2>-->
        <!--<h3 class="section-subheading text-muted mt-2 mb-2">ÃŽn curÃ¢nd...</h3>-->
        <!--</div>-->
        <!--</div>-->
        <div class="row">

            <div class="col-lg-12 toggleClass-privat" id="ordineaDeZiClick">Ordinea de zi <i id="iToggle" class="fa fa-caret-up float-right"></i></div>
            <div class="col-lg-12" id="ordineaDeZiTog">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://docs.google.com/document/d/1c2xv20OKlp9OPYI5GF8HBpX2aL6PJOmyeEhpXsJVT2o/edit?usp=sharing">
                                VizualizeazÄƒ Ã®n Google Drive
                            </a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12" id="ordineaDeZi">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <h3 class="section-subheading text-muted mt-2 mb-2">Documente naționale</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Statutul ONCR<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="doc">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1Ko8bLnaFm-u4aO2Q1XIdPXsXvCcX9DDa">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="status">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/statut_ONCR_2018.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Regulamentul ONCR<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="doc">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1XgbADVZXRP4d27uXhCE1XpRfooBo8xst">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="status">

                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/regulament_ONCR_2018.pdf&embedded=true" width= "100%" height= "100%" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h3 class="section-subheading text-muted mt-2 mb-2">Rapoarte CCL</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport șef de CL (Vio)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="rapCl">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://docs.google.com/document/d/1scXR5Qz-Mx4eIfUyqKEI5KGGv4EM2m2vGZhfIKKzkyI/edit?usp=sharing">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="vio">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportVio.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport departament financiar (Carmen)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="camrenn">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1xshK7AErWDjMMlJTwd06_yR3-rTOm7lqzknNiCjDrCo">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="camrmen1">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportCarmen.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport departament programe (Lau)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="lauu">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1JEXBc07wbaSva_cV0mHsOXsIh0NWC2fWrqdPfrkhOuc">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="lau">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportLau.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport departament imagine și comunicare (Radu)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="raduu">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1mBABvTCwcqSBaXa6jUnjeC6loWWD_koyCP6o3MngE7M">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="radu">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportRadu.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport departament resurse umane (Radu)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="raduu2">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1aZVjZejuegEYn_uzeJjdY6CQEqU3iK2lkHSz9tlg1fk">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="radu2">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportRadu2.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport departament administrativ (Adela)<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="adelaa">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1wMns9ZmjUEcc63h3n7zgfwiDjqpNRlaR1E84lMcTDMQ">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="adela">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportAdministrativ.pdf&embedded=true" width= "100%" height= "100%">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h3 class="section-subheading text-muted mt-2 mb-2">Financiar</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport financiar<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="camrenn1">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1e25lsE-MyEIMkkvsYPyzNujdCUO8ZXsa1IWB4l9d4kw">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="camrmen11">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportFinanciar2017.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Planificare bugetară 2019<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="buget">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1BclsZAU5WsLkshvUY9kAjYWHFqOQGCjSGSddH9TKmfc">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="bugetu">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/planificare_bugetara_2019.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Propunere infrastructură IT 2019<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="ituu">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1uyG62HHehJbns8Ea6ASo6BOEirjZRT4EQzq06ICtCHk">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="ituuu">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/plan_infrastructura_it.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <h3 class="section-subheading text-muted mt-2 mb-2">Activități</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport activite 2018<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="actv">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=17-QaClzHjmilOm12CgajcN7_A0XBTALh">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="activi">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raport_anual_2018.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Planificare activități 2019<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="act2">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1ltGs-Zt2fieW-Yh5beKcHYc2VGaFRc31Rq_7KQIj0Os">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="activi2">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/plan_activitate2019.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport progres Festivalul Luminii 2019<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="fl">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1wFjulPzy-en18jDE9JIAyxHUEl70s4uNKbIjcXJCnIw">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="fll">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raportFl2019.pdf&embedded=true" width= "100%" height= "100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport progres Campanie 2%<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="caermenExplo1">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1TaxtYHRB3fd_2OHWEEcCX-AWJ9lZv4qf">
                                Vizualizează în Google Drive
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="caermenExplo">
                            <embed src="http://docs.google.com/viewer?url=ag.scoutmures.ro/documents/raport2.pdf&embedded=true" width= "100%" height= "100%">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Raport progres Camp de Centru Local<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="stefi">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <!-- <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1JEXBc07wbaSva_cV0mHsOXsIh0NWC2fWrqdPfrkhOuc">
                                 Vizualizează în Google Drive
                             </a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="stefii">
                            <!--<embed src="http://ag.scoutmures.ro/documents/raportLau.pdf" width= "100%" height= "100%">-->
                            <h3 class="section-subheading text-muted mt-2 mb-2">În curând...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <h3 class="section-subheading text-muted mt-2 mb-2">Propuneri de vot în cadrul AG</h3>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Schimbare de nume a CL<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="numeee">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <!-- <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1JEXBc07wbaSva_cV0mHsOXsIh0NWC2fWrqdPfrkhOuc">
                                 Vizualizează în Google Drive
                             </a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="numee">
                            <!--<embed src="http://ag.scoutmures.ro/documents/raportLau.pdf" width= "100%" height= "100%">-->
                            <h3 class="section-subheading text-muted mt-2 mb-2">În curând...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 toggleClass-privat pressBtn">Propunere AG onlie<i class="fa fa-caret-up float-right iToggle"></i></div>
            <div class="col-lg-12 pressBtnToTgl hidden" id="agonline">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <!-- <a class="btn btn-sm btn-warning" target="_blank" href="https://drive.google.com/open?id=1JEXBc07wbaSva_cV0mHsOXsIh0NWC2fWrqdPfrkhOuc">
                                 Vizualizează în Google Drive
                             </a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 " id="agonlineee">
                            <!--<embed src="http://ag.scoutmures.ro/documents/raportLau.pdf" width= "100%" height= "100%">-->
                            <h3 class="section-subheading text-muted mt-2 mb-2">În curând...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Info</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 alignCenter"><i class="fa fa-calendar-alt"></i> 30 Martie 2019</div>
            <div class="col-md-6 alignCenter"><i class="fa fa-chess-rook"></i> Cetatea Medievală Tîrgu Mureș</div>
            <div class="col-md-6 alignCenter"><i class="fa fa-clock"></i> 10:00</div>
            <div class="col-md-6 alignCenter"><i class="fa fa-uers"></i> Gata oricând!</div>

        </div>

    </div>
</section>

<!-- Team -->
<section class="bg-light" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Echipă</h2>

            </div>
        </div>
        <div class="row" style="margin-left: auto;margin-right: auto;">
            <h3 class="section-subheading text-muted  mt-2 mb-2">Responsabil eveniment: Radu Ioanițescu</h3>
        </div>
        <div class="row" style="margin-left: auto;margin-right: auto;">
            <h3 class="section-subheading text-muted mt-2 mb-2">Administrator site: Laurențiu Pop</h3>
        </div>

    </div>
</section>


<!-- Portfolio Modals -->



<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; scoutmures 2019</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">

                    <li class="list-inline-item">
                        <a href="http://facebook.com/scoutmures">
                            <i class="fab fa-facebook-f" style=" font-size: 30px;  margin-top: 10px;"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>
<script>
    $(document).ready(function(){

        $('#ordineaDeZi').empty().append('<iframe src="https://docs.google.com/document/d/e/2PACX-1vQ7xQOBTQAjg6OwVbhmaPMp0itoWBBItiQn-HkZm7d3nesa6NNKbbwJ-ApJaOFWQej-K-V1S4hMJ4cO/pub?embedded=true"></iframe>\n')

        $('#ordineaDeZiClick').off('click');
        $('#ordineaDeZiClick').on('click', function(e){
            $('#ordineaDeZiTog').toggleClass('hidden');
            $('#iToggle').toggleClass('fa-caret-down fa-caret-up');
        })

        $('.pressBtn').off('click');
        $('.pressBtn').on('click', function(e){
            $(this).next().toggleClass('hidden');
            $(this).find('i').toggleClass('fa-caret-down fa-caret-up');
        })
    })
</script>


</html>