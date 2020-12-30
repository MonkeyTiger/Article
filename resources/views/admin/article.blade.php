@extends('layouts/admin')

@section('title', 'Article manage')
@section('breadcrumb', 'Article manage')

@section('page')
<div class="row">
  <input type="hidden" id="action" value="create" />
  <input type="hidden" id="selected-article" value="0" />

  <div class="col-12 d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-toggle="modal" data-target="#article-modal">New</button>
  </div>
  <div class="col-12">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Avatar</th>
          <th width="400px">Content</th>
          <th>Created</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $key => $article)
        <tr tid="{{$article->id}}">
          <td>{{$key + 1}}</td>
          <td>{{$article->title}}</td>
          <td><img src="{{env('APP_URL')}}storage/images/{{$article->image}}" width="150" /></td>
          <td>{{$article->content}}</td>
          <td>{{$article->created_at}}</td>
          <td>
            <button class="btn btn-success btn-sm update" data-toggle="modal" data-target="article-modal">Update</button>
            <button class="btn btn-danger btn-sm delete">Delete</button>
          </td>
        <tr>
          @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal" id="article-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">New article</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="alert alert-danger d-none">
                <strong></strong>
                <span class="alert-content"></span>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" />
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control" accept=".jpg, .png, .bmp" />
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control w-100"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="save">Save</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var gSiteURL = "<?php echo env('APP_URL') ?>";
</script>
<script src="{{asset('/js/admin.article.js')}}"></script>
@endsection