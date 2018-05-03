Vue.http.headers.common['X-CSRF-TOKEN'] = $("meta[name=token]").attr("value");

var vm = new Vue({
    el: '#page-top',
    data: {
        allJobs: [],
        selectedCat: 0,
        jobs: [],
        tagsList: [],
        selectedTags: [],
        catCounter: [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ],
        isLogged: false,
        isAlert: false,
        loginData: {
            email: null,
            password: null,
            memory: false
        },        
        newJob: {
            title: null,
            description: null,
            tag: null,
            category: null,
            salary: null,
            company: null,
            email: null,
            logo: null,
            link: null
        },
        updateData: {
            content: null
        },        
        error: {
            general: null,
            title: null,
            description: null,
            tag: null,
            category: null,
            salary: null,
            company: null,
            email: null,
            logo: null         
        },
        temp: {
            id: null,
            index: null           
        },
        jobCreated:false,
        resource: null,
        showOffer: false,
        searchText: null,
        msgJobDiv: '',
        section: 'trabajos',
        total: 0,
        idViewJob: null,
    },

    ready: function() {
        this.getJobs();        

        if( this.getCookie('enremoto')){
            document.getElementById("barraaceptacion").style.display="none";
        }
    },

    methods: {

        getJobs: function() {
            this.$http.get('api/jobs', (data) => {
                if(typeof data !== undefined ){ 
                    this.allJobs = data;
                    this.jobs = data;

                    if(this.jobs.length === 0) {
                        this.msgJobDiv = 'No hay ofertas de trabajo...';
                    }
                }
                
                this.categoriesCount();
                this.generateTagsList();
                this.calculateTotalJobs();

            }).error( (data) => {
                this.msgJobDiv = " Error cargando las ofertas... Vuelvelo a intentar mas tarde! ";
            });
        },

        searchData: function() {
            console.log('search data...');
            if(this.searchText === ''){
                this.jobs = this.allJobs;
                var oldSelectedTags = this.selectedTags;
                this.filterCat(this.selectedCat);
                this.selectedTags = oldSelectedTags;
                this.filterTags();
                return;
            }

            var addAllDays = Object.assign({}, this.jobs);
            for (var key in this.jobs) {
                var addJobs = [];
                var dayJobs = this.jobs[key];                
                addAllDays[key] = dayJobs.filter(this.filterSearch);;
            }
            this.jobs = addAllDays;
            this.calculateTotalJobs();
        },

        filterSearch: function(value, index, self){
            var regexSearch = "/"+this.searchText+"/i";
            return value.title.toLowerCase().indexOf(this.searchText.toLowerCase()) > 0; 
        },

        filterCat: function(catId,regenerateTags){
            this.selectedCat = catId;
            this.selectedTags = [];
            if(catId === 0){
                this.jobs = this.allJobs;
                this.generateTagsList();
                this.calculateTotalJobs();
                return;
            }
            
            var addAllDays = Object.assign({}, this.allJobs);
            for (var key in this.allJobs) {
                var addJobs = [];
                var dayJobs = this.allJobs[key];
                dayJobs.map((current,index,arr) => {
                   if(current.category === catId){
                      addJobs.push(current);                       
                   }                    
                });
                addAllDays[key] = addJobs;
            }

            this.jobs = addAllDays;
            this.generateTagsList();
            this.calculateTotalJobs();
        },

        changeFilterTag: function(event){
            var tag = event.target.innerHTML;            
            var index = this.selectedTags.indexOf(tag);
            
            if( index === -1){
                this.selectedTags.push(tag);
            }else{
                this.selectedTags.splice(index,1);
            }

            this.filterTags();
        },


        filterTags: function(){
            if(this.selectedTags.length === 0){
                this.jobs = this.allJobs;
                this.filterCat(this.selectedCat);
                return;
            }

            var addAllDays = Object.assign({}, this.allJobs);
            for (var key in this.allJobs) {
                var addJobs = [];
                var dayJobs = this.allJobs[key];
                var arrayLength = dayJobs.length;
                for (var i=0; i < arrayLength; i++){
                    var current = dayJobs[i];
                    let hasTag = false;
                    this.selectedTags.forEach((selectedTag) => {
                        hasTag = hasTag || (current.tags.indexOf(selectedTag) !== -1);
                    });

                    if(hasTag){
                        addJobs.push(current);
                    }
                }
                
                addAllDays[key] = addJobs;
            }
            this.jobs = addAllDays;
            this.calculateTotalJobs();
        },

        categoriesCount: function(){
            if(Object.keys(this.allJobs).length === 0 ){
                return;
            }

            for (var key in this.allJobs) {
                var dayJobs = this.allJobs[key];
                var arrayLength = dayJobs.length;
                for (var i=0; i < arrayLength; i++){
                    var current = dayJobs[i];
                    var catIndex = current.category;
                    var newVal = this.catCounter[current.category] + 1;
                    this.catCounter.$set(catIndex, newVal);
                }              
            }
            Vue.set(this.catCounter, 0, this.allJobs.length);
        },

        generateTagsList: function(){
            var newTags = [];
            for (var key in this.jobs) {
                var dayJobs = this.allJobs[key];
                var arrayLength = dayJobs.length;
                for (var i=0; i < arrayLength; i++){
                    var current = dayJobs[i];
                    current.tags.forEach((tag) => {
                        newTags.push(tag);
                    });
                }
            }
            this.tagsList = newTags.filter(this.onlyUnique);
        },

        onlyUnique: function(value, index, self) { 
            return self.indexOf(value) === index;
        },

        login: function() {
            this.error.email = this.error.password = this.isAlert = '';
            this.$http.post('auth/login', this.loginData, (data) => {
                if (data.result === 'success') {
                    this.isLogged = true;
                    this.paginate();
                    window.location = '#page-top';
                } else {
                    this.isAlert = true;
                };
            }).error( (data) => {
                if (data.password) {
                    this.error.password = data.password[0];
                }
                if (data.email) {
                    this.error.email = data.email[0];
                }
            });
        },      

        logout: function() {
            this.$http.get('auth/logout', () => {
                $.each(this.jobs, function(key) {
                    this.jobs[key].is_owner = false;
                });
                this.isLogged = false;
            }).error( (data) => {
                console.log("Error:" + JSON.stringify(data));
            });
        },

        create: function(event) {            
            valid = (
                this.newJob.title && 
                this.newJob.description && 
                this.newJob.tags && 
                this.newJob.category && 
                this.newJob.company &&
                this.newJob.email &&
                this.validEmail(this.newJob.email)
            );

            this.error = {
                general: null,
                title: null,
                description: null,
                tag: null,
                category: null,
                salary: null,
                company: null,
                email: null,
                logo: null         
            };

            if(!valid){
                if(!this.newJob.title) this.error.title = "Título obligatorio.";
                if(!this.newJob.description) this.error.description = "Descripción obligatoria.";
                if(!this.newJob.tags) this.error.tags = "Tag obligatorio.";
                if(!this.newJob.category) this.error.category = "Categoria obligatoria.";
                if(!this.newJob.category) this.error.company = "Título de la compañia obligatoria.";
                if(!this.newJob.email){ 
                    this.error.email = "Email obligatorio."; 
                } else {
                    this.error.email = "El email no es válido.";        
                }

                event.preventDefault();
                return false;
            }

            if(this.jobCreated){ return; }
            this.$http.post('api/job', this.newJob, (data) => {
                this.jobCreated = true;

                /*
                var handler = StripeCheckout.configure({
                    key: 'pk_test_OMQPZa6KHK9Vezj2gtCkdGkW',
                    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                    locale: 'auto',
                    token: function(token) {
                      // You can access the token ID with `token.id`.
                      // Get the token ID to your server-side code for use.
                    $.post("", {token: token, type: 'charge'}, function(res){
                        if(res.status){
                            $('form').submit();
                        }
                    },"json");
                      console.log(token);
                    }
                });

                handler.open({
                  image: '/logo.png',
                  name: 'Shop.com',
                  description: 'Product',
                  email: userEmail,
                  currency: 'gbp',
                  amount: 2000
                });
                */

            }).error( (data) => {
                this.jobCreated = false;
                this.error.general = "Lamentablemente la oferta no se ha podido crear correctamente. Puede ponerse en contacto con info(at)enremoto.com para obtener ayuda. Se ha enviado un correo con su información y nos pondremos en contacto con usted lo antes posible para solucionar esta situacion. Atentamente, el equipo de enRemoto.";
                $('.stripe_checkout_app').hide();               
            });

            /*
            this.newJob = {
                title: null,
                description: null,
                tag: null,
                category: null,
                salary: null,
                company: null,
                email: null,
                logo: null,
                link: null
            };
            */
        },

        validEmail:function(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        },

        destroy: function(id) {            
            this.$http.delete({id: id}, (data) => {
                console.log("Your job has been deleted.");
            }).error( (data) => {
                console.log("Error:" + JSON.stringify(data));
            });        
        },

        edit: function(id, index) {
            this.error.updateContent = null;
            this.temp.id = this.jobs[index].id;
            this.temp.index = index;
            this.updateData.content = this.jobs[index].content;
            $('#myModal').modal();            
        },

        update: function() {
            this.error.updateContent = null;
            this.resource.update({id: this.temp.id}, this.updateData, (data) => {
                this.jobs[this.temp.index].content = this.updateData.content;
                $('#myModal').modal('hide');
            }).error( (data) => {
                this.error.updateContent = data.content[0];
            });            
        },

        onFileChange: function(e) {
          const file = e.target.files[0];
          this.newJob.logo = URL.createObjectURL(file);
        },

        getCookie: function (c_name){
            var c_value = document.cookie;
            var c_start = c_value.indexOf(" " + c_name + "=");
            if (c_start == -1){
                c_start = c_value.indexOf(c_name + "=");
            }
            if (c_start == -1){
                c_value = null;
            }else{
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end == -1){
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start,c_end));
            }
            return c_value;
        },
         
        setCookie: function(c_name,value,exdays){
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        },

        storeCookie: function (){
            this.setCookie('enremoto','1',365);
            document.getElementById("barraaceptacion").style.display="none";
        },

        calculateTotalJobs: function(){
            var total = 0;
            for (var key in this.jobs) {
                var dayJobs = this.jobs[key];
                var arrayLength = dayJobs.length;
                for (var i=0; i < arrayLength; i++){
                    total++;
                }
            }
            this.total = total;
        },
    },

    filters: {
      logotize: function (value) {
        if (!value) return '';
        value = value.toString();
        return value.charAt(0).toUpperCase();
      },
      dateFormat: function(value) {
        return value.substr(11,5);
      },
      striphtml: function (value) {
        if (!value) return '';
        let regex = /(<([^>]+)>)/ig;
        return value.replace(regex, "");
      }
    }
});

