@extends('backend.layout')

@section('styles')
@endsection

@section('content')
    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2 mb-3">
            <div class="card overflow-hidden mb-3">
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate="">
                        <div class="col-md-4">
                          <input class="form-control" id="validationCustom01" placeholder="Search.." type="text" value="" required="" />
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i> ค้นหา</button>
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn btn-success" type="button"> <i class="fas fa-plus-circle"></i> เพิ่มโครงการ</button>
                        </div>
                      </form>
                </div>
                <div class="card-footer bg-light p-0">
                </div>
            </div>
            <div class="card overflow-hidden">
                <div class="card-header bg-light">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor" id="table-example"> <i class="fa fa-home"></i>
                                โครงการ</h5>
                        </div>
                        <div class="col-auto ms-auto">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive scrollbar">
                        <table class="table table-striped overflow-hidden">
                            <thead>
                                <tr class="btn-reveal-trigger">
                                    <th scope="col">รหัส</th>
                                    <th scope="col">ชื่อโครงการ</th>
                                    <th scope="col">ที่ตั้ง</th>
                                    <th scope="col">เจ้าของที่ดิน</th>
                                    <th scope="col">สถานะ</th>
                                    <th class="text-end" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="btn-reveal-trigger">
                                    <td>005</td>
                                    <td><a href="{{route('get-project-show',1)}}">วัฒนาวิลเลจ</a></td>
                                    <td>
                                        22 หมู่ 7 ต.พอ อ.เมือง จ.ศรีสะเกษ
                                    </td>
                                    <td>นายกอไก่ ขอใข่</td>
                                    <td><span class="badge badge-soft-success rounded-pill">ใช้งาน</span></td>
                                    <td class="text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-ellipsis-h fs--1"></span></button>
                                                 <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{route('get-project-show',1)}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                        <a class="dropdown-item" href="{{route('get-project-edit',1)}}"> <i class="far fa-edit"></i> แก้ไข</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>004</td>
                                    <td><a href="{{route('get-project-show',1)}}">อีสานวิลเลจ</a></td>
                                    <td>
                                        22 หมู่ 7 ต.พอ อ.เมือง จ.ศรีสะเกษ
                                    </td>
                                    <td>นายกอไก่ ขอใข่</td>
                                    <td><span class="badge badge-soft-success rounded-pill">ใช้งาน</span></td>
                                    <td class="text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-ellipsis-h fs--1"></span></button>
                                                 <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{route('get-project-show',1)}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                        <a class="dropdown-item" href="{{route('get-project-edit',1)}}"> <i class="far fa-edit"></i> แก้ไข</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>003</td>
                                    <td><a href="{{route('get-project-show',1)}}">หมู่บ้านหนองยาง</a></td>
                                    <td>
                                        22 หมู่ 7 ต.พอ อ.เมือง จ.ศรีสะเกษ
                                    </td>
                                    <td>นายกอไก่ ขอใข่</td>
                                    <td><span class="badge badge-soft-success rounded-pill">ใช้งาน</span></td>
                                    <td class="text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-ellipsis-h fs--1"></span></button>
                                                 <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{route('get-project-show',1)}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                        <a class="dropdown-item" href="{{route('get-project-edit',1)}}"> <i class="far fa-edit"></i> แก้ไข</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>002</td>
                                    <td><a href="{{route('get-project-show',1)}}">เอมริกา</a></td>
                                    <td>
                                        22 หมู่ 7 ต.พอ อ.เมือง จ.ศรีสะเกษ
                                    </td>
                                    <td>นายกอไก่ ขอใข่</td>
                                    <td><span class="badge badge-soft-success rounded-pill">ใช้งาน</span></td>
                                    <td class="text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-ellipsis-h fs--1"></span></button>
                                                 <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{route('get-project-show',1)}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                        <a class="dropdown-item" href="{{route('get-project-edit',1)}}"> <i class="far fa-edit"></i> แก้ไข</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>001</td>
                                    <td><a href="{{route('get-project-show',1)}}">นะหน้าทองวิลเลจ</a></td>
                                    <td>
                                        22 หมู่ 7 ต.พอ อ.เมือง จ.ศรีสะเกษ
                                    </td>
                                    <td>นายกอไก่ ขอใข่</td>
                                    <td><span class="badge badge-soft-danger rounded-pill">ยกเลิก</span></td>
                                    <td class="text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"><span
                                                    class="fas fa-ellipsis-h fs--1"></span></button>
                                                 <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item" href="{{route('get-project-show',1)}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                        <a class="dropdown-item" href="{{route('get-project-edit',1)}}"> <i class="far fa-edit"></i> แก้ไข</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer bg-light p-0">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
