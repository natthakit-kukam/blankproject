@extends('back-end.admin.index')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">ผู้ใช้</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">จัดการผู้ใช้</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">    จัดการผู้ใช้</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <div class="input-group-append">
                <button type="button" class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#addUserModal">
                  <i class="fas fa-plus"> </i>  เพิ่มผู้ใช้
                </button>
              </div>
              <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> เพิ่มผู้ใช้</h5>
                    </div>
                    <form method="post" class="form-horizontal" action="/user/register" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="modal-body">
                        <div class="form-group">
                          <label class="col-control-label">ภาพ</label>
                          <div class="col-sm-12">
                            <input type="file" class="form-control" name="photo" multiple>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-control-label">ชื่อ</label>
                          <div class="col-sm-12">
                            <input type="text" placeholder="ชื่อ" class="form-control" name="name" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-control-label">อีเมลล์</label>
                          <div class="col-sm-12">
                            <input type="email" placeholder="Email" class="form-control" name="email" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-control-label">รหัสผ่าน</label>
                          <div class="col-sm-12">
                            <input type="text" placeholder="Password" class="form-control" name="password" minlength="4" maxlength="20">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>สถานะ</label>
                          <div class="col-sm-12">
                            <select class="form-control" name="status" required>
                              <option value="1">ใช้งาน</option>
                              <option value="0">ยกเลิก</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-12">
                          <h4>ตำแหน่งการใช้งาน</h4>
                          <div class="row">
                            @foreach($roles as $role)
                            <div class="form-group col-md-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{$role->name}} <small>({{$role->note}})</small>
                                </label>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="form-group col-md-12">
                          <h4>สิทธิ์การใช้งาน</h4>
                          <div class="row">
                            @foreach($permissions as $permission)
                            <div class="form-group col-md-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> {{$permission->name}} <small>({{$permission->note}})</small>
                                </label>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-sm table-hover">
            <thead>
              <tr class="text-center">
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>อีเมลล์</th>
                <th>สถานะ</th>
                <th>ตำแหน่งการใช้งาน</th>
                <th>สิทธิ์การใช้งาน</th>
                <th>จัดการ </th>
                @if(auth()->user()->hasRole('deverloper'))
                <th>ลบ</th>
                @endif
              </tr>
            </thead>
            </tbody>
            @foreach ($users as $row_index => $user)
            <tr class="text-center">
              <td>{{$row_index+1}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>@if($user->status == 0) ยกเลิก @else ใช้งาน @endif</td>
              <td>
                @foreach($user->roles as $role)
                <span class="badge bg-success">{{ $role->name }}</span>
                @endforeach
              </td>
              <td>
                @foreach($user->permissions as $permission)
                <span class="badge bg-success">{{ $permission->name }}</span>
                @endforeach
              </td>
              <td>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editUser{{$user->id}}">
                  <i class="fa fa-edit"></i>
                </button>
              </td>
              @if(auth()->user()->hasRole('deverloper'))
              <td>
                <form action="/admin/delete/{{$user->id}}" id="form{{$no}}" method="post" onsubmit="return confirm('ต้องการลบผู้ใช้ ?')">
                  @csrf
                  <button type="submit" id="form{{$no}}" class="btn btn-sm btn-danger">ลบ</button>
                </form>
              </td>
              @endif
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        @foreach ($users as $no=>$user)
        <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> แก้ไขผู้ใช้</h5>
              </div>
              <form method="post" class="form-horizontal" action="/admin/user/{{$user->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-control-label">ภาพ โปรไฟล์</label>
                    <div class="col-sm-12">
                      <input type="file" class="form-control" name="photo" multiple>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-control-label">ชื่อ</label>
                    <div class="col-sm-12">
                      <input type="text" placeholder="ชื่อ" class="form-control" value="{{$user->name}}" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-control-label">อีเมลล์</label>
                    <div class="col-sm-12">
                      <input type="text" placeholder="Email" class="form-control" name="email" value="{{$user->email}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-control-label">รหัสผ่าน</label>
                    <div class="col-sm-12">
                      <input type="text" placeholder="Password" class="form-control" name="password" minlength="4" maxlength="20">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>สถานะ</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="status">
                        <option value="0" @if($user->status == 0) selected @endif>ยกเลิก</option>
                        <option value="1" @if($user->status == 1) selected @endif>ใช้งาน</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <h4>ตำแหน่งการใช้งาน</h4>
                    <div class="row">
                      @foreach($roles as $role)
                      <div class="form-group col-md-4">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles()->find($role->id)) checked @endif> {{$role->name}} <small>({{$role->note}})</small>
                          </label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <h4>สิทธิ์การใช้งาน</h4>
                    <div class="row">
                      @foreach($permissions as $permission)
                      <div class="form-group col-md-4">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}" @if($user->permissions()->find($permission->id)) checked @endif> {{$permission->name}} <small>({{$permission->note}})</small>
                          </label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                  <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection