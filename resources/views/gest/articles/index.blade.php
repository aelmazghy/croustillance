@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li class="">Accueil / articles</li>
        </ul>
    </div>
    <div class="col-md-12">
            <form method="POST" action="" accept-charset="UTF-8">
                @csrf
                <div class="row">
                    <div class="box-tools form-group form-action m-b-30">
                         <div class="col text-left">
                            <a href="{{ route('createArticle') }}" class="btn btn-success ajouter-btn" ><i class="fas fa-plus-square"></i>Ajouter</a>
                        </div>
                    </div>



                <!--all news-->
                <div class="card_B col-xs-12 col-lg-12">
                @foreach($articles as $article)

                    <!-- an item -->
                    <div class="col-md-4 mb-3 mt-3 float-left">
                        <div class="card-box p-0 position-relative mb-0">

                            <div class="media-img">
                                <div class="mask rounded"></div>

                                <img src="{{ $article->imag }}" alt="" class="img-block w-100 rounded">
                            </div>
                            <div class="media-body position-absolute" style="top: 1rem; left: 2rem;right: 2rem;color: #fff; font-size: 10px; ">
                                    <h2 class="sr-up-td1">{{ $article->datenews }}</h2>
                                    <h2 class="sr-up-td2 mt-3 mb-3" style=" font-size: 25px; ">{{ $article->title }}</h2>
                                <div class="desc" style=" font-size: initial; ">
                                    <p class="pSpacer" style="background-color:rgba(218, 218, 218, 0.72);color: #fff;border-radius: 5px;">
                                        {{ $article->description }}
                                    </p>
                                </div>
                                </div>
                            <div class="media-footer sr-up-td4 d-flex position-absolute" style="bottom: 10px;right: 2rem; ">

                                <div class="action-btn">
                                    <button type="button" class="btn btn-normal btn-white spaceTop page-all-news-s btn-action-news"><i class="fas fa-trash"></i></button>
                                    <button type="button" class="btn btn-normal btn-white spaceTop page-all-news-s btn-action-news"><i class="fas fa-pen"></i></button>
                                </div>
                                @if ( $article->urlType != "Aucun")
                                <div class="btns-action sr-up-td3 text-primary">
                                    <a class="btn btn-normal btn-white spaceTop page-all-news-s" href="{{ $article->urlLink }}">
                                        @if ( $article->urlType === "PDF")
                                        <span class="icon"><img src="{{ asset('assets/img/pdf-icone.svg') }}" width="20px"></span>
                                        @endif
                                        <span class="text">{{ $article->urltext }}</span>
                                        @if($article->urlType === "Interne" || $article->urlType === "Externe")
                                        <span class="icon"><span class="arrow-right"></span></span>
                                        @endif
                                    </a>
                                </div>
                                @endif


                            </div>
                        </div>
                </div>
                        <!-- an item -->
                    @endforeach
                </div>
            <!--end all news-->

                </div><!--end row-->

            </form>
            <div class="text-center"></div>
    </div>
    <!--end sidebar div-->
    <script>



        new Vue({
            el: '#app',
            data: {

            },
            methods: {

            }, // end methods
            computed: {



            }

        })
    </script>
@endsection
