@extends('layouts.app')
@section('title', 'จัดการวิชา')
@section('embed')
    <script src="{{ asset('js/backend/subjectList.js') }}" defer></script>
@endsection
@section('content')
    <div class="bg-kjn text-white p-5 text-center">
        <p class="display-4 fw-bold">จัดการวิชา</p>
        <p class="fw-light m-0">ก่อนที่คุณจะเริ่มทำเกรด ต้องมาสร้างข้อมูลวิชากันก่อนสิ!</p>
    </div>
    <div class="container mt-3">
        <div id="alertDiv"></div>
        <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-success" @click="openAddSubjectModal()">เพิ่มข้อมูล</button>
        </div>
        <div class="d-flex justify-content-end mb-2">
            <div class="input-group pe-2 pt-3 d-flex align-items-center">
                <span class="material-icons-round">search</span>
                <input type="text" class="form-control border-0 border-bottom rounded-0 no-box-shadow" v-model="searchBox"
                    placeholder="ค้นหาโดยใช้รหัสวิชาหรือชื่อวิชา" aria-label="search" aria-describedby="searchBox">
            </div>
            <div class="me-2">
                <label for="sortby">เรียงลำดับ:</label>
                <select id="sortby" class="form-select form-select-sm" v-model="sortBy">
                    <option value="subject_id">รหัสวิชา</option>
                    <option value="subject_name">ชื่อวิชา</option>
                    <option value="class">ระดับชั้น</option>
                    <option value="teach_by">อาจารย์ผู้สอน</option>
                </select>
            </div>
            <div>
                <label for="sortby">เรียงจาก:</label>
                <select id="sortby" class="form-select form-select-sm" v-model="sortBy_type">
                    <option value="asc">น้อยไปมาก</option>
                    <option value="desc">มากไปน้อย</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-lg-2">
                <p class="fw-bold h3 text-center text-white bg-kjn rounded-top m-0 p-3">ตัวกรอง</p>
                <div style="background-color: whitesmoke" class="rounded-bottom p-3">
                    <p class="h5">ระดับชั้น</p>
                    <div class="ps-2 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="m1"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m1">มัธยมศึกษาปีที่ 1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="m2"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m2">มัธยมศึกษาปีที่ 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3" id="m3"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m3">มัธยมศึกษาปีที่ 3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="4" id="m4"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m4">มัธยมศึกษาปีที่ 4</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="5" id="m5"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m5">มัธยมศึกษาปีที่ 5</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="6" id="m6"
                                v-model.number="selectedClass">
                            <label class="form-check-label" for="m6">มัธยมศึกษาปีที่ 6</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-kjn text-center">
                            <tr>
                                <th scope="col">รหัสวิชา</th>
                                <th scope="col">ระดับชั้น</th>
                                <th scope="col">ชื่อวิชา</th>
                                <th scope="col">อาจารย์ผู้สอน</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody v-if="isLoading">
                            <tr v-for="index in 20">
                                <td scope="row" class="align-middle">
                                    <p class="placeholder-glow m-0"><span class="placeholder w-100"></span></p>
                                </td>
                                <td class="align-middle">
                                    <p class="placeholder-glow m-0"><span class="placeholder w-100"></span></p>
                                </td>
                                <td class="align-middle">
                                    <p class="placeholder-glow m-0"><span class="placeholder w-100"></span></p>
                                </td>
                                <td class="align-middle">
                                    <p class="placeholder-glow m-0"><span class="placeholder w-100"></span></p>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr v-for="(data, index) in showData">
                                <td scope="row" class="align-middle">@{{ data.subject_id }}</td>
                                <td class="align-middle">@{{ 'มัธยมศึกษาปีที่ ' + data.class }}</td>
                                <td class="align-middle">@{{ data.subject_name }}</td>
                                <td class="align-middle">@{{ data.teach_by }}</td>
                                <td class="align-middle d-flex justify-content-center">
                                    <button type="button" class="btn btn-warning"
                                        @click="openEditSubjectModal(data)">แก้ไข</button>
                                        <button type="button" class="btn btn-secondary ms-1"
                                        @click="duplicateData(data)">ทำซ้ำ</button>
                                    <button type="button" class="btn btn-danger ms-1"
                                        @click="openDeleteSubjectModal(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- MODAL ZONE --}}
        <div class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">เพิ่มข้อมูลวิชา</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="addModalAlert"></div>
                        <div class="row">
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="id" class="form-label m-0">รหัสวิชา</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <input class="form-control" type="text" id="id" v-model="addData.subject_id">
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="class" class="form-label m-0">ระดับชั้น</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <select class="form-select" id="class" v-model="addData.class">
                                    <option value="" disabled>-เลือกระดับชั้น-</option>
                                    <option value="1">มัธยมศึกษาปีที่ 1</option>
                                    <option value="2">มัธยมศึกษาปีที่ 2</option>
                                    <option value="3">มัธยมศึกษาปีที่ 3</option>
                                    <option value="4">มัธยมศึกษาปีที่ 4</option>
                                    <option value="5">มัธยมศึกษาปีที่ 5</option>
                                    <option value="6">มัธยมศึกษาปีที่ 6</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="subject_name" class="form-label m-0">ชื่อวิชา</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <input class="form-control" type="text" id="subject_name" v-model="addData.subject_name">
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="teach_by" class="form-label m-0">อาจารย์ผู้สอน</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <input class="form-control" type="text" id="teach_by" v-model="addData.teach_by">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-success" @click="addSubjectData()">เพิ่มข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">ลบข้อมูลวิชา</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>คุณแน่ใจหรือไม่ว่าจะลบวิชา <span class="fw-bold">@{{ selectedDelete.subject_id + ' - ' + selectedDelete.subject_name }}</span> หรือไม่</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                            @click="deleteSubject()">ลบข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">แก้ไขข้อมูลวิชา</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="editModalAlert"></div>
                        <div class="row">
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="class" class="form-label m-0">ระดับชั้น</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <select class="form-select" id="class" v-model="editData.class">
                                    <option value="" disabled>-เลือกระดับชั้น-</option>
                                    <option value="1">มัธยมศึกษาปีที่ 1</option>
                                    <option value="2">มัธยมศึกษาปีที่ 2</option>
                                    <option value="3">มัธยมศึกษาปีที่ 3</option>
                                    <option value="4">มัธยมศึกษาปีที่ 4</option>
                                    <option value="5">มัธยมศึกษาปีที่ 5</option>
                                    <option value="6">มัธยมศึกษาปีที่ 6</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="subject_name" class="form-label m-0">ชื่อวิชา</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <input class="form-control" type="text" id="subject_name" v-model="editData.subject_name">
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center mb-lg-2">
                                <label for="teach_by" class="form-label m-0">อาจารย์ผู้สอน</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2">
                                <input class="form-control" type="text" id="teach_by" v-model="editData.teach_by">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-success"
                            @click="editSubjectUpdate()">อัปเดทข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
