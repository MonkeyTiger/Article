@extends('layouts/user')

@section('title', 'Article manage')
@section('breadcrumb', 'Article manage')

@section('page')
<div class="row mx-0">
  <div class="col-12 col-lg-9">
    <div class="artlcles">
      @foreach($articles as $key => $article)
      <div class="article d-flex flex-column py-3">
        <div class="row">
          <div class="col-12 col-lg-8">
            <p class="title">{{$article->title}}</p>
            <p class="content">{{$article->content}}</p>
            <a href="{{env('APP_URL')}}home/{{$article->slug}}" class="read-more">
              Bekijk de informatie >>>
            </a>
          </div>
          <div class="col-12 col-lg-4">
            <img src="{{asset('storage/images')}}/{{$article->image}}" alt="" class="w-100">
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="col-12 col-lg-3">
    @foreach($recentArticles as $key => $recentArticle)
    <div class="article d-flex flex-column py-3">
      <div class="row">
        <div class="col-12 col-lg-12">
          <small class="font-weight-bold">{{substr($recentArticle->created_at, 0, 10)}}</small>
          <p class="title">{{$recentArticle->title}}</p>
          <p class="content">{{$recentArticle->content}}</p>
          <a href="{{env('APP_URL')}}home/{{$recentArticle->slug}}" class="read-more">
            Bekijk de informatie >>>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  var gSiteURL = "<?php echo env('APP_URL') ?>";
</script>
<script src="{{asset('/js/admin.article.js')}}"></script>
@endsection