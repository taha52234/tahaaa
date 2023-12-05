<?php
session_start();
include "../controller/panierC.php";
include "../model/panierM.php";
include "../model/productM.php";
$error ="" ;
$produit = null;
$produitC = new PanierController();
if(isset($_POST["prix"])&&isset($_POST["quantite"])&&isset($_POST["nom"])&&isset($_POST["image"])) //input control
{
    if( !empty($_POST["prix"]) && !empty($_POST["quantite"]) && !empty($_POST["nom"]) && !empty($_POST["image"]))
    {
        $produit = new Panier(null,$_POST["prix"],$_POST["quantite"],$_POST["nom"],$_POST["image"],$_SESSION['cin']);    //adding values to new panier object
        $produitC->ajouter_produit($produit);
        //echo $_SESSION['cin'];
        //header('Location:panier.php');
    }
    else
    {
        $error = "Missing information";
    }
} ?>
<?php
//include "../controller/productC.php";
$c = new ProduitController();
$tab = $c->showproduct1();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HELPZ - Free Charity Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
    integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,400;0,700;1,400&family=Fira+Code:wght@500;700&family=Fraunces:ital,opsz,wght@0,9..144,100;1,9..144,900&family=Outfit:wght@400;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet" />

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    </head>
    <style>
        h1{
            margin-left: 250px;

            font-size:50px;
            color: rgb(0, 0, 0);
        }
        .dd-selected{
           color: black; 
        }
        #slick {
                width: 100%;
                font-size: 40px;
                border: 2px solid #333; 
                color: #555; 
            }
    
           
            #slick option {
                font-size: 22px; 
                background-color: #f2f2f2; 
                color: #333; 
            }
            body{
                background-color: #04202e; 
            }
            #qr-code {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 30px;
      padding: 33px 0;
    }

    #Generate {
      background-color: #3498db;
      padding: 20px;
      border-radius: 2rem;
      height: 300px;
    }

    @media screen and (max-width: 414px) {
      #Generate {
        height: 400px;
      }
    }
       
    </style>
    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="fa fa-phone-alt"></i>
                                <p>88 888 888</p>
                            </div>
                            <div class="text">
                                <i class="fa fa-envelope"></i>
                                <p>tahayassine.bouguerra@esprit.tn</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">PALESTINE UNION</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="causes.html" class="nav-item nav-link">Causes</a>
                        <a href="event.html" class="nav-item nav-link">Events</a>
                        <a href="blog.html" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="single.html" class="dropdown-item">Detail Page</a>
                                <a href="service.html" class="dropdown-item">What We Do</a>
                                <a href="team.html" class="dropdown-item">Meet The Team</a>
                                <a href="donate.php" class="dropdown-item">Donate Now</a>
                                <a href="volunteer.html" class="dropdown-item">Become A Volunteer</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Donate Now</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="logout.php">Donate</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Donate Start -->
        <div class="container">
            <div class="donate" data-parallax="scroll" data-image-src="img/donate.jpg">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="donate-content">
                            <div class="section-header">
                                <p>Donate Now</p>
                                <h2>Let's donate to save palestine</h2>
                            </div>
                            <div class="donate-text">
                                <p>
                                     des milliers d'enfants maintenant souffrent par contre vous vivez le confort total , ne pas hésitez de donner et petit à petit on va détruire ensemble la corruption et on va sauver ces personnes
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="donate-form">
                            <div class="club">
                                <div class="row">
                                    <div class="group">
                                        <div class="section-header">
                                            <h1>Club :</h1>
                                        </div>
                                        
                                        <select name="" id="slick">
                                            <option disabled selected>choisissez un club</option>
                                            <option value="croissant rouge" data-description="c'est le croissant rouge" data-imagesrc="croissant rouge.jpg">Croissant rouge</option>
                                            <option value="rotaract" data-description="c'est le rotaract" data-imagesrc="rotaract.png">Rotaract</option>
                                            <option value="interact" data-description="c'est le interact" data-imagesrc="interact.png">Interact</option>
                                            <option value="lions" data-description="c'est le lions" data-imagesrc="lions.png">Lions</option>
                                        </select>
                                    </div>
                                   
                                    
                                    
                                    
                                </div>
                        
                        
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js"></script>
                            <script>
                               $("#slick").ddslick({
                                width:"100%",
                                imagePosition:"left",
                                selectText:"Select your social network",
                                onSelected:function(data){
                                    $("#selected").html(data.selectedData.value);
                                }
                        
                        
                               }) 
                            </script>
                            <br>
                            <br>
                                
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-custom active">
                                        <input type="radio" name="options" checked> $10
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="options"> $20
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="options"> $30
                                    </label>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit">Donate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donate End -->
        <div class="bouton">
            <a href="panier.php" class="link1">Panier<span>4</span></a>
            <a href="payer.php" class="link2">payer</a>
    
        </div>

         <div class="phrase-container">
            <div class="phrase">let's donate</div>
        </div>
        <?php
        function searchproduit($nom){
                $sql = "SELECT * from produit where nom = :nom";
                $db = config::getConnexion();
                try {
                    $query = $db->prepare($sql);
                    $query->bindValue(':nom', $nom);
                    $query->execute();
                    $Product = $query->fetch();
                    return $Product;
                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }
            }?>
        <form action=""  method="GET">
            <div id="searchBar">
            <label for="nom">Search By Name:</label>
            <input type="text" id="" name="nom">
            <input type="submit" value="Search">
            </div>
        </form>
            <?php
           
        
            $k = new ProduitController();
            if (isset($_GET['nom']) && !empty($_GET['nom'])) {
                $t = $k->searchproduit($_GET['nom']);
            } 
            else
            {
                $t = $k->showproduct1();
            }
            ?>
       
        <h1>produit :</h1>

        <h2>vetements :</h2>
        <section class="liste1">
                
                
                    <form method="POST" action = "" class="produit">
                    <div class="image-produit">
                    <img src="vet2.png">
                </div>
                    <div class="contenu">
                    <h4 class="nom">t-shirt </h4>
                    <h2 class="prix">35 €</h2>
                        <input type="hidden" name="id" >
                        <input type="hidden" name="nom" value="t-shirt">
                        <input type="hidden" name="prix" value="35">
                        <input type="hidden" name="image" value="vet2.png">
                        <input type="number" name="quantite">
                        <br>
                        <br>
                        <input class="id-produit" type="submit" value="Ajouter au panier">
                        <br>
                        </div>
                    </form>
                
                    <form method="POST" action="" class="produit">
                    <div class="image-produit">
                    <img src="vet3.png">
                </div>
                    <div class="contenu">
                    <h4 class="nom">jeans</h4>
                    <h2 class="prix">63 €</h2>
                        <input type="hidden" name="id" >
                        <input type="hidden" name="nom" value="jeans">
                        <input type="hidden" name="prix" value="63">
                        <input type="hidden" name="image" value="vet3.png">
                        <input type="number" name="quantite">
                        <br>
                        <input class="id-produit" type="submit" value="Ajouter au panier">
                        <br>                    
                </div>
                    </form>
                <form method="POST" class="produit">
                <div class="image-produit">
                <img src="vet4.png">
                </div>
            <div class="contenu">
                <h4 class="nom">monteau</h4>
                <h2 class="prix">99 €</h2>
                    <input type="hidden" name="id" >
                    <input type="hidden" name="nom" value="monteau">
                    <input type="hidden" name="prix" value="99">
                    <input type="hidden" name="image" value="vet4.png">
                    <input type="number" name="quantite">
                    <br>
                    <input class="id-produit" type="submit" value="Ajouter au panier">
                    <br>
                    
            </div>
                </form>
                
                <form method="POST" action = "" class="produit">
                <div class="image-produit">
                <img src="vet5.png">
                </div>
            <div class="contenu">
                <h4 class="nom">chaussure</h4>
                <h2 class="prix">120 €</h2>  
                    <input type="hidden" name="id" >
                    <input type="hidden" name="nom" value="chaussure">
                    <input type="hidden" name="prix" value="120">
                    <input type="hidden" name="image" value="vet5.png">
                    <input type="number" name="quantite">
                    <br>
                    <input class="id-produit" type="submit" value="Ajouter au panier">
                    <br>
                    
            </div>
                </form>    
                <form method="POST" action="" class="produit">
                <div class="image-produit">
                <img src="vet6.png">
                </div>
            <div class="contenu">
                <h4 class="nom">cache col</h4>
                <h2 class="prix">30 €</h2>
                    <input type="hidden" name="id" >
                    <input type="hidden" name="nom" value="cache col">
                    <input type="hidden" name="prix" value="30">
                    <input type="hidden" name="image" value="vet6.png">
                    <input type="number" name="quantite">
                    <br>
                    <input class="id-produit" type="submit" value="Ajouter au panier">
                    <br>
                    
            </div>
                </form>
               <form method="POST" action="" class="produit">
                <div class="image-produit">
                <img src="vet1.png">
                </div>
            <div class="contenu">
                <h4 class="nom">chausette</h4>
                <h2 class="prix">8 €</h2>
                    <input type="hidden" name="id">
                    <input type="hidden" name="nom" value="chausette">
                    <input type="hidden" name="prix" value="8">
                    <input type="hidden" name="image" value="vet1.png">
                    <input type="number" name="quantite">
                    <br>
                    <input class="id-produit" type="submit" value="Ajouter au panier">
                    <br>
                    
            </div>
                </form>
        </section>
        <h2>medicaments :</h2>
        <section class="liste2">
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med1.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">doliprane </h4>
                    <h2 class="prix">4 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med2.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">betadine</h4>
                    <h2 class="prix">7 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med3.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">sparadrap</h4>
                    <h2 class="prix">5 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med4.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">mebo</h4>
                    <h2 class="prix">50 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med5.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">vita stress</h4>
                    <h2 class="prix">30 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med6.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">vitamine c</h4>
                    <h2 class="prix">23 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med7.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">vitamine b12</h4>
                    <h2 class="prix">35 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <form action="" class="produit">
                <div class="image-produit">
                    <img src="med8.png">
                </div>
                <div class="contenu">
                    <h4 class="nom">panadol</h4>
                    <h2 class="prix">4 €</h2>
                    <a href="#" class="id-produit">Ajouter au panier</a>
                </div>
            </form>
            <?php foreach ($tab as $produit){ ?>
            <form method="POST" action="" class="produit" >
                <div class="image-produit">
                    <img src="<?php echo $produit['img']; ?>">
                </div>
                <div class="contenu">

                    <h4 class="nom"><?php echo $produit['nom']; ?></h4>
                    <h2 class="prix"><?php echo $produit['prix']; ?>€</h2>
                        <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
                        <input type="hidden" name="nom" value="<?php echo $produit['nom']; ?>">
                        <input type="hidden" name="prix" value="<?php echo $produit['prix'];?>">
                        <input type="hidden" name="image" value="<?php echo $produit['img']; ?>">
                        <input type="number" name="quantite">
                        <input class="id-produit" type="submit" value="Ajouter au panier">
                </div>
            </form>
            <?php } ?>
        
        </section>
        <div class="flex flex-col-reverse align-center justify-content m-auto md:max-w-4xl md:flex-row mt-24 p-10">
    </div>
    <!-- Where the generated QR code will be. -->
    <div id="qr-code" class="m-auto"></div>


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Our Head Office</h2>
                            <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                            <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <div class="footer-social">
                                <a class="btn btn-custom" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Popular Causes</a>
                            <a href="">Upcoming Events</a>
                            <a href="">Latest Blog</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
                            <a href="">Terms of use</a>
                            <a href="">Privacy policy</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn btn-custom">Submit</button>
                                <label>Don't worry, we don't spam!</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/parallax/parallax.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
    // URL prédéfinie pour YouTube (modifiez-la selon vos besoins)
    const predefinedUrl = "https://www.youtube.com/shorts/_jnqbN1K7OE";

    // Fonction pour générer le code QR avec l'URL prédéfinie
    const generateQrCode = () => {
      const qr = new QRCode(document.getElementById("qr-code"), {
        text: predefinedUrl,
        width: 300,
        height: 300,
      });
    };

    // Appel de la fonction pour générer le code QR au chargement de la page
    document.addEventListener("DOMContentLoaded", () => {
      generateQrCode();
    });
  </script>
        
    </body>
</html>
