<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <title>Rufo's Notes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.png" type="image/png" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.12-pre/lodash.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://unpkg.com/wingcss"/>

</head>
<body>

    <div id="app">
        <div class="container">

            <div class="row">
                <div class="col">
                    {{ this.title }}
                    <a class="nav-item" href="//www.andrearufo.ti">andrearufo.it</a>
                </div>
                <div class="col">
                    <input type="search" placeholder="Cerca..." v-model="search">
                </div>
            </div>

            <hr>

            <div v-if="search">
                <h3>Ricerca per <em>{{ search }}</em></h3>
                <p>Trovati {{ list.length }} risultati</p>
            </div>

            <div v-for="(note, index) in list" :key="index">
                <div v-html="note.html"></div>
                <p>Ultima modifica {{ note.update }} <a :href="note.file" download>Download the .md file</a></p>
                <hr>
            </div>

        </div>
    </div>

    <script>

    var currentLocation = window.location;
    var baseurl = currentLocation.href;
    var url = new URL(baseurl);

    var paramSearch = (url.searchParams.get('s')) ? url.searchParams.get('s') : '';

    var app = new Vue({
        el: '#app',

        data: {
            title: 'From the desk of Rufo',
            search: paramSearch,
            notes: []
        },

        watch: {
            search: function(){
                this.updateUrl();
            }
        },

        computed: {
            list: function(){
                var temporary = [];
                if( this.search != ''){
                    var self = this;
                    temporary = _.chain(self.notes)
                        .orderBy('updatetime')
                        .filter(function(item){
                            return( item.content.toLowerCase().indexOf(self.search.toLowerCase()) > -1 );
                        })
                        .value();
                }else{
                    temporary = this.notes;
                }
                return _.orderBy(temporary, 'updatetime', 'desc');
            },

            changeurl: function(){
                if( this.search ){
                    return baseurl + '?s=' + this.search;
                }else{
                    return baseurl;
                }
            }
        },

        methods: {
            getNotes: function(){
                this.$http.get('./api.php').then(response => {
                    this.notes = response.body;
                }, response => {
                    console.log('Errore');
                });
            },

            updateUrl: function(){
                window.history.pushState(this.search, this.title, this.changeurl);
            }
        },

        mounted: function(){
            this.getNotes();
        }

    })
    </script>

</body>
</html>
