      @extends('app/app')
      @section('content')
          <div class="border container mt-5">
              <div class="text-center text-success justify-content-center">
                  <h1>Your To Do List</h1>
                  <div class="text-center alert-success mb-2" id="mgs"></div>
              </div>
              <div id="msg"></div>
              <button class="btn btn-success float-right mb-2" data-toggle="modal" data-target="#AddDataModal">Add
                  Now</button>

              <!-- Insert Form Data By this modal -->
              <div class="modal fade" id="AddDataModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <form id="AddForm" class="form-group">
                              @csrf
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Type Your To Do List here</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div id="insert-form-msg"></div>
                                  <label for="todo">Type Your Plan</label>
                                  <input type="text" id="title" placeholder="Type Your Plan Here" class="form-control">
                                  <div id="title-error"></div>
                                  <br>
                                  <label for="times">Set Task Time</label>
                                  <input type="time" id="times" class="form-control">
                                  <div id="time-error"></div>
                                  <br />
                                  <label for="disc">Type Your Description :</label>
                                  <textarea type="text" id="disc" placeholder="Type Your Description"
                                      class="form-control"></textarea>
                                  <div id="desc-error"></div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" id="add-data" class="btn btn-primary">Save Task</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <!----- Show Data in Table ----->
              <table id="show-data" class="table table-bordered table-striped">
                  <thead>
                      <th>Date & Time</th>
                      <th>To Do List</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach ($data as $value)
                          <tr>
                              <td class="updated-time" width="10%">{{ $value->times }}</td>
                              <td class="text-bold updated-title">{{ $value->title }}</td>
                              <td width="21%">
                                  <button type="submit" class="btn btn-info view-btn" data-toggle="modal"
                                      data-target="#view" id="{{ $value->id }}">view</button>
                                  <button type="submit" id="{{ $value->id }}" class=" btn btn-success edit-btn"
                                      data-toggle="modal" data-target="#Edit">Edit</button>
                                  <button type="button" id="{{ $value->id }}"
                                      class=" btn btn-danger delete-btn">Delete</button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          <!-- Modal  view your exiting data-->
          <div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
              aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="container col-sm-11 mt-3 mb-2">
                          <h3 class="text-success text-center">Task Details</h3>
                          <p> <b>Time : </b> <span id="timeData"></span> </p>
                          <p><b>Title : </b><span id="titleData"></span></p>
                          <b>Description : </b>
                          <p id="desData"></p>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Edit Data from This form-->
          <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <form class="form-group edit-form">
                          @csrf
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Update Your Plan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="edit-success-message"></div>
                              <div id="edit-msg"></div>
                              <label for="todo">Update Your Plan :</label>
                              <input type="text" id="edit-title" placeholder="Type Your Plan Here" class="form-control">
                              <div id="edit-title-error"></div>
                              <br>
                              <label for="times">Update Task Time :</label>
                              <input type="time" id="edit-times" class="form-control">
                              <div id="edit-time-error"></div>
                              <br />
                              <label for="edit-disc">Update Your Description :</label>
                              <textarea type="text" id="edit-desc" placeholder="Type Your Description"
                                  class="form-control"></textarea>
                              <div id="edit-desc-error"></div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary edit-data-save">Save Changes</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      @stop
