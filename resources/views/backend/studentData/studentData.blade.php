@extends('layouts.app')
@section('title', 'จัดการนักเรียน')
@section('embed')
    <script src="{{ asset('js/backend/studentData.js') }}" defer></script>
@endsection
@section('content')
    <div class="bg-kjn text-white p-5 text-center">
        <p class="display-4 fw-bold">จัดการนักเรียน</p>
        <p class="fw-light m-0">ก่อนที่คุณจะเริ่มทำเกรด ต้องมาสร้างข้อมูลนักเรียนกันก่อนสิ!</p>
    </div>
    <div class="container mt-3">
        <div id="alertDiv"></div>
        <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-success" @click="openAddStudentModal()">เพิ่มข้อมูลนักเรียน</button>
            <button type="button" class="btn btn-danger ms-1" @click="openDeleteClassModal()">ลบข้อมูลนักเรียน</button>
            <button type="button" class="btn btn-warning ms-1" @click="upClass()">เลื่อนระดับนักเรียน</button>
            <button type="button" class="btn btn-secondary ms-1" @click="downClass()">ลดระดับนักเรียน</button>
        </div>
        <div class="d-flex justify-content-end mb-2">
            <div class="input-group pe-2 pt-3 d-flex align-items-center">
                <span class="material-icons-round">search</span>
                <input type="text" class="form-control border-0 border-bottom rounded-0 no-box-shadow" v-model="searchBox" placeholder="ค้นหาโดยใช้เลขประจำตัวหรือชื่อ" aria-label="search" aria-describedby="searchBox">
            </div>
            <div class="me-2">
                <label for="sortby">เรียงลำดับ:</label>
                <select id="sortby" class="form-select form-select-sm" v-model="sortBy">
                    <option value="name">ชื่อ</option>
                    <option value="class">ระดับชั้น</option>
                    <option value="room">ห้อง</option>
                    <option value="number">เลขที่</option>
                    <option value="std_id">เลขประจำตัว</option>
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
                    <p class="h5">ห้อง</p>
                    <div class="ps-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="r1" v-model="selectedRoom">
                            <label class="form-check-label" for="r1">ห้อง 1</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="r2" v-model="selectedRoom">
                            <label class="form-check-label" for="r2">ห้อง 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3" id="r3" v-model="selectedRoom">
                            <label class="form-check-label" for="r3">ห้อง 3</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="4" id="r4" v-model="selectedRoom">
                            <label class="form-check-label" for="r4">ห้อง 4</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="5" id="r5" v-model="selectedRoom">
                            <label class="form-check-label" for="r5">ห้อง 5</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="6" id="r6" v-model="selectedRoom">
                            <label class="form-check-label" for="r6">ห้อง 6</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="7" id="r7" v-model="selectedRoom">
                            <label class="form-check-label" for="r7">ห้อง 7</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="8" id="r8" v-model="selectedRoom">
                            <label class="form-check-label" for="r8">ห้อง 8</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="9" id="r9" v-model="selectedRoom">
                            <label class="form-check-label" for="r9">ห้อง 9</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="10" id="r10" v-model="selectedRoom">
                            <label class="form-check-label" for="r10">ห้อง 10</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="11" id="r11" v-model="selectedRoom">
                            <label class="form-check-label" for="r11">ห้อง 11</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="12" id="r12" v-model="selectedRoom">
                            <label class="form-check-label" for="r12">ห้อง 12</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="13" id="r13" v-model="selectedRoom">
                            <label class="form-check-label" for="r13">ห้อง 13</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="14" id="r14" v-model="selectedRoom">
                            <label class="form-check-label" for="r14">ห้อง 14</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-kjn text-center">
                            <tr>
                                <th scope="col">เลขประจำตัว</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ห้อง</th>
                                <th scope="col">เลขที่</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
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
                                <td scope="row" class="align-middle">@{{ data.std_id }}</td>
                                <td class="align-middle">@{{ data.class }}</td>
                                <td class="align-middle">@{{ data.room }}</td>
                                <td class="align-middle">@{{ data.number }}</td>
                                <td class="align-middle">@{{ data.name }}</td>
                                <td class="align-middle d-flex justify-content-center">
                                    <button type="button" class="btn btn-warning" @click="editStudentData(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger ms-1" @click="openDeleteStudentModal(data)">ลบ</button>
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
                        <h5 class="modal-title">เพิ่มข้อมูลนักเรียน</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="addModalAlert"></div>
                        <div class="mb-3">
                            <label for="studentFile" class="form-label">เลือกไฟล์ข้อมูลนักเรียน (*.csv)</label>
                            <input class="form-control" type="file" id="studentFile" accept=".csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-success" @click="addStudentData()">เพิ่มข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteClassModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">ลบข้อมูลนักเรียนทั้งระดับชั้น</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="deleteClassModalAlert"></div>
                            <label for="class" class="col-12 col-lg-2 h6">ระดับชั้น</label>
                            <select id="class" class="form-select col-12 col-lg-10" v-model="selectedDelete">
                                <option value="" disabled>--เลือกระดับชั้น--</option>
                                <option value="1">มัธยมศึกษาปีที่ 1</option>
                                <option value="2">มัธยมศึกษาปีที่ 2</option>
                                <option value="3">มัธยมศึกษาปีที่ 3</option>
                                <option value="4">มัธยมศึกษาปีที่ 4</option>
                                <option value="5">มัธยมศึกษาปีที่ 5</option>
                                <option value="6">มัธยมศึกษาปีที่ 6</option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-danger" @click="deleteStudentData('class', selectedDelete)">ลบข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteStudentModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">ลบข้อมูลนักเรียนรายบุคคล</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="deleteClassModalAlert"></div>
                            <p class="">คุณแน่ใจหรือไม่ว่าจะลบ <span class="fw-bold">@{{deleteData.name}}</span> ออกจากระบบ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-danger" @click="deleteStudentData('student')" data-bs-dismiss="modal">ลบข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-kjn text-white">
                        <h5 class="modal-title">แก้ไขข้อมูลนักเรียนรายบุคคล</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="editModalAlert"></div>
                        <div class="row">
                            <div class="col-12 col-lg-4 mb-lg-2 d-flex align-items-center">
                                <label for="id">เลขประจำตัว</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2 d-flex align-items-center">
                                <input type="number" min="0" class="form-control" id="id" v-model="editData.std_id">
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-2 d-flex align-items-center">
                                <label for="class">ระดับชั้น</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2 d-flex align-items-center">
                                <input type="number" min="1" max="6" class="form-control" id="class" v-model="editData.class">
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-2 d-flex align-items-center">
                                <label for="room">ห้อง</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2 d-flex align-items-center">
                                <input type="number" min="1" class="form-control" id="room" v-model="editData.room">
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-2 d-flex align-items-center">
                                <label for="number">เลขที่</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2 d-flex align-items-center">
                                <input type="number" min="1" class="form-control" id="number" v-model="editData.number">
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-2 d-flex align-items-center">
                                <label for="name">ชื่อ-นามสกุล</label>
                            </div>
                            <div class="col-12 col-lg-8 mb-2 d-flex align-items-center">
                                <input type="text" class="form-control" id="name" v-model="editData.name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-success" @click="editStudentDataUpdate()">อัปเดทข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
