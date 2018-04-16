Vue.http.headers.common['X-CSRF-TOKEN'] = $("meta[name=token]").attr("value");

var vm = new Vue({
    el: '#page-top',
    data: {
        allJobs: [
            { title: 'Desarrollador JAVA', description: 'Experto en JAVA i Spring', tags: ['dev','javascript','react'], src:null, category: 1 },
            { title: 'Traductor Ingles > Español', description: 'Traductor de textos en inglés hacia Español', tags: ['english','traductor'], src:'logo1.png', category: 1 },
            { title: 'Ilustrator', description: 'Ilustrador en practicas', tags: ['diseño','ilustrator','photoshop'], src:null, category: 2 },
            { title: 'Jefe de Desarrollo', description: 'Jefe de desarrollo en plantilla', tags: ['coo','desarollo','HTML','CSS'], src:'logo2.png', category: 3 },
            { title: 'Frontend Developer', description: 'Desarrollador junior con experiencia en frontend', tags: ['backend','javascript','vuejs','vue'], src:null, category: 3 }
        ],
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
        createData: {
            content: null
        },
        updateData: {
            content: null
        },
        error: {
            email: null,
            password: null,  
            createContent: null,
            updateContent: null         
        },
        temp: {
            id: null,
            index: null           
        },
        resource: null,
        showOffer: false,
        searchText: null
    },

    ready: function() {
        this.jobs = this.allJobs;

        this.generateTagsList();

        this.categoriesCount();
    },

    methods: {

        searchData: function() {
            if(this.searchText === ''){
                this.jobs = this.allJobs;
                var oldSelectedTags = this.selectedTags;
                this.filterCat(this.selectedCat);
                this.selectedTags = oldSelectedTags;
                this.filterTags();
                return;
            }
            this.jobs = this.jobs.filter(this.filterSearch);
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
                return;
            }
            this.jobs = this.allJobs.filter(function(current,index,arr){
               return current.category === catId; 
            });

            this.generateTagsList();
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

            var addJobs = [];
            this.allJobs.map((current) => {
                let hasTag = false;
                this.selectedTags.forEach((selectedTag) => {
                    hasTag = hasTag || (current.tags.indexOf(selectedTag) !== -1);
                });

                if(hasTag){
                    addJobs.push(current);
                }
            });

            this.jobs = addJobs;
        },

        categoriesCount: function(){
            this.allJobs.map((current) => {
                var catIndex = current.category;
                var newVal = this.catCounter[current.category] + 1;
                this.catCounter.$set(catIndex, newVal);
            });
            Vue.set(this.catCounter, 0, this.allJobs.length);
        },

        generateTagsList: function(){
            var newTags = [];

            this.jobs.map((current)=> {
                current.tags.forEach((tag) => {
                    newTags.push(tag);
                });
            });        

            this.tagsList = newTags.filter(this.onlyUnique);
        },

        onlyUnique: function(value, index, self) { 
            return self.indexOf(value) === index;
        },

        login: function() {
            this.error.email = this.error.password = this.isAlert = '';
            this.$http.post('auth/login', this.loginData, function (data) {
                if (data.result === 'success') {
                    this.isLogged = true;
                    this.paginate();
                    window.location = '#page-top';
                } else {
                    this.isAlert = true;
                };
            }).error(function (data) {
                if (data.password) {
                    this.error.password = data.password[0];
                }
                if (data.email) {
                    this.error.email = data.email[0];
                }
            });
        },      

        logout: function() {
            this.$http.get('auth/logout', function () {
                $.each(this.jobs, function(key) {
                    this.jobs[key].is_owner = false;
                });
                this.isLogged = false;
            }).error(function (data) {
                console.log("Error:" + JSON.stringify(data));
            });
        },

        create: function() {
            this.error.createContent = null;
            this.resource.save(this.createData, function (data) {
                window.location = '#jobs';
            }).error(function (data) {
                this.error.createContent = data.content[0];
            });
        },

        destroy: function(id) {
            var self = this;
            swal({
              title: "Really delete this job ?",
              text: "You will not be able to recover this job !",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false              
            },
            function(){
                self.resource.delete({id: id}, function (data) {
                    swal("Deleted!", "Your job has been deleted.", "success");
                    self.paginate();
                }).error(function (data) {
                    console.log("Error:" + JSON.stringify(data));
                });
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
            this.resource.update({id: this.temp.id}, this.updateData, function (data) {
                this.jobs[this.temp.index].content = this.updateData.content;
                $('#myModal').modal('hide');
            }).error(function (data) {
                this.error.updateContent = data.content[0];
            });            
        }

    },
    filters: {
      logotize: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase()
      }
    }
});
