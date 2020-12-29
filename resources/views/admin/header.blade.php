@extends('layouts/admin')

@section('title', 'Header structure')
@section('breadcrumb', 'Header structure')

@section('page')
<div class="row">
  <input type="hidden" id="action" value="create" />
  <input type="hidden" id="selected-header" value="0" />

  <div class="col-12 d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-toggle="modal" data-target="#header-modal">New</button>
  </div>
  <div class="col-12">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Link</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        @foreach($headers as $key => $header)
        <tr tid="{{$header->id}}">
          <td>{{$key + 1}}</td>
          <td>{{$header->name}}</td>
          <td>{{$header->link}}</td>
          <td>
            <button class="btn btn-success btn-sm update" data-toggle="modal" data-target="header-modal">Update</button>
            <button class="btn btn-danger btn-sm delete">Delete</button>
          </td>
        <tr>
          @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal" id="header-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">New header</h4>
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
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" />
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" id="link" class="form-control" />
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
<script src="{{asset('/js/admin.header.js')}}"></script>
@endsection