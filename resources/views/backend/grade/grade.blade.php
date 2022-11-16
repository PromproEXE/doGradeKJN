@extends('layouts.app')
@section('title', 'อัปโหลดเกรด')
@section('embed')
    <script src="{{ asset('js/backend/grade.js') }}" defer></script>
@endsection
@section('content')
    <div class="bg-kjn text-white p-5 text-center">
        <p class="display-4 fw-bold">อัปโหลดเกรด</p>
        <p class="fw-light m-0">คุณทำเกรดเสร็จแล้วใช่ไหม?? งั้นถึงเวลาอัปขึ้นไปให้นักเรียนได้ดูแล้วล่ะ!</p>
    </div>
    <div class="container mt-3">
        <div class="text-center row">
            <div class="col-12 col-lg-3">
                <label for="class" class="h6">เลือกระดับชั้น</label>
                <div class="d-flex justify-content-center">
                    <select id="class" class="form-select" v-model="selectedClass">
                        <option value="" disabled selected>--เลือกระดับชั้น--</option>
                        <option value="1">มัธยมศึกษาปีที่ 1</option>
                        <option value="2">มัธยมศึกษาปีที่ 2</option>
                        <option value="3">มัธยมศึกษาปีที่ 3</option>
                        <option value="4">มัธยมศึกษาปีที่ 4</option>
                        <option value="5">มัธยมศึกษาปีที่ 5</option>
                        <option value="6">มัธยมศึกษาปีที่ 6</option>
                    </select>
                </div>
            </div>
            <Transition name="slide-up">
                <div class="col-12 mt-2 mt-lg-0 col-lg-3" v-if="selectedClass != ''">
                    <label for="subject" class="h6">เลือกรายวิชา</label>
                    <div class="d-flex justify-content-center">
                        <select id="subject" class="form-select" v-model="selectedSubject">
                            <option value="" disabled selected>--เลือกรายวิชา--</option>
                            <option v-for="data in classSubjectData">@{{ data.subject_id + ' - ' + data.subject_name }}</option>
                        </select>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-up">
            <div class="col-12 mt-2 mt-lg-0 col-lg-3" v-if="selectedClass != '' && selectedSubject != ''">
                <label class="h6" for="gradeFile">เลือกไฟล์ (*.csv)</label>
                <div class="d-flex justify-content-center">
                    <input class="form-control" type="file" accept=".csv" id="gradeFile">
                </div>
            </div>
            </Transition>
            <Transition name="slide-up">
            <div class="col-12 col-lg-3 mt-2 mt-lg-0 d-flex align-items-end justify-content-center" v-if="selectedClass != '' && selectedSubject != ''">
                <button type="button" class="btn btn-success" @click="uploadGrade()">อัปโหลดเกรด</button>
                <button type="button" class="btn btn-warning ms-1" @click="clearFile()">ยกเลิกเลือกไฟล์</button>
            </div>
            </Transition>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="table-kjn text-center">
                    <tr>
                        <th scope="col">ห้อง</th>
                        <th scope="col">เลขที่</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">คะแนนหน่วยการเรียนรู้</th>
                        <th scope="col" class="text-center">คะแนนกลางภาค</th>
                        <th scope="col" class="text-center">คะแนนปลายภาค</th>
                        <th scope="col">รวม</th>
                        <th scope="col" colspan="3">ผลการประเมิน</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="7"></th>
                        <th scope="col">ปกติ</th>
                        <th scope="col">แก้ตัว</th>
                        <th scope="col">เรียนซ้ำ</th>
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
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr v-for="(data, index) in user_list">
                        <td scope="row" class="align-middle">@{{ index + 1 }}</td>
                        <td class="align-middle">@{{ data.name }}</td>
                        <td class="align-middle">
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" v-model="data.can_dograde" true-value="1"
                                    false-value="0" @change="updateData(data.id, index)">
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" v-model="data.can_manage_user"
                                    true-value="1" false-value="0" @change="updateData(data.id, index)">
                            </div>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-danger ms-1">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
