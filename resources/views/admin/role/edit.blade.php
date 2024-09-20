@extends('back-end.admin.index')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> แก้ไขตำแหน่งการใช้งาน  </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
          <li class="breadcrumb-item"><a href="/admin/roles">ตำแหน่งการใช้งาน</a></li>
          <li class="breadcrumb-item active">แก้ไขตำแหน่งการใช้งาน</li>
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> แก้ไขตำแหน่งการใช้งาน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" class="form-horizontal" action="/admin/role/{{$role->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                          <div class="form-group col-md-12">
                            <h4>ชื่อ</h4>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control" autocomplete="off">
                          </div>
                          <div class="form-group col-md-12">
                            <h4>คำอธิบาย</h4>
                            <input type="text" name="note" class="form-control" value="{{ $role->note }}" autocomplete="off">
                          </div>
                          <div class="form-group col-md-12">
                            <h4>สิทธิ์การใช้งาน</h4>
                            <div class="row">
                              @foreach($permissions as $permission)
                              <div class="form-group col-md-4">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}" @if($role->permissions()->find($permission->id)) checked @endif> {{$permission->name}}   <small>({{$permission->note}})</small>
                                  </label>
                                </div>
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">บันทึก</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
    </div>
</div>
</section>
@endsection
