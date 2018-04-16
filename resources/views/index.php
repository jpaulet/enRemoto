<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" value="<?php echo csrf_token() ?>">

        <title>esRemoto! - Contrata el mejor talento, esté dónde este</title>
        <base href="/">
        <meta name="keywords" content="trabajos remotos, trabajos de teletrabajo, trabajos desde casa, remotos, teletrabajo, nómadas virtuales y de trabajo">
        <meta name="description" content="Trabajos remotos para nómadas de trabajo digital. Comience su carrera de teletrabajo y trabaje de forma remota desde su hogar o en cualquier lugar del mundo.">

        <!-- Bootstrap Core CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

        <!-- Sweet Alert CSS 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
        -->

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300,400,600" rel="stylesheet">
        <link href='./css/style.css' rel="stylesheet" type='text/css'>
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar" role="navigation">
            <div class="container col-sm-11 col-md-10 col-lg-offset-1">
                <div class="navbar-header">                    
                    <a class="navbar-brand logo-text">
                        es<span class='logo-text-highlight'>R</span>emoto! <span style='color:#333;font-size:12px;weight:200;margin-left:10px;'>- contrata el mejor talento- </span>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        
                        <li>
                            <a class="page-scroll" @click="showOffer = true" style='border-radius:1px solid #888;color:#888;'>Añadir Oferta</a>
                        </li>
                        <li style='margin-right:60px;'>
                            <a class="page-scroll" href="#dreams">Alertas</a>
                        </li>
                        
                        <!--                    
                        <li v-show="!isLogged">
                            <a class="page-scroll" href="#auth">Login</a>
                        </li>
                        <li v-show="!isLogged">
                            <a class="page-scroll">Registrarse</a>
                        </li>                        
                        <li v-show="isLogged">
                            <a @click="logout" href>Salir</a>
                        </li>
                        -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid">
          <div class="container col-xs-5 col-sm-4 col-md-3 col-lg-offset-1">
            <h1 class="display-4 jumbotron-title">Trabaja en remoto!</h1>
            <p class="jumbotron-text">Trabajos remotos para nómadas de trabajo digital en Español. Trabaja de forma remota desde tu casa o lugares de todo el mundo.</p>
            <button type="button" class="btn btn-light btn-transparent" @click="showOffer = true">Añadir Oferta</button>
            <!-- <button type="button" class="btn btn-light btn-transparent">Subsribirse</button> -->
          </div>
        </div>

        <!-- JOB LIST -->
        <section id="trabajos" class="container-fluid">
            <div class="row">
                <div class="hidden-xs col-sm-3 col-md-3 col-lg-2 col-lg-offset-1 side-content-column" style='min-height:80vh;'>
                    <div>
                        <h5 class='content-title'> Categorias </h5>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 0 ? 'activeCat' : ''" @click='filterCat(0)'>
                          Todas <span class="badge">{{catCounter[0]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 1 ? 'activeCat' : ''" @click='filterCat(1)'>
                          Desarrollo Software <span class="badge">{{catCounter[1]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 2 ? 'activeCat' : ''" @click='filterCat(2)'>
                          Comercialización <span class="badge">{{catCounter[2]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 3 ? 'activeCat' : ''" @click='filterCat(3)'>
                          Admin. de Sistemas <span class="badge">{{catCounter[3]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 4 ? 'activeCat' : ''" @click='filterCat(4)'>
                          Ventas <span class="badge">{{catCounter[4]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 5 ? 'activeCat' : ''" @click='filterCat(5)'>
                          Diseño <span class="badge">{{catCounter[5]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 6 ? 'activeCat' : ''" @click='filterCat(6)'>
                          Atención al Cliente <span class="badge">{{catCounter[6]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 7 ? 'activeCat' : ''" @click='filterCat(7)'>
                          Traducción <span class="badge">{{catCounter[7]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 8 ? 'activeCat' : ''" @click='filterCat(8)'>
                          Escritura <span class="badge">{{catCounter[8]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 9 ? 'activeCat' : ''" @click='filterCat(9)'>
                          Consultoría <span class="badge">{{catCounter[9]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 10 ? 'activeCat' : ''" @click='filterCat(10)'>
                          Finanzas <span class="badge">{{catCounter[10]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 11 ? 'activeCat' : ''" @click='filterCat(11)'>
                          Recursos humanos <span class="badge">{{catCounter[11]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 12 ? 'activeCat' : ''" @click='filterCat(12)'>
                          Administración <span class="badge">{{catCounter[12]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 13 ? 'activeCat' : ''" @click='filterCat(13)'>
                          Educación <span class="badge">{{catCounter[13]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 14 ? 'activeCat' : ''" @click='filterCat(14)'>
                          Cuidado de Salud <span class="badge">{{catCounter[14]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 15 ? 'activeCat' : ''" @click='filterCat(15)'>
                          Legal <span class="badge">{{catCounter[15]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 16 ? 'activeCat' : ''" @click='filterCat(16)'>
                          Marketing <span class="badge">{{catCounter[16]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 17 ? 'activeCat' : ''" @click='filterCat(17)'>
                          Otros <span class="badge">{{catCounter[17]}}</span>
                        </button>
                    </div>

                    <div>
                        <h5 class='content-title'> Tags </h5>
                        <div style='margin-left:10px;'>
                            <button v-for="tag in tagsList" class="badge badge-secondary job-badge job-badge-sidebar" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)">{{ tag }}</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">                    
                    
                    <div class="alert alert-dark" role="alert">
                      ¿Estás contratando para una posición en remoto? Crea tu <button type="button" class="btn btn-warning" @click="showOffer = true">Oferta</button> y contrata el mejor talento!
                    </div>

                    <div class='row'>
                        <div class='col-xs-6 col-sm-6' style='padding:10px 30px;margin:0px;'>
                            <span style='color:#333;'> {{jobs.length}} Resultados </span>
                        </div>
                        <div class='col-sm-6' style='display:none;padding:10px 10px;margin:0px;'>
                            <div class="tag" style='display:inline-block;'>
                                <i class="fa fa-clock-o"></i> <span style="color: #5c5c5c;" class="ng-binding">Jornada Completa</span>
                            </div>
                            <div class="tag" style='display:inline-block;margin-left:20px;'>
                                <i class="fa fa-adjust"></i> <span style="color: #5c5c5c;" class="ng-binding">Media Jornada</span>
                            </div>
                            <div class="tag" style='display:inline-block;margin-left:20px;'>
                                <i class="fa fa-child"></i> <span style="color: #5c5c5c;" class="ng-binding">Practicas</span>
                            </div>
                        </div>
                        <div class='col-xs-6 col-sm-6' style='padding:0px;margin:0px;text-align:right;'>
                            <form class="navbar-form" role="search" style='margin-top:4px;'>
                                <div class="input-group add-on">
                                  <input v-model="searchText" @keyup="searchData" class="form-control search-box" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                  <div class="input-group-btn" style='border-bottom:1px solid #eee;'>
                                    <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>

                        <div v-show="jobs.length === 0" class="alert alert-warning" style='text-align:center;margin-top:20vh;width:80%;margin:15vh auto;'>
                            <span>No hay ofertas de trabajo...</span>
                        </div>

                        <table v-show="jobs.length !== 0" class="table" style='margin-top:20px;'>
                            <tr v-for="job in jobs" class="job-box">
                                <td style='width:48px;'>
                                    <img v-if="job.src !== null" class='job-logo'  class="rounded" style="height:64px;min-width:48px;min-height:48px;background-color:transparent !important;backgound-position:center;background-size:cover;background:url('img/{{job.src}}');background-size:100% 100%;">
                                    <div v-else class='job-logo' class="rounded" style='min-width:48px;min-height:48px;'>
                                        {{job.title | logotize}}
                                    </div>
                                </td>
                                <td class='job-info'>
                                    <h2>{{ job.title }}</h2>
                                    <p style='font-size:14px;'> {{ job.description }}</p>
                                </td>
                                <td class='job-tags' style='padding-top:28px;width:24%;'>
                                    <span v-for="tag in job.tags" class="badge badge-secondary job-badge" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)" style='margin-bottom:2px;'>{{ tag }}</span>
                                </td>
                                <td class='job-date' style='width:8%;padding-top:30px;font-size:11px;'>
                                    Hace 5 h.
                                </td>
                                <td class='job-apply' style='width:130px;padding-top:18px;'>                                
                                    <button type="button" class="btn btn-warning btn-apply btn-lg">Aplicar</button>
                                </td>
                            </tr>        
                        </table>

                </div>
            </div>
        </section>


        <!-- Auth Section -->
        <section id="auth" class="container-fluid" style='display:none;'>
            <div class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div v-show="!isLogged" >
                            <h2 class="text-center">Login</h2>
                            <form @submit.prevent="login" accept-charset="UTF-8" role="form">
                                <div v-show="isAlert" class="alert alert-danger" role="alert">
                                    These credentials do not match our records.
                                </div>
                                <div class="row">

                                    <div class="form-group col-lg-6" :class="{'has-error': error.email}">
                                        <input v-model="loginData.email" class="form-control" placeholder="email" name="email" type="email" id="email" required>
                                        <small class="help-block">{{ error.email }}</small>
                                    </div>

                                    <div class="form-group col-lg-6" :class="{'has-error': error.password}">
                                        <input v-model="loginData.password" class="form-control" placeholder="password" name="password" type="password" value="" id="password" required>
                                        <small class="help-block">{{ error.password }}</small>
                                    </div>

                                    <div class="checkbox col-lg-12">
                                        <label>
                                            <input v-model="loginData.memory" name="memory" type="checkbox" value="1">Remember me
                                        </label>
                                    </div>

                                    <div class="form-group col-lg-12 text-center">
                                        <input class="btn btn-default" type="submit" value="Send">
                                    </div>    

                                    <div class="col-lg-12 text-center">					
                                        <a href="password/email">I have forgoten my password !</a>
                                    </div>
                                </div>
                            </form>                        
                            <div class="text-center">
                                <br>
                                <a href="auth/register" class="btn btn-default">I want to suscribe !</a>
                            </div>
                        </div>

                        <div v-show="isLogged" >
                            <h2 class="text-center">Add a dream</h2>
                            <form @submit.prevent="create" accept-charset="UTF-8" role="form">
                                <div class="row">

                                    <div class="form-group col-lg-12" :class="{'has-error': error.createContent}">
                                        <textarea rows="8" v-model="createData.content" class="form-control" placeholder="Your dream just there..." name="content" id="content" required></textarea>
                                        <small class="help-block">{{ error.createContent }}</small>
                                    </div>

                                    <div class="form-group col-lg-12 text-center">
                                        <input class="btn btn-default" type="submit" value="Send">
                                    </div>    

                                </div>
                            </form>  
                        </div>
                    </div>                   
                </div>
            </div>
        </section>


        <!-- offer model -->
        <div v-show="showOffer" style='z-index:100000 !important;position:fixed;top:0px;left:0px;width:100%;min-height:100vh;background-color:rgba(255,255,255,0.8);'>
            <div class="jumbotron jumbotron-fluid" style='z-index:10000;width:90%;border-radius:8px;min-height:86vh;margin:7vh auto;'>
              <div class="container col-lg-3 col-md-5 col-lg-offset-1 col-md-offset-1">
                <h1 class="display-4 jumbotron-title">Crea tu oferta</h1>
                <p class="jumbotron-text">Contrata el mejor talento, esté dónde esté. </p>

                <div class='hidden-sm-down hidden-sm'>
                    <div style='font-weight:200;font-family:"Roboto",sans-serif !important;color:#fff;text-align:justify;margin-bottom:20px;'>
                        Publica tu oferta laboral en la red de trabajo remoto en habla hispana del mundo! Tu oferta serà visible a toda la comunidad mediante el portal `en Remoto` así como en redes sociales i canales RSS. 
                    </div>
                    <h5 style='font-weight:200;font-family:"Roboto",sans-serif !important;color:#fff;text-decoration:underline;'> Beneficios: </h5>
                    <ul style='font-weight:200;font-family:"Roboto",sans-serif !important;color:#fff;list-style:none;'>
                        <li>- Permite contratar talento a nivel mundial</li>
                        <li>- Mejorar la productividad</li>
                        <li>- Mejora la salud del trabajador</li>
                        <li>- Trabajadores mas contentos</li>
                    </ul>

                    <div> 
                        <div style='margin:50px auto; width: 40%; font-size:22px;font-family:"Roboto",sans-serif !important;color:#fff;text-decoration:line-through;'>
                            200 <span>€/mes</span>
                        </div>
                        
                        <div style='border-radius: 8px; margin:50px auto; text-align:center; font-size:25px;font-family:"Roboto",sans-serif !important;color:#fff;'>
                            <h3 style='color:#fff;text-align:center;'> Oferta promoción </h3>
                            100 <span>€/mes</span>
                        </div>
                    </div>
                </div>                
              </div>
              <div class="container col-sm-7 col-lg-7">
                <form class="col-sm-12 col-md-12 col-lg-8" style='color:#fff;float:right;background-color:rgba(0,0,0,0.25);padding:20px;border-radius:8px;margin-right:3%;'>
                    <div class="form-group">
                        <label for="title">*Título</label><small class="form-text">Ej: Desarrollador de Software.</small>
                        <input type="text" class="form-control" id="jobTitle" placeholder="Título oferta">                        
                    </div>
                    <div class="form-group">
                        <label for="title">*Descripción</label><small class="form-text">Ej: Buscamos desarrollador PHP con más de 5 años de experiéncia....</small>
                        <textarea type="text" class="form-control" id="jobDescription" placeholder="Descripción de la oferta... puedes usar markup para formatear el texto"></textarea>                        
                    </div>
                    <div class="form-group">
                        <label for="title">*Categoría</label><small class="form-text">Seleccione la categoría más adecuada.</small>
                        <select class="form-control" id="jobCategory">                        
                            <option value="1"> Desarrollo Software </option>
                            <option value="2"> Comercialización </option>
                            <option value="3"> Admin. de Sistemas </option>
                            <option value="4"> Ventas </option>
                            <option value="5"> Diseño </option>
                            <option value="6"> Atención al Cliente </option>
                            <option value="7"> Traducción </option>
                            <option value="8"> Escritura </option>
                            <option value="9"> Consultoría </option>
                            <option value="10"> Finanzas </option>
                            <option value="11"> Recursos Humanos </option>
                            <option value="12"> Administración </option>
                            <option value="13"> Educación </option>
                            <option value="14"> Cuidado de Salud </option>
                            <option value="15"> Legal </option>
                            <option value="16"> Marketing </option>
                            <option value="17"> Otros </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">*Tags</label><small class="form-text">Separados por comas. Ej: PHP, javascript, css, html.</small>
                        <input type="email" class="form-control" id="jobTags" placeholder="Tags">                        
                    </div>
                    <div class="form-group">
                        <label for="title">Salario</label><small class="form-text">Rango salarial (opcional).</small>
                        <input type="text" class="form-control" id="jobSalary" placeholder="Salario">                        
                    </div>
                    
            

                    <div class="form-group">
                        <label for="title">*Empresa</label><small class="form-text">Ej: Facebook</small>
                        <input type="text" class="form-control" id="jobCompany" placeholder="Empresa">                        
                    </div>                    
                    <div class="form-group">
                        <label for="title">Logo</label><small class="form-text">Formato: JPG, PNG, GIF. Tamaño óptimo: 64x64 pixeles.</small>
                        <input type="file" class="form-control" id="jobLogo" placeholder="Logo empresa">                        
                    </div>
                    <div class="form-group">
                        <label for="title">*Email</label><small class="form-text">Le permitirá gestionar la oferta y recibir las solicutudes de los candidatos.</small>
                        <input type="email" class="form-control" id="jobEmail" placeholder="Email empresa">                        
                    </div>
                
                    <button type="submit" class="btn  btn-sm btn-primary" style='margin:20px auto;margin-left:25%;height:40px;width:50%;background-color:#de3c3c;border:0px;'>Enviar</button>
                </form>
                
                <form action="/charge" method="post" id="payment-form">
                    <div class="form-row">
                        <label for="card-element">
                          Credit or debit card
                        </label>
                        <div id="card-element">
                          
                        </div>
                        
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button type="submit">Submit Payment</button>
                </form>

              </div>
            
              <div class='col-sm-12' style='color:#fff;text-align:center;cursor:pointer;position:fixed;bottom:12vh;width:90%;font-weight:600;' @click='showOffer = false'>Cerrar</div>
            </div>
        </div>
        <!-- offer model -->

        
        <!-- Footer -->
        <footer style='margin-top:60px;background-color:#de3c3c;color:#fff;min-height:10vh;padding:20px 0px;'>
            <nav class="navbar" role="navigation">
                <div class="container col-sm-10 col-sm-offset-1">
                    <div class="navbar-header">                    
                        <a class="navbar-brand logo-text" style='color:#fff !important;'>
                            es<span class='logo-text-highlight'>R</span>emoto! <span style='color:#eee;font-size:12px;weight:200;margin-left:10px;'>- contrata el mejor talento- </span>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            
                            <li>
                                <a class="bottom-page-scroll" @click="showOffer = true">Añadir Oferta</a>
                            </li>
                            <li style='margin-right:60px;'>
                                <a class="bottom-page-scroll" href="#dreams">Alertas</a>
                            </li>
                            
                            <!--                    
                            <li v-show="!isLogged">
                                <a class="bottom-page-scroll" href="#auth">Login</a>
                            </li>
                            <li v-show="!isLogged">
                                <a class="bottom-page-scroll">Registrarse</a>
                            </li>                        
                            <li v-show="isLogged">
                                <a class="bottom-page-scroll" @click="logout" href>Salir</a>
                            </li>
                            -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

            <ul style='margin:20px auto; list-style:none;text-align:center;'>
                <li style='margin-left:-40px;'>FAQ</li>
                <li style='margin-left:-40px;'>Política privacidad</li>
                <li style='margin-left:-40px;'>Terminos y condiciones</li>
                <li style='margin-left:-40px;'>Contacto</li>
                <li style='margin-left:-40px;'>Sobre `esRemoto`</li>
            </ul>

            <div class="container text-center" style='padding-top:20px;padding-bottom:20px;'>
                <p>Copyright &copy; J.P. Aulet</p>
            </div>
        </footer>

        <!-- Vue.js JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.10/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.17/vue-resource.min.js"></script> 
        <script src="js/app.js"></script> 
        <script src="https://js.stripe.com/v3/"></script>
        <script>
        
           // Create a Stripe client.
            var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }
        
        </script>

    </body>

</html>

