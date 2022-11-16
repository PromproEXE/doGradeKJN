@extends('layouts.app')
@section('title', 'จัดการผู้ใช้')
@section('embed')
    <script src="{{ asset('js/backend/users.js') }}" defer></script>
@endsection
@section('content')
    <div class="bg-kjn text-white p-5 text-center">
        <p class="display-4 fw-bold">จัดการผู้ใช้</p>
        <p class="fw-light m-0">มาดูกันซิว่าเว็บของเราใครใช้กันบ้างนะ</p>
    </div>
    <div class="container mt-3">
        <div class="text-end">
            <button class="btn btn-success text-end" @click="openAddModal()">เพิ่มผู้ใช้</button>
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-hover">
                <thead class="table-kjn text-center">
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">อีเมล</th>
                        <th scope="col">ชื่อผู้ใช้</th>
                        <th scope="col">ส่ง/แก้ไขเกรด</th>
                        <th scope="col">จัดการผู้ใช้</th>
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
                        <td class="align-middle">
                            <p class="placeholder-glow m-0"><span class="placeholder w-100"></span></p>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr v-for="(data, index) in user_list">
                        <td scope="row" class="align-middle">@{{ index + 1 }}</td>
                        <td class="align-middle">@{{ data.name }}</td>
                        <td class="align-middle">@{{ data.email }}</td>
                        <td class="align-middle">@{{ data.username }}</td>
                        <td class="align-middle">
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" v-model="data.can_dograde" true-value="1"
                                    false-value="0" @change="updateData(data.id)">
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" v-model="data.can_manage_user"
                                    true-value="1" false-value="0" @change="updateData(data.id)">
                            </div>
                        </td>
                        <td class="align-middle d-flex justify-content-center">
                            <button type="button" class="btn btn-warning" @click="openEditModal(data)">แก้ไข</button>
                            <button type="button" class="btn btn-danger ms-1" @click="openDeleteModal(data)">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">แก้ไขข้อมูลผู้ใช้</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="editModalAlert"></div>
              <div class="row">
                  <div class="col-12 col-lg-4 d-flex align-items-center">
                      <label for="editName" class="h6 m-0" :class="{'text-danger' : editModalDataError.name}">ชื่อ-นามสกุล</label>
                  </div>
                  <div class="col-12 col-lg-8 mt-2 mt-lg-0">
                    <input type="text" id="editName" class="form-control" :class="{'border-danger' : editModalDataError.name}" v-model.lazy="editModalData.name">
                    <small class="text-danger" v-if="editModalDataError.name">@{{editModalDataError.name[0]}}</small>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center mt-2">
                    <label for="editPassword" class="h6 m-0" :class="{'text-danger' : editModalDataError.password}">รหัสผ่าน</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                  <input type="password" id="editPassword" class="form-control" :class="{'border-danger' : editModalDataError.password}" v-model.lazy="editModalData.password">
                  <small class="text-danger" v-if="editModalDataError.password">@{{editModalDataError.password[0]}}</small>
              </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-kjn" @click="updateData(editModalData.id, 'modal', 'editModal')">บันทึก</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="addModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">เพิ่มผู้ใช้</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="addModalAlert"></div>
              <div class="row">
                <div class="col-12 col-lg-4 d-flex align-items-center">
                    <label for="addName" class="h6 m-0" :class="{'text-danger' : addModalDataError.name}">ชื่อ-นามสกุล</label>
                </div>
                <div class="col-12 col-lg-8 mt-2 mt-lg-0">
                    <input type="text" id="addName" class="form-control" :class="{'border-danger' : addModalDataError.name}" v-model="addModalData.name">
                    <small class="text-danger" v-if="addModalDataError.name">@{{addModalDataError.name[0]}}</small>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center mt-2">
                    <label for="addEmail" class="h6 m-0" :class="{'text-danger' : addModalDataError.email}">อีเมล</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                    <input type="email" id="addEmail" class="form-control" :class="{'border-danger' : addModalDataError.email}" v-model="addModalData.email">
                    <small class="text-danger" v-if="addModalDataError.email">@{{addModalDataError.email[0]}}</small>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center">
                    <label for="addUsername" class="h6 m-0" :class="{'text-danger' : addModalDataError.username}">ชื่อผู้ใช้</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                    <input type="text" id="addUsername" class="form-control" :class="{'border-danger' : addModalDataError.username}" v-model="addModalData.username">
                    <small class="text-danger" v-if="addModalDataError.username">@{{addModalDataError.username[0]}}</small>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center mt-2">
                    <label for="addPassword" class="h6 m-0" :class="{'text-danger' : addModalDataError.password}">รหัสผ่าน</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                    <input type="password" id="addPassword" class="form-control" :class="{'border-danger' : addModalDataError.password}" v-model="addModalData.password">
                    <small class="text-danger" v-if="addModalDataError.password">@{{addModalDataError.password[0]}}</small>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center mt-2">
                    <label for="addCanDograde" class="h6 m-0">สามารถอัปโหลดเกรดได้</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                    <input type="checkbox" id="addCanDograde" class="form-check-input" v-model="addModalData.can_dograde" true-value="1" false-value="0">
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center mt-2">
                    <label for="addCanManageUser" class="h6 m-0">สามารถจัดการผู้ใช้ได้</label>
                </div>
                <div class="col-12 col-lg-8 mt-2">
                    <input type="checkbox" id="addCanManageUser" class="form-check-input" v-model="addModalData.can_manage_user" true-value="1" false-value="0">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-kjn" @click="addUser()">เพิ่มผู้ใช้</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ลบผู้ใช้</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="h6">คุณแน่ใจหรอไม่ที่จะลบผู้ใช้ @{{deleteModalData.name}}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ไม่</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="deleteData(deleteModalData.id)">แน่ใจ</button>
            </div>
          </div>
        </div>
    </div>

    <div id="toastAlert"></div>
@endsection