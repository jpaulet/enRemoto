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
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar" role="navigation">
            <div class="container navbar-container">
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
                            <a class="page-scroll show-offer-button btn btn-warning" style='margin-top:3px;' @click="showOffer = true">Añadir Oferta</a>
                        </li>
                         <?php
                        /*
                        <li>
                            <a class="page-scroll" href="#dreams">Alertas</a>
                        </li>                                               
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
        <div class="jumbotron jumbotron-fluid" style='min-height:270px;'>
          <div class='jumbotron-div'>
              <div class="jumbotron-container container col-xs-8 col-sm-6 col-md-3">
                <h1 class="display-4 jumbotron-title">Trabaja en remoto!</h1>
                <p class="jumbotron-text">Trabajos remotos para nómadas de trabajo digital en Español. Trabaja de forma remota desde tu casa o lugares de todo el mundo.</p>
                <button type="button" class="show-offer-button btn btn-warning" @click="showOffer = true">Añadir Oferta</button>
              </div>
          </div>
        </div>

        <!-- JOB LIST -->
        <section id="trabajos" class="container-fluid" v-show="section === 'trabajos'">
            <div class="row">
                <div class="hidden-xs col-sm-3 col-md-2 side-content-column" style='min-height:95vh;'>
                    <div>
                        <h5 class='content-title'> Categorias </h5>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 0 ? 'activeCat' : ''" @click='filterCat(0)'>
                          Todas <span class="badge">{{catCounter[0]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 1 ? 'activeCat' : ''" @click='filterCat(1)'>
                          <div class='category-badge categoria1'></div> Desarrollo Software <span class="badge">{{catCounter[1]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 2 ? 'activeCat' : ''" @click='filterCat(2)'>
                          <div class='category-badge categoria2'></div> Comercialización <span class="badge">{{catCounter[2]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 3 ? 'activeCat' : ''" @click='filterCat(3)'>
                          <div class='category-badge categoria3'></div> Admin. de Sistemas <span class="badge">{{catCounter[3]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 4 ? 'activeCat' : ''" @click='filterCat(4)'>
                          <div class='category-badge categoria4'></div> Ventas <span class="badge">{{catCounter[4]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 5 ? 'activeCat' : ''" @click='filterCat(5)'>
                          <div class='category-badge categoria5'></div> Diseño <span class="badge">{{catCounter[5]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 6 ? 'activeCat' : ''" @click='filterCat(6)'>
                          <div class='category-badge categoria6'></div> Atención al Cliente <span class="badge">{{catCounter[6]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 7 ? 'activeCat' : ''" @click='filterCat(7)'>
                          <div class='category-badge categoria7'></div> Traducción <span class="badge">{{catCounter[7]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 8 ? 'activeCat' : ''" @click='filterCat(8)'>
                          <div class='category-badge categoria8'></div> Escritura <span class="badge">{{catCounter[8]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 9 ? 'activeCat' : ''" @click='filterCat(9)'>
                          <div class='category-badge categoria9'></div> Consultoría <span class="badge">{{catCounter[9]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 10 ? 'activeCat' : ''" @click='filterCat(10)'>
                          <div class='category-badge categoria10'></div> Finanzas <span class="badge">{{catCounter[10]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 11 ? 'activeCat' : ''" @click='filterCat(11)'>
                          <div class='category-badge categoria11'></div> Recursos humanos <span class="badge">{{catCounter[11]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 12 ? 'activeCat' : ''" @click='filterCat(12)'>
                          <div class='category-badge categoria12'></div> Administración <span class="badge">{{catCounter[12]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 13 ? 'activeCat' : ''" @click='filterCat(13)'>
                          <div class='category-badge categoria13'></div> Educación <span class="badge">{{catCounter[13]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 14 ? 'activeCat' : ''" @click='filterCat(14)'>
                          <div class='category-badge categoria14'></div> Cuidado de Salud <span class="badge">{{catCounter[14]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 15 ? 'activeCat' : ''" @click='filterCat(15)'>
                          <div class='category-badge categoria15'></div> Legal <span class="badge">{{catCounter[15]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 16 ? 'activeCat' : ''" @click='filterCat(16)'>
                          <div class='category-badge categoria16'></div> Marketing <span class="badge">{{catCounter[16]}}</span>
                        </button>
                        <button type="button" class="btn btn-light btn-transparent btn-category" :class="selectedCat === 17 ? 'activeCat' : ''" @click='filterCat(17)'>
                          <div class='category-badge categoria17'></div> Otros <span class="badge">{{catCounter[17]}}</span>
                        </button>
                    </div>

                    <div v-if='tagsList.length !== 0'>
                        <h5 class='content-title'> Tags </h5>
                        <div class='tag-list'>
                            <button v-for="tag in tagsList" class="badge badge-secondary job-badge job-badge-sidebar" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)">{{ tag }}</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-9 col-md-10">                    
                    
                    <div class="alert alert-dark" role="alert">
                      ¿Estás contratando para una posición en remoto? Crea tu <button type="button" class="btn btn-warning " @click="showOffer = true">Oferta</button> y contrata el mejor talento!
                    </div>

                    <div class='row'>
                        <div class='col-xs-6 col-sm-6 job-num-results'>
                            <span> {{total}} Resultados </span>
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
                        <span>{{ msgJobDiv }}</span>
                    </div>

                    <div v-for="( jobs_day, jobs_list) in jobs">
                        <div v-show="jobs_list.length != 0" style='width:100%;border-bottom:1px solid #000;font-weight:600;font-size:13px;padding-left:20px;margin-top:50px;'> {{jobs_day }} </div>        
                        <table v-show="jobs_list.length !== 0" class="table job-table">
                            <tr v-for="job in jobs_list" class="job-box" @click="idViewJob = job.title" :class="{ promoted: job.promoted }">
                                <td class='job-logo-div'>
                                    <img v-if="job.logo" class='job-logo image-job-logo rounded' style="background:url('{{job.logo}}');background-size:100% 100%;">
                                    <div v-else :class="'categoria'+job.category" class='job-logo text-job-logo rounded'>{{job.title | logotize}}</div>
                                </td>
                                <td class='job-info'>
                                    <h2>{{job.id}} {{ job.title }}</h2>
                                    <p v-show="job.title !== idViewJob"> {{job.company}} - {{ job.description.length > 50 ? job.description.slice(0,50) + '...' : job.description }}</p>
                                    <div v-show="job.title === idViewJob">
                                        <div style="float:left;margin-top:10px;margin-bottom:10px;font-weight:600;">{{job.company}}</div>
                                        <span v-if="job.salary !== ''" style='float:left;'>- {{job.salary}} </span>

                                        <div v-html="job.description" style='clear:both;display:block;max-width:450px;font-size:13px;text-align:justify;'> 
                                            {{ job.description }}
                                        </div>
                                        <hr>

                                        <a href="{{job.link}}" target='_blank' style='margin-left:40%;'>
                                            <button type="button" class="btn btn-warning btn-lg" style='background-color:#b93a32 !important;border:0px;'>Aplicar</button>
                                        </a>
                                        <hr>

                                        <p style='text-align:center;margin-bottom:10px;'>
                                            Haga una referencia que encontró el trabajo en enRemoto, gracias por ayudarnos a que más empresas publiquen aquí.
                                        </p>

                                        <p style='text-align:justify;margin-bottom:40px;'>
                                            <span style='font-weight:600;'> ⚠ Advertencia</span>: cuando solicite empleo, NUNCA tendrá que pagar para solicitarlo. Eso es una estafa! Siempre verifique que realmente está hablando con la empresa en el puesto de trabajo y no con un impostor. Las estafas en el trabajo remoto estan en auge, ¡ten cuidado! Al hacer clic en el botón para aplicar arriba, dejará enRemoto.io y accederá a la página de la aplicación del trabajo para esa compañía fuera de este sitio. enRemoto no acepta ninguna responsabilidad o responsabilidad como consecuencia de la confianza depositada en la información allí (sitios externos) o aquí.
                                        </p>

                                    </div>
                                </td>
                                <td class='job-tags'>
                                    <span v-for="tag in job.tags" class="badge badge-secondary job-badge" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)" style='margin-bottom:2px;'>{{ tag }}</span>
                                </td>
                                <td class='job-date'>
                                    {{job.created_at | dateFormat }}
                                </td>
                                <td class='job-apply'>                                
                                    <a href="{{job.link}}" target='_blank'>
                                        <button type="button" class="btn btn-warning btn-apply btn-lg" style='background-color:#b93a32 !important;border:0px;'>Aplicar</button>
                                    </a>
                                </td>
                            </tr>        
                        </table>
                        <!-- <div v-show="jobs_list.length == 0" style='text-align:center;padding:20px;color:#555;font-size:12px;'> Sin ofertas para este dia </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section id='faq' class="page" v-show="section === 'faq'"> 
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
            faq
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
        </section>

        <section id='privacidad' class="page" v-show="section === 'privacidad'"> 
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
            <div style='width:90%;margin:20px auto;text-align:justify;'>
                <p style="text-align: center;"><strong>AVISO LEGAL Y CONDICIONES GENERALES DE USO DEL SITIO WEB</strong></p>
                <p style="text-align: center;"><strong><span class='highlight-title'>enremoto.io</span></strong></p>
                <p style="text-align: left;"><br><br></p>
                <p style="text-align: left;"><strong><br>INFORMACIÓN GENERAL </strong></p>
                <p style="text-align: left;"><br>En cumplimiento con el deber de información dispuesto en la Ley 34/2002 de Servicios de la Sociedad de la Información y el Comercio Electrónico (LSSI-CE) de 11 de julio, se facilitan a continuación los siguientes datos de información general de este sitio web:</p>
                <p>La titularidad de este sitio web, <span class='highlight-title'>enremoto.io</span>, (en adelante Sitio Web) la ostenta:  <span id="span_id_nombre_persona">Jordi Prados Aulet</span>, con NIF: <span id="span_id_nif">77918558D</span>, y cuyos datos de contacto son:</p>
                <p style="padding-left: 30px;"><span class='datos-contacto'>C/Napols, 59<br>La Bisbal d'Empordà<br>Girona - 17100<br>España</span></p>

                <p><br><strong>TÉRMINOS Y CONDICIONES GENERALES DE USO <br><br>EL OBJETO DE LAS CONDICIONES: EL SITIO WEB<br><br></strong>El objeto de las presentes Condiciones Generales de Uso (en adelante Condiciones) es regular el acceso y la utilización del Sitio Web. A los efectos de las presentes Condiciones se entenderá como Sitio Web: la apariencia externa de los interfaces de pantalla, tanto de forma estática como de forma dinámica, es decir, el árbol de navegación; y todos los elementos integrados tanto en los interfaces de pantalla como en el árbol de navegación (en adelante Contenidos) y todos aquellos servicios o recursos en línea que en su caso ofrezca a los Usuarios (en adelante Servicios).</p>
                <p><span class='highlight-title'>enRemoto</span> se reserva la facultad de modificar, en cualquier momento, y sin aviso previo, la presentación y configuración del Sitio Web y de los Contenidos y Servicios que en él pudieran estar incorporados. El Usuario reconoce y acepta que en cualquier momento <span class='highlight-title'>enRemoto</span> pueda interrumpir, desactivar y/o cancelar cualquiera de estos elementos que se integran en el Sitio Web o el acceso a los mismos.</p>
                <p>El acceso al Sitio Web por el Usuario tiene carácter libre y, por regla general, es gratuito sin que el Usuario tenga que proporcionar una contraprestación para poder disfrutar de ello, salvo en lo relativo al coste de conexión a través de la red de telecomunicaciones suministrada por el proveedor de acceso que hubiere contratado el Usuario. </p>
                <p>La utilización de alguno de los Contenidos o Servicios del Sitio Web podrá hacerse mediante la suscripción o registro previo del Usuario. </p>
                <p><strong><br>EL USUARIO</strong></p>
                <p><strong><br></strong>El acceso, la navegación y uso del Sitio Web, así como por los espacios habilitados para interactuar entre los Usuarios, y el Usuario y <span class='highlight-title'>enRemoto</span>, como los comentarios y/o espacios de blogging, confiere la condición de Usuario, por lo que se aceptan, desde que se inicia la navegación por el Sitio Web, todas las Condiciones aquí establecidas, así como sus ulteriores modificaciones, sin perjuicio de la aplicación de la correspondiente normativa legal de obligado cumplimiento según el caso. Dada la relevancia de lo anterior, se recomienda al Usuario leerlas cada vez que visite el Sitio Web.</p>
                <p>El Sitio Web de <span class='highlight-title'>enRemoto</span> proporciona gran diversidad de información, servicios y datos. El Usuario asume su responsabilidad para realizar un uso correcto del Sitio Web. Esta responsabilidad se extenderá a:</p>
                <ul>
                <li>Un uso de la información, Contenidos y/o Servicios y datos ofrecidos por <span class='highlight-title'>enRemoto</span> sin que sea contrario a lo dispuesto por las presentes Condiciones, la Ley, la moral o el orden público, o que de cualquier otro modo puedan suponer lesión de los derechos de terceros o del mismo funcionamiento del Sitio Web.</li>
                </ul>
                <ul>
                <li>La veracidad y licitud de las informaciones aportadas por el Usuario en los formularios extendidos por <span class='highlight-title'>enRemoto</span> para el acceso a ciertos Contenidos o Servicios ofrecidos por el Sitio Web. En todo caso, el Usuario notificará de forma inmediata a <span class='highlight-title'>enRemoto</span> acerca de cualquier hecho que permita el uso indebido de la información registrada en dichos formularios, tales como, pero no sólo, el robo, extravío, o el acceso no autorizado a identificadores y/o contraseñas, con el fin de proceder a su inmediata cancelación.</li>
                </ul>
                <p><span class='highlight-title'>enRemoto</span> se reserva el derecho de retirar todos aquellos comentarios y aportaciones que vulneren la ley, el respeto a la dignidad de la persona, que sean discriminatorios, xenófobos, racistas, pornográficos, spamming, que atenten contra la juventud o la infancia, el orden o la seguridad pública o que, a su juicio, no resultaran adecuados para su publicación.</p>
                <p>En cualquier caso, <span class='highlight-title'>enRemoto</span> no será responsable de las opiniones vertidas por los Usuarios a través de comentarios u otras herramientas de blogging o de participación que pueda haber.</p>
                <p>El mero acceso a este Sitio Web no supone entablar ningún tipo de relación de carácter comercial entre <span class='highlight-title'>enRemoto</span> y el Usuario.</p>
                <p>El Usuario declara ser mayor de edad y disponer de la capacidad jurídica suficiente para vincularse por las presentes Condiciones. Por lo tanto, este Sitio Web de <span class='highlight-title'>enRemoto</span> no se dirige a menores de edad. <span class='highlight-title'>enRemoto</span> declina cualquier responsabilidad por el incumplimiento de este requisito. </p>
                <p>El Sitio Web está dirigido principalmente a Usuarios residentes en España. <span class='highlight-title'>enRemoto</span> no asegura que el Sitio Web cumpla con legislaciones de otros países, ya sea total o parcialmente. Si el Usuario reside o tiene su domiciliado en otro lugar y decide acceder y/o navegar en el Sitio Web lo hará bajo su propia responsabilidad, deberá asegurarse de que tal acceso y navegación cumple con la legislación local que le es aplicable, no asumiendo <span class='highlight-title'>enRemoto</span> responsabilidad alguna que se pueda derivar de dicho acceso.</p>
                <p><br><strong>ACCESO Y NAVEGACIÓN EN EL SITIO WEB: EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD<br><br></strong><span class='highlight-title'>enRemoto</span> no garantiza la continuidad, disponibilidad y utilidad del Sitio Web, ni de los Contenidos o Servicios. <span class='highlight-title'>enRemoto</span> hará todo lo posible por el buen funcionamiento del Sitio Web, sin embargo, no se responsabiliza ni garantiza que el acceso a este Sitio Web no vaya a ser ininterrumpido o que esté libre de error.</p>
                <p>Tampoco se responsabiliza o garantiza que el contenido o software al que pueda accederse a través de este Sitio Web, esté libre de error o cause un daño al sistema informático (software y hardware) del Usuario. En ningún caso <span class='highlight-title'>enRemoto</span> será responsable por las pérdidas, daños o perjuicios de cualquier tipo que surjan por el acceso, navegación y el uso del Sitio Web, incluyéndose, pero no limitándose, a los ocasionados a los sistemas informáticos o los provocados por la introducción de virus.</p>
                <p><span class='highlight-title'>enRemoto</span> tampoco se hace responsable de los daños que pudiesen ocasionarse a los usuarios por un uso inadecuado de este Sitio Web. En particular, no se hace responsable en modo alguno de las caídas, interrupciones, falta o defecto de las telecomunicaciones que pudieran ocurrir.</p>
                <p><br><strong>POLÍTICA DE PRIVACIDAD Y PROTECCIÓN DE DATOS<br><br></strong>, <span class='highlight-title'>enRemoto</span> se compromete a adoptar las medidas técnicas y organizativas necesarias, según el nivel de seguridad de los datos recabados, de forma que garanticen la seguridad de los datos de carácter personal y eviten su alteración, pérdida, tratamiento o acceso no autorizado.</p>
                <p>Conforme a lo previsto en el artículo 5 de la LOPD, se informa al Usuario que los datos personales recabados por <span class='highlight-title'>enRemoto</span>, mediante los formularios extendidos en sus páginas, serán introducidos en un fichero automatizado bajo la responsabilidad de  <span class='highlight-title'>enRemoto</span>, y debidamente declarado e inscrito en el Registro General de la Agencia de Protección de Datos, con la finalidad de poder facilitar, agilizar y cumplir los compromisos establecidos entre ambas partes o el mantenimiento de la relación que se establezca en los formularios que suscriba o para atender una solicitud o consulta.</p>
                <p>Mientras el Usuario no comunique lo contrario a <span class='highlight-title'>enRemoto</span>, se entenderá que sus datos no han sido modificados, que el Usuario se compromete a notificar cualquier variación y que tiene el consentimiento para utilizarlos para las finalidades determinadas, explícitas y legítimas para las que se hayan obtenido. Pudiendo incluso ser, además, utilizados con una finalidad comercial de personalización, operativa y estadística, y actividades propias de su objeto social, autorizando expresamente a <span class='highlight-title'>enRemoto</span> para la extracción, almacenamiento de datos y estudios de marketing para adecuar el Contenido ofertado al Usuario, y así mejorar la calidad, funcionamiento y navegación por el Sitio Web.</p>
                <p>En las ocasiones en las que el Usuario pudiera facilitar sus datos a través de formularios, con el objeto de realizar consultas, solicitar información y/o por motivos relacionados con el Contenido ofrecido en el Sitio Web, si los datos que facilitara el Usuario fueran imprescindibles para el correcto desarrollo de todo esto, se informará de ello al Usuario indicándole que son datos cuya cumplimentación es de carácter obligatorio.</p>
                <p>En caso de no autorizar el tratamiento de sus datos con la finalidad señalada en el/los párrafo(s) anterior(es), el Usuario podrá ejercer sus derechos de información-acceso, rectificación, cancelación y oposición, (Derechos ARCO) de los que dispone y que pueden ser ejercitados ante <span class='highlight-title'>enRemoto</span>. Para ello, debe tener en cuenta las siguientes connotaciones:</p>
                <ul>
                <li>Derecho de Acceso: Es el derecho del Usuario a obtener información sobre sus datos concretos de carácter personal y del tratamiento que <span class='highlight-title'>enRemoto</span> haya realizado o realice, así como de la información disponible sobre el origen de dichos datos y las comunicaciones realizadas o previstas de los mismos.</li>
                </ul>
                <ul>
                <li>Derecho de Rectificación: Es el derecho del Usuario a que se modifiquen los datos que, estando dentro del fichero automatizado, resulten ser inexactos o incompletos.</li>
                </ul>
                <ul>
                <li>Derecho de Cancelación: Es el derecho a suprimir los datos de carácter personal del Usuario, a excepción de lo previsto en otras leyes aplicables que determinen la obligatoriedad de la conservación de los mismos, en tiempo y forma.</li>
                </ul>
                <ul>
                <li>Derecho de Oposición: Es el derecho del Usuario a que no se lleve a cabo el tratamiento de sus datos de carácter personal o se cese el tratamiento de los mismos por parte de <span class='highlight-title'>enRemoto</span>.</li>
                </ul>
                <p>Así pues, el Usuario podrá ejercitar sus derechos mediante comunicación escrita dirigida a  <span class='highlight-title'>enRemoto</span> con la referencia "LOPD-<span class='highlight-title'>enremoto.io</span>", especificando:</p>
                <ul>
                <li>Nombre, apellidos del Usuario y copia del DNI. En los casos en que se admita la representación, será también necesaria la identificación por el mismo medio de la persona que representa al Usuario, así como el documento acreditativo de la representación. La fotocopia del DNI podrá ser sustituida, por cualquier otro medio válido en derecho que acredite la identidad.</li>
                </ul>
                <ul>
                <li>Petición con los motivos específicos de la solicitud o información a la que se quiere acceder.</li>
                </ul>
                <ul>
                <li>Domicilio a efecto de notificaciones.</li>
                </ul>
                <ul>
                <li>Fecha y firma del solicitante.</li>
                </ul>
                <ul>
                <li>Todo documento que acredite la petición que formula.</li>
                </ul>
                <p>El Usuario deberá utilizar un método de envío que permita acreditar el envío y la recepción de la solicitud.</p>
                <p>Esta solicitud y todo otro documento adjunto deberá enviarse a la siguiente dirección y/o correo electrónico:</p>
                <p style="padding-left: 30px;"><span id="span_id_datos_responsable_fichero">C/Nàpols, 59<br>La Bisbal d'Empordà<br>Girona - 17100<br>España</span></p>

                <p><span class='highlight-title'>enRemoto</span> se reserva el derecho a modificar su Política de Privacidad, de acuerdo a su propio criterio, o motivado por un cambio legislativo, jurisprudencial o doctrinal de la Agencia Española de Protección de Datos. El uso de la Web después de dichos cambios, implicará la aceptación de los mismos.</p>

                <p><strong><br>POLÍTICA DE COOKIES </strong></p>
                <ul>
                <li>Cookies:</li>
                </ul>
                <p>El acceso a este Sitio Web puede implicar la utilización de cookies. Las cookies son pequeñas cantidades de información que se almacenan en el navegador utilizado por cada Usuario —en los distintos dispositivos que pueda utilizar para navegar— para que el servidor recuerde cierta información que posteriormente y únicamente el servidor que la implementó leerá. Las cookies facilitan la navegación, la hacen más amigable, y no dañan el dispositivo de navegación.</p>
                <p></p>
                <p>La información recabada a través de las cookies puede incluir la fecha y hora de visitas al Sitio Web, las páginas visionadas, el tiempo que ha estado en el Sitio Web y los sitios visitados justo antes y después del mismo. Sin embargo, ninguna cookie permite que esta misma pueda contactarse con el número de teléfono del Usuario o con cualquier otro medio de contacto personal. Ninguna cookie puede extraer información del disco duro del Usuario o robar información personal. La única manera de que la información privada del Usuario forme parte del archivo Cookie es que el usuario dé personalmente esa información al servidor.</p>

                <ul>
                <li>Cookies propias:</li>
                </ul>
                <p>Son aquellas cookies que son enviadas al ordenador o dispositivo del Usuario y gestionadas exclusivamente por <span class='highlight-title'>enRemoto</span> para el mejor funcionamiento del Sitio Web. La información que se recaba se emplea para mejorar la calidad del Sitio Web y su Contenido y su experiencia como Usuario. Estas cookies permiten reconocer al Usuario como visitante recurrente del Sitio Web y adaptar el contenido para ofrecerle contenidos que se ajusten a sus preferencias.</p>

                <ul>
                <li>Cookies de terceros:</li>
                </ul>
                <p>Son cookies utilizadas y gestionadas por entidades externas que proporcionan a <span class='highlight-title'>enRemoto</span> servicios solicitados por este mismo para mejorar el Sitio Web y la experiencia del usuario al navegar en el Sitio Web. Los principales objetivos para los que se utilizan cookies de terceros son la obtención de estadísticas de accesos y analizar la información de la navegación, es decir, como interactúa el Usuario con el Sitio Web.</p>
                <p>La información que se obtiene se refiere, por ejemplo, al número de páginas visitadas, el idioma, el lugar a la que la dirección IP desde el que accede el Usuario, el número de Usuarios que acceden, la frecuencia y reincidencia de las visitas, el tiempo de visita, el navegador que usan, el operador o tipo de dipositivo desde el que se realiza la visita. Esta información se utiliza para mejorar el Sitio Web, y detectar nuevas necesidades para ofrecer a los Usuarios un Contenido y/o servicio de óptima calidad. En todo caso, la información se recopila de forma anónima y se elaboran informes de tendencias del Sitio Web sin identificar a usuarios individuales.</p>
                <p>Puede obtener más información sobre las cookies, la información sobre la privacidad, o consultar la descripción del tipo de cookies que se utiliza, sus principales características, periodo de expiración, etc. en el siguiente(s) enlace(s):</p>
                <p style="padding-left: 30px;"><span style="white-space:pre-wrap;"><span id="span_id_tercero_contratado_para_cookies" class="encours">Googly analytics<br>https://analytics.google.com/</span></span></p>
                <p>La(s) entidad(es) encargada(s) del suministro de cookies podrá(n) ceder esta información a terceros, siempre y cuando lo exija la ley o sea un tercero el que procese esta información para dichas entidades.</p>
                <ul>
                <li>Deshabilitar, rechazar y eliminar cookies:</li>
                </ul>
                <p>El Usuario puede deshabilitar, rechazar y eliminar las cookies —total o parcialmente— instaladas en su dispositivo mediante la configuración de su navegador (entre los que se encuentran, por ejemplo, Chrome, Firefox, Safari, Explorer). En este sentido, los procedimientos para rechazar y eliminar las cookies pueden diferir de un navegador de Internet a otro. En consecuencia, el Usuario debe, acudir a las instrucciones facilitadas por el propio navegador de Internet que esté utilizando. En el supuesto de que rechace el uso de cookies —total o parcialmente— podrá seguir usando el Sitio Web, si bien podrá tener limitada la utilización de algunas de las prestaciones del mismo.</p>
                <ul>
                <li>Cambios en la Política de Cookies:</li>
                </ul>
                <p>Es posible que la Política de Cookies del Sitio Web cambie o se actualice, por ello es recomendable revisar esta política cada vez que acceda al Sitio Web con el objetivo de estar adecuadamente informado sobre cómo y para qué usamos las cookies.</p>
                <p><br><strong>POLÍTICA DE ENLACES</strong></p>
                <p>Se informa que el Sitio Web de <span class='highlight-title'>enRemoto</span> pone o puede poner a disposición de los Usuarios medios de enlace (como, entre otros, links, banners, botones), directorios y motores de búsqueda que permiten a los Usuarios acceder a sitios web pertenecientes y/o gestionados por terceros.</p>
                <p>La instalación de estos enlaces, directorios y motores de búsqueda en el Sitio Web tiene por objeto facilitar a los Usuarios la búsqueda de y acceso a la información disponible en Internet, sin que pueda considerarse una sugerencia, recomendación o invitación para la visita de los mismos.</p>
                <p><span class='highlight-title'>enRemoto</span> no ofrece ni comercializa por sí ni por medio de terceros los productos y/o servicios disponibles en dichos sitios enlazados.</p>
                <p>Asimismo, tampoco garantizará la disponibilidad técnica, exactitud, veracidad, validez o legalidad de sitios ajenos a su propiedad a los que se pueda acceder por medio de los enlaces.</p>
                <p><span class='highlight-title'>enRemoto</span> en ningún caso revisará o controlará el contenido de otros sitios web, así como tampoco aprueba, examina ni hace propios los productos y servicios, contenidos, archivos y cualquier otro material existente en los referidos sitios enlazados.</p>
                <p><span class='highlight-title'>enRemoto</span> no asume ninguna responsabilidad por los daños y perjuicios que pudieran producirse por el acceso, uso, calidad o licitud de los contenidos, comunicaciones, opiniones, productos y servicios de los sitios web no gestionados por <span class='highlight-title'>enRemoto</span> y que sean enlazados en este Sitio Web.</p>
                <p>El Usuario o tercero que realice un hipervínculo desde una página web de otro, distinto, sitio web al Sitio Web de <span class='highlight-title'>enRemoto</span> deberá saber que:</p>
                <p>No se permite la reproducción —total o parcialmente— de ninguno de los Contenidos y/o Servicios del Sitio Web sin autorización expresa de <span class='highlight-title'>enRemoto</span>.</p>
                <p>No se permite tampoco ninguna manifestación falsa, inexacta o incorrecta sobre el Sitio Web de <span class='highlight-title'>enRemoto</span>, ni sobre los Contenidos y/o Servicios del mismo.</p>
                <p>A excepción del hipervínculo, el sitio web en el que se establezca dicho hiperenlace no contendrá ningún elemento, de este Sitio Web, protegido como propiedad intelectual por el ordenamiento jurídico español, salvo autorización expresa de <span class='highlight-title'>enRemoto</span>.</p>
                <p>El establecimiento del hipervínculo no implicará la existencia de relaciones entre <span class='highlight-title'>enRemoto</span> y el titular del sitio web desde el cual se realice, ni el conocimiento y aceptación de <span class='highlight-title'>enRemoto</span> de los contenidos, servicios y/o actividades ofrecidos en dicho sitio web, y viceversa.</p>
                <p><br><strong>PROPIEDAD INTELECTUAL E INDUSTRIAL<br></strong><br><span class='highlight-title'>enRemoto</span> por sí o como parte cesionaria, es titular de todos los derechos de propiedad intelectual e industrial del Sitio Web, así como de los elementos contenidos en el mismo (a título enunciativo y no exhaustivo, imágenes, sonido, audio, vídeo, software o textos, marcas o logotipos, combinaciones de colores, estructura y diseño, selección de materiales usados, programas de ordenador necesarios para su funcionamiento, acceso y uso, etc.). Serán, por consiguiente, obras protegidas como propiedad intelectual por el ordenamiento jurídico español, siéndoles aplicables tanto la normativa española y comunitaria en este campo, como los tratados internacionales relativos a la materia y suscritos por España.</p>
                <p>Todos los derechos reservados. En virtud de lo dispuesto en la Ley de Propiedad Intelectual, quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de <span class='highlight-title'>enRemoto</span>.</p>
                <p>En caso de que el Usuario o tercero considere que cualquiera de los Contenidos del Sitio Web suponga una violación de los derechos de protección de la propiedad intelectual, deberá comunicarlo inmediatamente a <span class='highlight-title'>enRemoto</span> a través de los datos de contacto del apartado de INFORMACIÓN GENERAL de este Aviso Legal y Condiciones Generales de Uso.</p>
                <p><strong><br>ACCIONES LEGALES, LEGISLACIÓN APLICABLE Y JURISDICCIÓN<br></strong><br><span class='highlight-title'>enRemoto</span> se reserva la facultad de presentar las acciones civiles o penales que considere necesarias por la utilización indebida del Sitio Web y Contenidos, o por el incumplimiento de las presentes Condiciones.</p>
                <p>La relación entre el Usuario y <span class='highlight-title'>enRemoto</span> se regirá por la normativa vigente y de aplicación en el territorio español. De surgir cualquier controversia en relación a la interpretación y/o a la aplicación de estas Condiciones las partes someterán sus conflictos a la jurisdicción ordinaria sometiéndose a los jueces y tribunales que correspondan conforme a derecho.</p>                  </div>

                <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
        </section>

        <section id='terminos' class="page" v-show="section === 'terminos'"> 
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
            terminos
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
        </section>

        <section id='contacto' class="page" v-show="section === 'contacto'"> 
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
            
            <div class="container_map">
              <div style="text-align:center">
                <h2>Contacto</h2>
                <p>Puedes ponerte en contacto con el equipo de enRemoto para información, preguntas, problemas, quejas o invitarnos a una cerveza:</p>
              </div>
              <div class="row_map">
                <div class="column_map">
                  <div id="map" style="width:100%;height:500px"></div>
                </div>
                <div class="column_map">
                  <form action="/action_page.php">
                    <label for="fname">Nombre</label>
                    <input class='input_map' type="text" id="fname" name="name_contact" placeholder="Tu nombre..">
                    <label for="lname">Correo</label>
                    <input class='input_map' type="text" id="lname" name="email_contact" placeholder="Correo de respuesta..">
                    <label for="country">Pais</label>
                    <input class='input_map' type="text" id="country" name="country_contact" placeholder="Pais">
                    <label for="subject">Texto</label>
                    <textarea class='input_map' id="subject" name="subject" placeholder="" style="height:170px"></textarea>
                    <input class='input_map_submit' type="submit" value="Submit">
                  </form>
                </div>
              </div>
            </div>

            <!-- Initialize Google Maps -->
            <script>
            function myMap() {
              var myCenter = new google.maps.LatLng(51.508742,-0.120850);
              var mapCanvas = document.getElementById("map");
              var mapOptions = {center: myCenter, zoom: 12};
              var map = new google.maps.Map(mapCanvas, mapOptions);
              var marker = new google.maps.Marker({position:myCenter});
              marker.setMap(map);
            }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
        </section>

        <section id='sobre' class="page" v-show="section === 'sobre'" style='padding:30px;'> 
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
    
            <br /><br />
            <h2> enRemoto </h2>
            enRemoto es una plataforma para buscar ofertas para trabajadores en remoto así como buscar el mejor talento sea donde sea del mundo. Por que limitarte a contratar en tu propia ciudad? Todo son ventajas, tanto para el trabajador como para tu empresa. 
            
            <br /><br />
            <p>Conozca 5 de los muchos beneficios interesantes del trabajo a distancia:</p>
            <br />
            <ol>
                <li><strong>Su personal será más productivo</strong></li>
            </ol>
            <p>Muchos jefes y directivos creen que al permitir que sus empleados trabajen desde casa, perderán el día e incumplirán sus fechas de entrega. ¿Piensa lo mismo? Esto es incorrecto. Numerosos estudios han demostrado que en diversas ocasiones el trabajo a distancia incrementa la productividad de los empleados, mucho más que la de quienes permanecen en una oficina. Al no tener compañeros habladores rondando su escritorio en busca de conversación, usted tendrá más tiempo para concentrarse en el trabajo y estará libre de distracciones. Esta es una de las muchas ventajas que tiene trabajar en casa.</p>
            <br />
            <ol start="2">
                <li><strong>Consejos para combatir la soledad y el aislamiento social</strong></li>
            </ol>
            <p>Pocos son los empleados privilegiados que realmente pueden disfrutar de una caminata a la oficina, por la cercanía que existe de su trabajo a la casa. La gran mayoría inicia su jornada laboral con interminables viajes, aplastados en el transporte masivo, o siendo empujados en las estaciones como si estuvieran en medio de una estampida.&nbsp; Pueden pasar hasta 6 horas de sus días metidos en un trancón, perdiendo tiempo de trabajo y con una pésima calidad de vida. Por el contrario, los “teletrabajadores” pueden comenzar su día laboral a primera hora, desde la calidez de sus hogares y dedicar más tiempo al trabajo mientras disfrutan de una taza de café caliente.</p>
            <br />
            <ol start="3">
                <li><strong>Ayude al medio ambiente</strong></li>
            </ol>
            <p>Si se calcula toda la electricidad que se utiliza para operar una oficina y el dinero que se gasta en materiales, tales como papel y cartuchos de tinta, le sorprenderá lo poco amigable que está siendo con el medio ambiente. Al promover el trabajo a distancia podrá, no solo ahorrar en gastos corporativos, sino también reducir en gran medida la huella de carbono (no necesitará de un vehículo para desplazarse a la oficina).</p>
            <br />
            <ol start="4">
                <li><strong>Su personal tendrá mejor salud</strong></li>
            </ol>
            <p>Con más tiempo disponible (gracias a no tener que desplazarse a la oficina), los trabajadores remotos suelen realizar más ejercicio físico durante el día. Tienen tiempo para ir al gimnasio y no están sentados durante 8 horas seguidas. También pueden mejorar su salud ya que en casa pueden cocinar alimentos saludables, mientras que en la oficina muchas veces terminan por alimentarse de las máquinas expendedoras por no tener tiempo de preparar sus alimentos desde la noche anterior. Tenga en cuenta este punto, pues una fuerza de trabajo saludable es más productiva y por ende lleva a reducir el número de días en los que el personal solicita permiso para acudir a las citas médicas o incluso los días de licencia por enfermedad.</p>
            <br />
            <ol start="5">
                <li><strong>Consolide relaciones de lealtad</strong></li>
            </ol>
            <p>Cuando usted otorga a sus empleados la posibilidad de personalizar su horario, para que puedan equilibrar mejor su vida profesional y su vida personal, sucede algo interesante: sienten gratitud. Este reconocimiento se manifiesta en forma de lealtad hacia la empresa, razón por la cual la productividad es mayor. Además, al contar con empleados fidelizados, reducirá los costos de contratación por alta rotación de personal.</p></p>

            <br /><br />
            <a @click="section='trabajos'" class='back_text_button'> < Atrás </a>
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

        <!-- offer model
        <div v-show="showOffer" class="modal-show-offer" @click='showOffer=false'>
        </div>
         -->

        <div v-show="showOffer" class="jumbotron jumbotron-fluid modal-show-offer-div"></div>
        <div v-show="showOffer" class="jumbotron jumbotron-fluid modal-show-offer-div" style='position:absolute;background-image:none;'>
          <div class="container col-md-5 col-sm-12 modal-show-info-div">
            <h1 class="display-4 jumbotron-title">Crea tu oferta</h1>
            <p class="jumbotron-text">Contrata el mejor talento, esté dónde esté. </p>

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
                    199 <span>€/oferta</span>
                </div>
                
                <div class='offer-price'>
                    <h3> Oferta promoción </h3>
                    99 <span>€ / oferta</span>
                </div>
            </div>

            <div> 
                <p style='color:#fff;font-size:14px;'> Así se verá su oferta: </p>
                <table class="table job-table" style='background-color:#fff;border-radius:6px;' @click='showNewJobDetail = !showNewJobDetail'>
                    <tr class="job-box" style='border-bottom:0px;'>
                        <td class='job-logo-div'>
                            <div class="image-preview" v-if="imageData.length > 0" >
                                <img class="preview" :src="imageData" style='width:60px;height:60px;'>
                            </div>
                            <div v-else class='job-logo text-job-logo rounded'>{{newJob.title | logotize}}</div>
                        </td>
                        <td class='job-info'>
                            <h2>{{ newJob.title.length > 50 ? newJob.title.slice(0,50) : newJob.title }}</h2>
                            <p style='margin-bottom:0px;'> <span style='font-weight:600;'>{{ newJob.company }}</span> - {{ newJob.description.length > 50 ? newJob.description.slice(0,50) + '...' : newJob.description }}</p>
                        </td>
                        <td class='job-tags' style='display:block;width:120px;'>
                            <span v-for="tag in newJob.tags.split(' ')" class="badge badge-secondary job-badge" :class="(selectedTags.indexOf(tag) > -1) ? 'activeTag' : ''" @click="changeFilterTag($event)" style='margin-bottom:2px;'>{{ tag }}</span>
                        </td>
                        <td class='job-date' style='width:30px;padding-top:25px;color:#555;'>
                            Ahora
                        </td>
                    </tr>
                </table>
                <div v-show='showNewJobDetail' style='background-color:#fff;border-radius:6px;'>
                    <div style="float:left;margin-top:10px;margin-bottom:10px;font-weight:600;">{{newJob.company}}</div>
                    <span v-if="newJob.salary !== ''" style='float:left;'>- {{newJob.salary}} </span>

                    <div v-html="newJob.description" style='clear:both;display:block;max-width:450px;font-size:13px;text-align:justify;'> 
                        {{ newJob.description }}
                    </div>
                    <hr>

                    <a href="{{newJob.link}}" target='_blank' style='margin-left:40%;'>
                        <button type="button" class="btn btn-warning btn-lg" style='background-color:#b93a32 !important;border:0px;'>Aplicar</button>
                    </a>
                    <hr>

                    <p style='text-align:center;margin-bottom:10px;font-size:12px;'>
                        Haga una referencia que encontró el trabajo en enRemoto, gracias por ayudarnos a que más empresas publiquen aquí.
                    </p>

                    <p style='text-align:justify;margin-bottom:40px;font-size:11px;'>
                        <span style='font-weight:600;'> ⚠ Advertencia</span>: cuando solicite empleo, NUNCA tendrá que pagar para solicitarlo. Eso es una estafa! Siempre verifique que realmente está hablando con la empresa en el puesto de trabajo y no con un impostor. Las estafas en el trabajo remoto estan en auge, ¡ten cuidado! Al hacer clic en el botón para aplicar arriba, dejará enRemoto.io y accederá a la página de la aplicación del trabajo para esa compañía fuera de este sitio. enRemoto no acepta ninguna responsabilidad o responsabilidad como consecuencia de la confianza depositada en la información allí (sitios externos) o aquí.
                    </p>
                </div>
            </div>           
          </div>
          <div class="container col-md-7 col-sm-12 modal-show-offer-right">
            <form id='createNewJob' v-show="error.general === null" action="api/create" class="col-sm-12 col-md-12 form-job-offer" accept-charset="UTF-8" role="form" type="POST"> <!-- @submit.prevent="create"  -->
                <a style='position:fixed;top:20px;right:20px;background-color:#fff;border-radius:18px;width:18px;height:18px;text-align:center;line-height:17px;font-size:12px;cursor:pointer;' @click='(showOffer = false) || (error.general = null)'>x</a>
                <div class="form-group">
                    <label for="title">*Título</label><small class="form-text">Ej: Desarrollador de Software.</small>
                    <input v-model="newJob.title" type="text" class="form-control" :class="error.title ? 'hasError' : ''" id="jobTitle" placeholder="{{error.title ? error.title : 'Título oferta'}}">                        
                </div>
                <div class="form-group">
                    <label for="description">*Descripción</label><small class="form-text">Ej: Buscamos desarrollador PHP con más de 5 años de experiéncia....</small>
                    <textarea style='display:none;' v-model="newJob.description" type="text" class="form-control"  id="jobDescription" placeholder="{{error.description ? error.description : 'Descripción de la oferta... puedes usar markup para formatear el texto'}}"></textarea>                        

                    <!-- Create the toolbar container -->
                    <div id="editor-container" :class="error.description ? 'hasError' : ''"></div>

                </div>
                <div class="form-group">
                    <label for="title">*Categoría</label><small class="form-text">Seleccione la categoría más adecuada.</small>
                    <select v-model="newJob.category" class="form-control" :class="error.category ? 'hasError' : ''" id="jobCategory">                        
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
                    <input v-model="newJob.tags" type="text" class="form-control" :class="error.tags ? 'hasError' : ''" id="jobTags" placeholder="{{error.tags ? error.tags : 'Tags'}}">                        
                </div>
                <div class="form-group">
                    <label for="title">Salario</label><small class="form-text">Rango salarial (opcional).</small>
                    <input v-model="newJob.salary" type="text" class="form-control" id="jobSalary" placeholder="Salario">                        
                </div>
                <div class="form-group">
                    <label for="title">Url</label><small class="form-text">La página web donde enviar la solicitud de la oferta.</small>
                    <input v-model="newJob.link" type="text" class="form-control" id="jobUrl" placeholder="URL">                        
                </div>                 
        

                <div class="form-group">
                    <label for="title">*Empresa</label><small class="form-text">Ej: Facebook</small>
                    <input v-model="newJob.company" type="text" class="form-control" :class="error.company ? 'hasError' : ''" id="jobCompany" placeholder="{{error.company ? error.company : 'Empresa'}}">                        
                </div>                    
                <div class="form-group">
                    <label for="title">Logo</label><small class="form-text">Formato: JPG, PNG, GIF. Tamaño óptimo: 64x64 pixeles.</small>
                    <p v-if="error.logo !== null">{{error.logo}}</p>
                    <input v-model="newJob.logo" @change="onFileChange" accept="image/*" type="file" class="form-control" id="jobLogo" placeholder="Logo empresa">                        
                </div>
                
                <div class="form-group">
                    <label for="title">*Email</label><small class="form-text">Le permitirá gestionar la oferta y recibir las solicutudes de los candidatos.</small>
                    <input v-model="newJob.email" type="email" class="form-control" :class="error.email ? 'hasError' : ''" id="jobEmail" placeholder="{{error.email ? error.email : 'Email empresa'}}">                        
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary button-form-submit" @click="create">Enviar</button>
                <div style="display:none;">
                    <script 
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_OMQPZa6KHK9Vezj2gtCkdGkW"
                        data-amount="9900"
                        data-name="JP.Aulet"
                        data-description="Crear una oferta enRemoto"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="false"
                        data-currency="eur"
                        data-title="{{newJob.title}}"
                        data-email="{{newJob.email}}">
                    </script>
                </div>
            </form>

            <div v-show="error.general !== null" style='padding:50px 30px;font-size:14px;background-color:rgba(0,0,0,0.25);color:#fff;margin-top:20%;height:30vh;'>{{error.general}}</div>

          </div>
        
          <div class='col-sm-12 close-modal-button' @click='(showOffer = false) || (error.general = null)'>Cerrar</div>
        </div>        
        <!-- offer model -->

        
        <!-- Footer -->
        <footer class='footer-bar'>
            <nav role="navigation">
                <div class="container">
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
                            <!--
                            <li>
                                <a class="bottom-page-scroll">Alertas</a>
                            </li>                            
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
                <li @click="section = 'faq'">FAQ</li>
                <li @click="section = 'privacidad'">Política privacidad</li>
                <li @click="section = 'terminos'">Terminos y condiciones</li>
                <li @click="section = 'contacto'">Contacto</li>
                <li @click="section = 'sobre'">Sobre `esRemoto`</li>
            </ul>

            <div class="container text-center copyright-div">
                <p>Copyright &copy; J.P. Aulet</p>
            </div>
        </footer>


        <!--//BLOQUE COOKIES-->
        <div id="barraaceptacion">
            <div class="inner">
                Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
                Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
                <a href="javascript:void(0);" class="ok" @click="storeCookie();"><b>OK</b></a> | 
                <a @click="section = 'privacidad'" class="info">Más información</a>
            </div>
        </div>        

        <script src="https://checkout.stripe.com/checkout.js"></script>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script> 
        <script src="./js/vue.min.js"></script>
        <script src="./js/vue-resource.min.js"></script> 
        <script src="./js/app.js"></script> 

        <!-- Main Quill library -->
        <link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
        <script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
        <!-- Initialize Quill editor -->
        <script>
          var quill = new Quill('#editor-container', {
              modules: {
                toolbar: true
              },
              placeholder: 'Descripción de la oferta... puedes usar HTML para formatear el texto',
              theme: 'snow'  // or 'bubble'
            });
        </script>

    </body>
</html>
