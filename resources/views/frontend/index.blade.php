@extends('layouts.app')
@section('title', 'หน้าหลัก')
@section('embed')
    <script src="{{ asset('js/frontend/index.js') }}" defer></script>
@endsection
@section('content')
    <div class="px-3 mb-3">
        <transition name="slide-up">
            <form method="POST" action="http://dograde.online/kpn/default.aspx">
                <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="wn3d3i//j7Pnb85EjiG7BDLDVqw+pT1+CAVANhC50OwgOpYSixAqgsvzDJEPrbyHt6s1IwGDHwA4MGryeKkP3sRdJMtH/JuDpplFmPdh+G/7/kuCLk2skPoX/carDp6LsUPuHa41mkW6jY7AyI8Oslc58XtvAK7iCJMrIzDuuLj3+ECA1CKBNrM/sYuAMYMK1Ryl5+HSD2ynoequceiOUhWGznRazU5t2ThtmBTboARlw/PAYL4bu51t9LCX6BQrk/maDNhmlXx6SzMnv3N6svhGQuCI3F+xrzMknOgLj7hnL7zyYMmqFgQ2H4JL5z3kw+ujeJO4iW2QvVSCGJsa1jn5LnHm5FeIkZnDYfd0A09uUeTk9FU5OSHuyrcQJAPtJ6cX5sz3C5gQ8HJ8e2fXIrf41PUu1qaOWf8yP28bq7+XmAWSYaEs07awsI8llNGfGaDaziUm2zaoY/kqnoEU0dsVX7ldWk9opKCOrJ4IVr/qyxekMyYU0TDZF6oxj7thZGtSS94dfOniErnX+l/C0j7C0STN19wyoQcmmtIE7rQccueWia31bithBEWwVOgwD1FdtoWLyFm9+kmpgqCeH9508YABHksBavkSZfumaxQQWYqjWqc8NpIC7hFjEYOFSv5qsOM6uyy7ymphPTQB+5E/UyU0xCQb1Xu4BhYEpEFoPm4F5mLKkRxL6BDAI/oDHhApXv06wquH+rzZqCR0rKc4ba4aVThOVVd3arKAeOtnDOXChomkyAEukGXLvKVo434gyX61EQ/w4e/rJD81nPUPm+Q0VG3GvuyWY35BJUY1QCQM0sF0Iv7n51teguUBrRsAblYOJZO4EYlfa8ryx8q9jiZ9MLNHxhgM5il0qzKRXldZjDueOLznST7RFV/avBF53ee0IEnB1SMiracOAitk9DtYrCmbIbrgr4VdF+1XeYWxl5je2QLa3eF4f9EEAa1PNtJF6XG9pdMKMcHABSgPPuC8W6L1wWfyLQeAkcBDkwvvwDF0ga5ABYDVV14BsDVM1Gg0Rvat0rHu6Q9D8e7NLJwR6U2qclIF71u/1gUboHTX0tCBGEkRD5X9aBQfr1Me/8VKJZZsWkCYTU2zfHbScnS9u5wVFy4Zm3mpWupzMkH62h4hVIiG5RLGiJmTJ/4RSIXVhVfccKANVT4HwQIByB/D9nUuU0UwokuU5rRc1QTz45j6/DZ6TAFe22rupn9Jq53gwEF5U2sT7SoG9HqBvJ0j1TGfTW/wGuTvoANM3PURlTn4e+SZxyfdXK5wv8MJeSQMZrsNsZp3gZDjloc7Z7JENwgtcta+0GqyhmbwLz1ELuVgcYeC9+9vO5ZYDrZbRBjEa6Rf6OU8lsgqD+sON7EhTCnR1BOPMCR6u2I=">
                <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="BD62C3F6">
                <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="KtPrF2sOxlp5fkHIQcp3EmwgdAHMJgB4pGs1/+nMLY0VBJ94KqKLaniIvxJC+gvxYWbl7bCqlFd4kLZ2vJBO331ChfZOa6TBFYzl/B1XTCj4rF7n/vrNme9bzRRmbi52A8tAoC24crm9dWw2p5V3X/5ONgXdIJcuafNkiCfWXnbM2ZvJmV8X8b6i/yWWILro0gFZ2XqSAeLzmfkmCHlvSI97AuNuOgDoOv3ZegP36R6+O/1kjJJ2qyOH9Uuiq1theYwETJAmOWW3xLSpEfGoIpiiikOTQ1eblzxUWe6MO9tvBG7WyQJqWupMnJzxWMFc29lOdesGsPwHi9+yUg8kWLfpviZMbF+arAS/LGUE9m41Qxfg5j0rNa8hVKXopb9ypBi91G98oWvsC8yZoWb6sXLjEJth1p6yiv6fKiVRe6o=">
                <input name="TxtUser" type="text" id="TxtUser" class="form-control" placeholder="XXXXXXXXXXXXX" autocomplete="off" style="font-size:X-Large;">
                <input name="txtPassword" type="text" id="txtPassword" class="form-control" placeholder="วว/ดด/ปปปป" autocomplete="off" style="color:#E4E4E4;font-size:X-Large;">
                <input type="submit" name="ButtonX1" value="ปี1ภาค1" id="ButtonX1" class="btn btn-primary btn-lg" style="width:100px;">
            </form>
            <ul class="nav nav-tabs" id="myTab" role="tablist" v-if="openCheckGradePage">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">ม.4 เทอม 1</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">ม.4 เทอม 2</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">ม.5 เทอม 1</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">ม.5 เทอม 2</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">ม.6 เทอม 1</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">ม.6 เทอม 2</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">ปพ.1</button>
                </li>
            </ul>
        </transition>
        <transition name="slide-up">
            <div class="tab-content bg-white" id="myTabContent" v-if="openCheckGradePage">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="rounded-bottom border border-top-0 shadow p-3">
                        <p class="h1 text-center m-0">ปพ.5 : ระเบียนผลการเรียนรายภาค</p>
                        <div class="row">
                            <div class="col-12 col-lg-6">

                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12 col-lg-2 d-flex align-items-center mt-2">
                                        <label class="h6 m-0">เลขประจำตัว</label>
                                    </div>
                                    <div class="col-12 col-lg-10 mt-2">
                                        <input type="text" class="form-control w-100" placeholder="เลขประจำตัว" disabled>
                                    </div>
                                    <div class="col-12 col-lg-2 d-flex align-items-center mt-2">
                                        <label class="h6 m-0">ชื่อ-นามสกุล</label>
                                    </div>
                                    <div class="col-12 col-lg-10 mt-2">
                                        <input type="text" class="form-control w-100" placeholder="ชื่อ-นามสกุล" disabled>
                                    </div>
                                    <div class="col-12 col-lg-2 d-flex align-items-center mt-2">
                                        <label class="h6 m-0">ชั้น</label>
                                    </div>
                                    <div class="col-12 col-lg-10 mt-2">
                                        <input type="text" class="form-control w-100" placeholder="ชั้น" disabled>
                                    </div>
                                    <div class="col-12 col-lg-2 d-flex align-items-center mt-2">
                                        <label class="h6 m-0">ห้อง</label>
                                    </div>
                                    <div class="col-12 col-lg-10 mt-2">
                                        <input type="text" class="form-control w-100" placeholder="ห้อง" disabled>
                                    </div>
                                    <div class="col-12 col-lg-2 d-flex align-items-center mt-2">
                                        <label class="h6 m-0">เลขที่</label>
                                    </div>
                                    <div class="col-12 col-lg-10 mt-2">
                                        <input type="text" class="form-control w-100" placeholder="เลขที่" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="h3 text-center mt-3">ผลการเรียนชั้นมัธยมศึกษาปีที่ 4 ภาคเรียนที่ 2</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-kjn">
                                    <tr>
                                        <th scope="col" class="text-center">รหัสวิชา</th>
                                        <th scope="col" class="text-center">รายวิชา</th>
                                        <th scope="col" class="text-center">ประเภท</th>
                                        <th scope="col" class="text-center">หน่วยกิต</th>
                                        <th scope="col" class="text-center">คะแนนรวมหน่วย</th>
                                        <th scope="col" class="text-center">กลางภาค</th>
                                        <th scope="col" class="text-center">ปลายภาค</th>
                                        <th scope="col" class="text-center">รวมคะแนน</th>
                                        <th scope="col" class="text-center">แปลผล</th>
                                        <th scope="col" class="text-center">แก้ตัว</th>
                                        <th scope="col" class="text-center">คุณลักษณะ</th>
                                        <th scope="col" class="text-center">อ่านวิเคราะห์</th>
                                        <th scope="col" class="text-center">อาจารย์ผู้สอน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="index in 15">
                                        <th scope="row">ท31101</th>
                                        <td>ภาษาไทยพื้นฐาน</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1.0</td>
                                        <td class="text-end">40</td>
                                        <td class="text-end">15</td>
                                        <td class="text-end">15</td>
                                        <td class="text-end">70</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center">3</td>
                                        <td>แสงจันทร์</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-2 conclude">
                                <p class="h1 text-center text-white rounded-top bg-kjn py-2 m-0">สรุปผลการเรียนที่เรียน</p>
                                <div class="row border rounded-bottom border-kjn g-0">
                                    <div class="col-7 mt-3 px-3">
                                        <p class="fw-bold">จำนวนหน่วยกิตวิชาพื้นฐานที่เรียน</p>
                                    </div>
                                    <div class="col-5 mt-3 px-3">
                                        <p>6.0</p>
                                    </div>
                                    <div class="col-7 px-3">
                                        <p class="fw-bold">จำนวนหน่วยกิตวิชาเพิ่มเติมที่เรียน</p>
                                    </div>
                                    <div class="col-5 px-3">
                                        <p>11.5</p>
                                    </div>
                                    <div class="col-7 px-3">
                                        <p class="fw-bold">รวมจำนวนหน่วยกิตที่เรียน</p>
                                    </div>
                                    <div class="col-5 px-3">
                                        <p>17.5</p>
                                    </div>
                                    <div class="col-7 px-3">
                                        <p class="fw-bold">ผลการเรียนเฉลี่ย GPA</p>
                                    </div>
                                    <div class="col-5 px-3">
                                        <p>3.67</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </transition>
        <transition name="slide-up">
            <div class="row px-3" v-if="!openCheckGradePage">
                <div class="col-12 col-lg-6">

                </div>
                <div class="col-12 col-lg-6 rounded shadow-lg py-5 px-5">
                    <p class="h1">ตรวจสอบเกรด</p>
                    <small class="text-muted">โปรดกรอกข้อมูลให้ครบถ้วนเพื่อตรวจสอบเกรดของคุณ!</small>
                    <div class="row mt-2">
                        <div class="col-12 col-lg-4 d-flex align-items-center">
                            <p class="h6 m-0">รหัสนักเรียน:</p>
                        </div>
                        <div class="col-12 col-lg-8 mt-1 mt-lg-0">
                            <input type="text" placeholder="XXXXX" class="form-control" v-model="std_id">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-lg-4 d-flex align-items-center mt-1 mt-lg-0">
                            <p class="h6 m-0">วันเกิดนักเรียน:</p>
                        </div>
                        <div class="col-12 col-lg-8 mt-lg-0">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mt-lg-0">
                                    <input type="number" class="form-control" min="1" max="31" placeholder="วัน"
                                        v-model="std_birth_date">
                                </div>
                                <div class="col-12 col-lg-4 mt-2 mt-lg-0">
                                    <select class="form-select w-100" v-model="std_birth_month">
                                        <option v-for="data in month" :value="data.value">@{{ data.text }}</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 mt-2 mt-lg-0">
                                    <input type="number" class="form-control" placeholder="พ.ศ."
                                        v-model="std_birth_year">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-kjn w-100 mt-3" @click="getGrade()">เช็คเกรด</button>
                </div>
            </div>
        </transition>
    </div>
@endsection
