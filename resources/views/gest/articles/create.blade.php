@extends('layouts.app')

@section('content')


    <div class="col-md-12">
        <ul class="breadcrumb">
            <li class="">Accueil / créer un article</li>
        </ul>
    </div>
    @verbatim

    <div id="demonews">
        <div class="col-xs-12 col-lg-6 add-news float-left">
            <form action="/gest/articles" enctype='multipart/form-data' method="POST">
                @endverbatim
                @csrf
                @verbatim
                <div class="card-box">
                    <div class="form-group">
                        <label for="new-Titre">Titre</label>
                        <b-form-input type="text" class="form-control"
                               id="input-live"
                               placeholder="Titre article"
                               v-model="title"
                               :state="titleState"
                               aria-describedby="input-live-help input-live-feedback"
                               trim
                               name="title">

                        </b-form-input>

                        <b-form-invalid-feedback id="input-live-feedback">
                            Saisissez au moins 3 lettres
                        </b-form-invalid-feedback>
                    </div>

                    <div class="form-group">
                        <label for="new-texte">Texte</label>
                        <b-form-textarea class="form-control"
                                  id="new-texte"
                                  placeholder="Description article"
                                  rows="3"
                                  v-model="description"
                                  :state="descriptionState"
                                  aria-describedby="input-live-help input-live-feedback"
                                  trim
                                  name="description"></b-form-textarea>

                        <b-form-invalid-feedback id="input-live-feedback">
                            Saisissez au moins 130 lettres
                        </b-form-invalid-feedback>

                    </div>
                    <div class="form-group">
                        <label for="new-Image">Image :<small> 800*600px</small></label>

                            <b-form-file show-size label="Image de fond" prepend-icon="mdi-file-image"
                                          accept=".jpg,.jpeg"
                                          @change="onFileChange" color="#95c01e" v-model="imag"
                                          id="new-Image"
                                          :state="Boolean(imag)"
                                          placeholder="Choisir une image..."
                                          drop-placeholder="Glissez une image..."
                                         name="imag"
                            ></b-form-file>

                    </div>
                    <div class="form-group">
                        <label for="new-texteAlternatif">Texte Alternatif Image</label>
                        <input type="text" class="form-control" id="new-texteAlternatif" placeholder="Texte Alternatif" name="imgAlt">
                    </div>
                    <div class="form-group">
                        <label>Date de publication</label>
                        <div class='input-group date'>

                            <b-form-datepicker class="form-control" id="news-datepicker"
                                               v-model="datenew"
                                               locale="fr"
                                               placeholder="Sélectionner une date"
                                               name="datenews"
                            >
                            </b-form-datepicker>

                        </div>
                    </div>

                </div><!-- /.card-box -->
                <div class="card-box">
                    <div class="form-group">
                        <label for="new-typeLink">Type du lien</label>
                        <select class="form-control" id="new-typeLink" v-model="typeLinkSelected">
                            <option
                                :name="typelink.name"
                                v-for="typelink in typeLinks"
                                :value="typelink"
                                :state="typeLinkSelectedState"
                                :key="typelink.id">
                                {{ typelink.name }}
                            </option>
                        </select>
                    </div>
                    <div class="hasLink" v-if="typeLinkSelected.name != 'Aucun'">
                        <div class="form-group">
                            <label for="new-textLink">Texte du lien</label>

                            <b-form-input
                                          type="text"
                                          class="form-control"
                                          id="new-textLink"
                                          placeholder="Ex: Découvrir"
                                          v-model="urltext"
                                          :state="invalidtext"
                                          name="urltext"
                                          aria-describedby="input-live-help input-live-feedback"
                                          trim>
                            </b-form-input>
                            <b-form-invalid-feedback id="input-live-feedback">
                                Texte invalide
                            </b-form-invalid-feedback>
                        </div>
                        <div class="form-group">
                            <div class="haspdf" v-if="typeLinkSelected.name === 'PDF'">
                                <label for="new-pdf">Fichier PDF</label>

                                <b-form-file show-size label="Fichier PDF" prepend-icon="mdi-file-pdf"
                                             accept=".pdf"
                                             v-model="checkfile"
                                             id="new-pdf"
                                             name=""
                                             :state="Boolean(checkfile)"
                                             placeholder="Choisir un PDF..."
                                             drop-placeholder="Glissez un PDF..."
                                ></b-form-file>
                                <b-form-invalid-feedback id="input-live-feedback">
                                    PDF invalide
                                </b-form-invalid-feedback>
                            </div>
                            <div class="has-url-link" v-if="typeLinkSelected.name === 'Interne' || typeLinkSelected.name === 'Externe'">
                                <label for="new-urlLink">URL</label>

                                <b-form-input v-if="typeLinkSelected.name === 'Externe' || typeLinkSelected.name === 'PDF'"
                                              type="text"
                                              class="form-control"
                                              id="new-urlLink"
                                              v-model="urlLink"
                                              :state="typeLinkSelectedState"
                                              placeholder="http://croustillance.com/decouvrir"
                                              name="urlLink"
                                              aria-describedby="input-live-help input-live-feedback"
                                              trim>

                                </b-form-input>

                                <b-form-invalid-feedback id="input-live-feedback">
                                    Lien invalide
                                </b-form-invalid-feedback>

                                <select v-if="typeLinkSelected.name === 'Interne'" class="form-control" id="new-urlLink" v-model=" internalLinkSelected">
                                    <option
                                        name="urlLink"
                                        v-for="internalLink in internalLinks"
                                        :state="typeLinkSelectedState"
                                        :value="internalLink.path"
                                        :key="internalLink.path">
                                        {{ internalLink.path }}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div><!-- /.card-box -->
                </div>
                <div class="text-center">
                    <button :disabled="!titleState || !descriptionState || !Boolean(imag) || !typeLinkSelectedState" type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-lg-6 side-apercu float-right">
            <div class="card-box">
                <div class="section fp-auto-height fp-section active section-anim fp-completely" data-section="projects-grid" data-anchor="projects-grid">
                    <!-- Begin of section wrapper -->
                    <div class="section-wrapper fullwidth with-margin">
                        <!-- content -->
                        <div class="section-content">

                            <!-- project list -->
                            <div class="project-list grid-1 grid-md-2 grid-lg-3 anim">
                                <!-- an item -->
                                <div class="item media media-square text-primary">
                                    <div class="media-img">
                                        <div class="mask"></div>
                                        <!--<img src="" alt="" class="img-block" style="display: none;">-->
                                        <div class="img"
                                             :style="{ backgroundImage: 'url(' + imag + ')' }"
                                             style="background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>

                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h2 class="sr-up-td1">{{ formatDate(datenew) }}</h2>
                                            <h2 class="sr-up-td2 display-6 mt-3 mb-3">{{ title }}</h2>
                                        </a>
                                        <div class="desc">
                                            <p class="pSpacer" style="background-color:rgba(218, 218, 218, 0.72);color: #fff;border-radius: 5px;">
                                                {{ description }}
                                            </p>
                                        </div>
                                    </div>


                                    <div class="media-footer sr-up-td4" v-if="typeLinkSelected.name != 'Aucun'">
                                        <div class="btns-action sr-up-td3 text-primary" >
                                            <a class="btn btn-normal btn-white spaceTop">
                                                @endverbatim
                                                <span class="icon" v-if="typeLinkSelected.name == 'PDF'"><img src="{{ asset('assets/img/pdf-icone.svg') }}" width="35px"></span>
                                                @verbatim
                                                <span class="text">{{urltext}}</span>
                                                <span class="icon" v-if="typeLinkSelected.name === 'Interne' || typeLinkSelected.name === 'Externe'"><span class="arrow-right"></span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- an item -->
                            </div>
                        </div>
                    </div>
                    <!-- End of section wrapper -->
                </div>

            </div>

        </div>
    </div>
    @endverbatim
    <script src="https://unpkg.com/vue-upload-multiple-image@1.0.2/dist/vue-upload-multiple-image.js"></script>
    <!--end sidebar div-->
    <script>



        new Vue({
            el: '#demonews',
            data: {
                datenew: null,
                title: '',
                description: '',
                urltext: null,
                imag: null,
                checkfile: null,
                urlLink: null,


                typeLinks: [
                    {name: 'Aucun', id: 1},
                    {name: 'Interne', id: 2},
                    {name: 'Externe', id: 3},
                    {name: 'PDF', id: 4}
                ],
                typeLinkSelected: 1,

                internalLinks: [
                    { path: '/' },
                    { path: '/buffet-traiteur' },
                    { path: '/buffet-entreprise' },
                    { path: '/cocktail-professionnels' },
                    { path: '/cocktail-particuliers' },
                    { path: '/contact' },
                    { path: '/equipe' },
                    { path: '/esprit' },
                    { path: '/location-materiel-traiteur' },
                    { path: '/evenements-entreprises' },
                    { path: '/traiteur-mariage' },
                    { path: '/pause-dejeuner' },
                    { path: '/portage-repas' },
                    { path: '/repas-particuliers' },
                    { path: '/repas-professionnels' },
                    { path: '/label-vosges-terroir' },
                    { path: '/articles' },
                    { path: '/plateaux-repas-entreprise' }

                ],
                internalLinkSelected: '',


            },
            created: function() {
                this.typeLinkSelected = this.typeLinks.find(i => i.id === this.typeLinkSelected);
                this.internalLinkSelected = this.internalLinks.find(i => i.path === this.internalLinkSelected);
                this.datenew = moment(Date.now()).format('YYYY-MM-DD');


            },
            methods: {

                onFileChange(e) {
                    if (e) {
                        const file = e.target.files[0];
                        this.imag = URL.createObjectURL(file);

                    } else {
                        this.imag = null;
                    }
                },
                formatDate(datenew){
                    moment.locale('fr');
                    return moment(datenew).format('ll');
                }
            }, // end methods
            computed: {

                titleState() {
                    return this.title.length > 3 ? true : false
                },
                descriptionState() {
                    return this.description.length > 3 ? true : false
                },
                invalidtext() {
                    return this.urltext.length > 3 ? true : false
                },
                typeLinkSelectedState(){


                    switch (this.typeLinkSelected.id) {
                        case 1:
                            return true
                            break;
                        case 2:
                            if(this.urltext !== null && this.urltext && this.internalLinkSelected !== '' ){
                                return true
                            }else{
                                return false
                            }
                            break;
                        case 3:
                            if(this.urltext !== null && this.urltext && this.urlLink !== null && this.urlLink && this.urlLink.substring(0, 4) == 'http' ){
                                return true
                            }else{
                                return false
                            }
                            break;
                        case 4:
                            if(this.urltext !== null && this.urltext && this.checkfile !== null && this.checkfile){
                                return true
                            }else{
                                return false
                            }
                            break;
                    }


           },


            }

        })
    </script>
    @endsection
