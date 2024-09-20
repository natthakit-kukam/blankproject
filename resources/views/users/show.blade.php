@extends('back-end.admin.index')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ข้อมูลส่วนตัว</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">จัดการข้อมูลส่วนตัว</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <!-- Profile Image -->
    <div class="card card-success card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          @if(auth()->user()->photo)
          <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" alt="User profile picture" class="profile-user-img img-fluid img-circle">
          @else
          <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="User Avatar" class="profile-user-img img-fluid img-circle">
          @endif
        </div>

        <h3 class="profile-username text-center">{{$user->name}}</h3>

        <p class="text-center text-success">{{$user->email}}</p>

        <!-- <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>แต้ม</b> <a class="float-right  text-success">{{$user->point}}</a>
          </li>
          <li class="list-group-item">
            <b>ผู้ออกใบแจ้งหนี้</b> <a class="float-right">@if($user->branch) {{$user->branch->name}} @else ยังไม่เลือกผู้ออกใบแจ้งหนี้ @endif</a>
          </li>
        </ul> -->

        <button data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-block"> <i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
      </div>
      <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> แก้ไข User</h5>
            </div>
            <form method="post" class="form-horizontal" action="/admin/auth/user/update/{{$user->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group">
                  <label>รุป</label>
                  <input class="form-control" type="file" name="photo" multiple>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-control-label">ชื่อ</label>
                  <div class="col-sm-12">
                    <input type="text" placeholder="ชื่อ" class="form-control" value="{{$user->name}}" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-control-label">Password</label>
                  <div class="col-sm-12">
                    <input type="text" placeholder="ถ้าไม่เปลี่ยนไม่ต้องกรอก Password" class="form-control" name="password" minlength="4" maxlength="20">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection