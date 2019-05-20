<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <title>Rufo's Notes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.png" type="image/png" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.12-pre/lodash.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://raw.githack.com/andrearufo/nova.css/master/css/nova.min.css">

</head>
<body>

    <div id="app">

        <header>
            <div class="container">

                <nav>
                    <h5>{{ title }}</h5>

                    <form>
                        <input type="search" name="s" v-model="search" placeholder="Cerca...">
                    </form>
                </nav>

            </div>
        </header>

        <section>
            <div class="container">

                <div v-if="search">
                    <h3>Ricerca per <em>{{ search }}</em></h3>
                    <p>Trovati {{ list.length }} risultati</p>
                    <hr>
                </div>

                <article v-for="(note, index) in list" :key="index">
                    <div v-html="note.html"></div>
                    <div>
                        <small>Ultima modifica {{ note.update }}, <a :href="note.link" download>Download the {{ note.file }} file</a></small>
                    </div>

                    <!-- <pre>{{ note }}</pre> -->
                    <hr>
                </article>

            </div>
        </section>

    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/prism.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/prism-css.min.js" charset="utf-8"></script> -->
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
