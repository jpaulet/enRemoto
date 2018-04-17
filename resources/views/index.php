<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" value="<?php echo csrf_token() ?>">

        <title>enRemoto! - Contrata el mejor talento, esté dónde este</title>
        <base href="/">
        <meta name="keywords" content="trabajos remotos, trabajos de teletrabajo, trabajos desde casa, remotos, teletrabajo, nómadas virtuales y de trabajo">
        <meta name="description" content="Trabajos remotos para nómadas de trabajo digital. Comience su carrera de teletrabajo y trabaje de forma remota desde su hogar o en cualquier lugar del mundo.">

        <link href="./css/bootstrap.min.css" rel="stylesheet" type='text/css'>
        <link href="./fonts/fonts.css" rel="stylesheet" type='text/css'>
        <link href='./css/style.css' rel="stylesheet" type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->       
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar" role="navigation">
            <div class="container col-xs-12">
                <div class="navbar-header">                    
                    <a class="navbar-brand logo-text">
                        en<span class='logo-text-highlight'>R</span>emoto! <span class='logo-text-header'>- contrata el mejor talento- </span>
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>                        
                        <li>
                            <a class="page-scroll show-offer-button" @click="showOffer = true">Añadir Oferta</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#dreams">Alertas</a>
                        </li>                        
                        <?php
                        /*
                        <li v-show="!isLogged">
                            <a class="page-scroll" href="#auth">Login</a>
                        </li>
                        <li v-show="!isLogged">
                            <a class="page-scroll">Registrarse</a>
                        </li>                        
                        <li v-show="isLogged">
                            <a @click="logout" href>Salir</a>
                        </li>
                        */
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid">
          <div class='jumbotron-div'>
              <div class="jumbotron-container container col-xs-8 col-sm-4 col-md-3" style='float:left;'>
                <h1 class="display-4 jumbotron-title">Trabaja en remoto!</h1>
                <p class="jumbotron-text">Trabajos remotos para nómadas de trabajo digital en Español. Trabaja de forma remota desde tu casa o lugares de todo el mundo.</p>
                <button type="button" class="btn btn-light btn-transparent" @click="showOffer = true">Añadir Oferta</button>
              </div>
          </div>
        </div>

        <!-- JOB LIST -->
        <section id="trabajos" class="container-fluid">
            <div class="row">
                <div class="hidden-xs col-sm-3 col-md-3 side-content-column" style='min-height:80vh;'>
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
                        <div class='tag-list'>
                            <button v-for="tag in tagsList" class="badge badge-secondary job-badge job-badge-sidebar" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)">{{ tag }}</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-9 col-md-9">                    
                    
                    <div class="alert alert-dark" role="alert">
                      ¿Estás contratando para una posición en remoto? Crea tu <button type="button" class="btn btn-warning" @click="showOffer = true">Oferta</button> y contrata el mejor talento!
                    </div>

                    <div class='row'>
                        <div class='col-xs-6 col-sm-6 job-num-results'>
                            <span> {{jobs.length}} Resultados </span>
                        </div>
                        <?php 
                        /*
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
                        */
                        ?>
                        <div class='col-xs-6 col-sm-6 job-search-div'>
                            <form class="navbar-form" role="search">
                                <div class="input-group add-on">
                                  <input v-model="searchText" @keyup="searchData" class="form-control search-box" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                  <div class="input-group-btn" style='border-bottom:1px solid #eee;'>
                                    <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>

                        <div v-show="jobs.length === 0" class="alert alert-warning no-job-div">
                            <span>No hay ofertas de trabajo...</span>
                        </div>

                        <table v-show="jobs.length !== 0" class="table job-table">
                            <tr v-for="job in jobs" class="job-box">
                                <td class='job-logo-div'>
                                    <img v-if="job.src !== null" class='job-logo image-job-logo rounded' style="background:url('img/{{job.src}}');">
                                    <div v-else class='job-logo text-job-logo rounded'>{{job.title | logotize}}</div>
                                </td>
                                <td class='job-info'>
                                    <h2>{{ job.title }}</h2>
                                    <p> {{ job.description }}</p>
                                </td>
                                <td class='job-tags'>
                                    <span v-for="tag in job.tags" class="badge badge-secondary job-badge" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)" style='margin-bottom:2px;'>{{ tag }}</span>
                                </td>
                                <td class='job-date'>
                                    Hace 5 h.
                                </td>
                                <td class='job-apply'>                                
                                    <button type="button" class="btn btn-warning btn-apply btn-lg">Aplicar</button>
                                </td>
                            </tr>        
                        </table>

                </div>
            </div>
        </section>

        <?php 
        /*
        <!-- Auth Section -->
        <section id="auth" class="container-fluid">
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
        */ 
        ?>

        <!-- offer model -->
        <div v-show="showOffer" class="modal-show-offer">
            <div class="jumbotron jumbotron-fluid modal-show-offer-div">
              <div class="container col-md-5 col-md-offset-1">
                <h1 class="display-4 jumbotron-title">Crea tu oferta</h1>
                <p class="jumbotron-text">Contrata el mejor talento, esté dónde esté. </p>

                <div class='hidden-sm-down hidden-sm'>
                    <div class='show-offer-text margin-bottom20'>
                        Publica tu oferta laboral en la red de trabajo remoto en habla hispana del mundo! Tu oferta serà visible a toda la comunidad mediante el portal `en Remoto` así como en redes sociales i canales RSS. 
                    </div>
                    <h5 class='show-offer-text' style='text-decoration:underline;'> Beneficios: </h5>
                    <ul class='show-offer-text' style='list-style:none;'>
                        <li>- Permite contratar talento a nivel mundial</li>
                        <li>- Mejorar la productividad</li>
                        <li>- Mejora la salud del trabajador</li>
                        <li>- Trabajadores mas contentos</li>
                    </ul>

                    <div> 
                        <div class='show-offer-text old-price'>
                            200 <span>€/mes</span>
                        </div>
                        
                        <div class='offer-price'>
                            <h3> Oferta promoción </h3>
                            100 <span>€/mes</span>
                        </div>
                    </div>
                </div>                
              </div>
              <div class="container col-sm-7">
                <form class="col-sm-12 col-md-12 form-job-offer">
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
                
                    <button type="submit" class="btn btn-sm btn-primary button-form-submit">Enviar</button>
                </form>
              </div>
            
              <div class='col-sm-12 close-modal-button' @click='showOffer = false'>Cerrar</div>
            </div>
        </div>
        <!-- offer model -->

        
        <!-- Footer -->
        <footer class='footer-bar'>
            <nav class="navbar" role="navigation">
                <div class="container col-sm-10 col-sm-offset-1">
                    <div class="navbar-header">                    
                        <a class="navbar-brand logo-text text-white">
                            en<span class='logo-text-highlight'>R</span>emoto! <span class='text-logo-style'>- contrata el mejor talento- </span>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>                            
                            <li>
                                <a class="bottom-page-scroll" @click="showOffer = true">Añadir Oferta</a>
                            </li>
                            <li>
                                <a class="bottom-page-scroll">Alertas</a>
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
                </div>
            </nav>

            <ul class='footer-list-menu'>
                <li>FAQ</li>
                <li>Política privacidad</li>
                <li>Terminos y condiciones</li>
                <li>Contacto</li>
                <li>Sobre `esRemoto`</li>
            </ul>

            <div class="container text-center copyright-div">
                <p>Copyright &copy; J.P. Aulet</p>
            </div>
        </footer>

        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script> 
        <script src="./js/vue.min.js"></script>
        <script src="./js/vue-resource.min.js"></script> 
        <script src="./js/app.js"></script> 
    </body>
</html>
