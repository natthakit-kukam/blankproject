@extends('back-end.admin.index')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> ตำแหน่งการใช้งาน</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">จัดการตำแหน่งการใช้งาน</li>
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
          <h3 class="card-title"> จัดการตำแหน่งการใช้งาน</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm">
              <div class="input-group-append">
                <a href="/admin/role/create"><button type="button" class="btn btn-info btn-flat btn-sm"><i class="fas fa-plus"> </i> เพิ่มตำแหน่งการใช้งาน</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>คำอธิบาย</th>
                <th>มีสิทธิใช้งาน</th>
                <th>จัดการ</th>
              </tr>
            </thead>
            </tbody>
            @foreach ($roles as $row_index => $role)
            <tr class="text-center">
              <td>{{ $row_index + 1 }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ $role->note }}</td>
              <td>
                @foreach($role->permissions as $permission)
                <span class="badge bg-success">{{ $permission->name }}</span>
                @endforeach
              </td>
              <td>
                <a href="/admin/role/{{$role->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection