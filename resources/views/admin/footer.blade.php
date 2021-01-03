@extends('layouts/admin')

@section('title', 'Footer structure')
@section('breadcrumb', 'Footer structure')

@section('page')
<div class="row">
  <input type="hidden" id="action" value="create" />
  <input type="hidden" id="selected-footer" value="0" />

  <div class="col-12 d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-toggle="modal" data-target="#footer-modal">New</button>
  </div>
  <div class="col-12">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Category</th>
          <th>Link</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        @foreach($footers as $key => $footer)
        <tr tid="{{$footer->id}}">
          <td>{{$key + 1}}</td>
          <td>{{$footer->name}}</td>
          <td>{{$footer->category}}</td>
          <td>{{$footer->link}}</td>
          <td>
            <button class="btn btn-success btn-sm update" data-toggle="modal" data-target="footer-modal">Update</button>
            <button class="btn btn-danger btn-sm delete">Delete</button>
          </td>
        <tr>
          @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal" id="footer-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">New footer</h4>
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
                <label for="category">Category</label>
                <select id="category" class="form-control">
                  <option>Films</option>
                  <option>Series</option>
                  <option>In ontwikkeling</option>
                  <option>Over ons</option>
                  <option>Links</option>
                </select>
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
<script src="{{asset('/js/admin.footer.js')}}"></script>
@endsection