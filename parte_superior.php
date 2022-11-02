<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <title>Tesla - Módulo encuestas</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Comienzo de barra lateral -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                
                <a href="/tesla_encuesta/resultados.php" class="navbar-brand mx-4 mb-3">
                <img style="width: 182px; height: 68px;" src="https://institutotesla.com.ar/wp-content/themes/institutotesla/assets/img/logo_footer.svg" alt="">
                <!-- <h3 class="text-primary"> Tesla</h3> -->
                </a>
                
                
                <div class="navbar-nav w-100">
                    <a href="Crear_encuesta.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Crear encuestas</a>
                    <a href="" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Lista de encuesta</a>
                    <a href="/tesla_encuesta/resultados.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Resultados</a>
                    <a href="/tesla_encuesta/comentarios.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Comentarios</a>
                </div>
            </nav>
        </div>
        <!-- Fin de barra lateral -->


        <!-- Comienzo de contenido  -->
        <div class="content">
            <!-- Navbar Start -->

            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0" style="height: 4rem;">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                      <a href="login.php" class="btn btn-outline-primary m-2">Cerrar sesión</a>
                </div>
            </nav>
            <!-- Navbar End -->

