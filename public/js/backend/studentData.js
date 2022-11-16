const vm = Vue.createApp({
    data() {
        return {
            studentData: [],
            selectedClass: [1, 2, 3, 4, 5, 6],
            selectedRoom: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'],
            isLoading: false,
            sortBy: 'class',
            sortBy_type: 'asc',
            selectedDelete: '',
            editData: {
                std_id: null,
                class: null,
                room: null,
                number: null,
                name: null,
            },
            editID: null,
            deleteData: {},
            searchBox: '',
        }
    },
    methods: {
        readCSV: readCSV,
        enableElement: enableElement,
        disableElement: disableElement,
        triggerAlert: triggerAlert,
        closeAlert: closeAlert,
        async loadData() {
            this.isLoading = true;
            try {
                let res = await axios.get('/api/studentdata/');
                this.studentData = res.data;
            } catch (err) {
                console.log(err);
            }
            this.isLoading = false;
        },
        openAddStudentModal() {
            this.closeAlert();
            let addModalElement = document.getElementById('addModal');
            let addModal = new bootstrap.Modal(addModalElement);
            addModal.show();
        },
        openDeleteClassModal() {
            this.closeAlert();
            let modalElement = document.getElementById('deleteClassModal');
            let modal = new bootstrap.Modal(modalElement);
            modal.show();
        },
        openDeleteStudentModal(data) {
            this.closeAlert();
            //PREPARE DATA
            this.deleteData = {...data}

            //OPEN MODAL
            let modalElement = document.getElementById('deleteStudentModal');
            let modal = new bootstrap.Modal(modalElement);
            modal.show();
        },
        async upClass() {
            this.closeAlert();
            //CONFIRM USER
            let check_confirm = confirm('คุณแน่ใจหรือไม่ว่าต้องการเลื่อนระดับชั้นของนักเรียนขึ้นหรือไม่');
            if (!check_confirm) {
                return;
            }

            //PREPARE DATA
            let data = [...this.studentData];
            _.orderBy(data, ['class'], 'desc');
            for (datas of data) {
                if (datas.class == 6) {
                    this.triggerAlert('alertDiv', 'กรุณาตรวจสอบข้อมูลนักเรียนว่าไม่มีนักเรียนม.6 แล้ว', 'danger');
                    return;
                }
                datas.class++;
            }

            //UDPATE
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                let uri = '/api/studentdata/update/class';
                await axios.put(uri, data, header)
                    .then(response => {
                        if (response.data.status == 200) {
                            this.triggerAlert('alertDiv', 'เลื่อนระดับชั้นนักเรียนขึ้นเรียบร้อยแล้ว', 'success');
                        } else {
                            this.triggerAlert('alertDiv', 'ไม่สามารถเลื่อนระดับชั้นของนักเรียนได้ เนื่องจากระบบขัดข้อง', 'danger');
                            console.log(response);
                        }
                    })
                    .catch(response => {
                        this.triggerAlert('alertDiv', 'ไม่สามารถเลื่อนระดับชั้นของนักเรียนได้ เนื่องจากระบบขัดข้อง', 'danger');
                        console.log(response);
                    });
            } catch (err) {
                console.log(err);
            }
        },
        async downClass() {
            this.closeAlert();
            //CONFIRM USER
            let check_confirm = confirm('คุณแน่ใจหรือไม่ว่าต้องการเลื่อนระดับชั้นของนักเรียนลงหรือไม่');
            if (!check_confirm) {
                return;
            }

            //PREPARE DATA
            let data = [...this.studentData];
            _.orderBy(data, ['class'], 'asc');
            for (datas of data) {
                if (datas.class == 1) {
                    this.triggerAlert('alertDiv', 'กรุณาตรวจสอบข้อมูลนักเรียนว่าไม่มีนักเรียนม.1 แล้ว', 'danger');
                    return;
                }
                datas.class--;
            }

            //UDPATE
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                let uri = '/api/studentdata/update/class';
                await axios.put(uri, data, header)
                    .then(response => {
                        if (response.data.status == 200) {
                            this.triggerAlert('alertDiv', 'เลื่อนระดับชั้นนักเรียนลงเรียบร้อยแล้ว', 'success');
                        } else {
                            this.triggerAlert('alertDiv', 'ไม่สามารถเลื่อนระดับชั้นของนักเรียนได้ เนื่องจากระบบขัดข้อง', 'danger');
                            console.log(response);
                        }
                    })
                    .catch(response => {
                        this.triggerAlert('alertDiv', 'ไม่สามารถเลื่อนระดับชั้นของนักเรียนได้ เนื่องจากระบบขัดข้อง', 'danger');
                        console.log(response);
                    });
            } catch (err) {
                console.log(err);
            }
        },
        editStudentData(data) {
            //PREPARE DATA
            this.editData = data;
            this.editID = data.std_id;

            //OPEN MODAL
            let editModalElement = document.getElementById('editModal');
            let editModal = new bootstrap.Modal(editModalElement);
            editModal.show();
        },
        async editStudentDataUpdate() {
            this.closeAlert();
            this.disableElement('editModal');
            //PREPARE DATA
            data = this.editData;

            //UPDATE
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                let uri = '/api/studentdata/update/std/' + this.editID;
                await axios.put(uri, data, header)
                    .then(response => {
                        if (response.data.status == 200) {
                            this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลนักเรียนเรียบร้อยแล้ว', 'success');
                            this.loadData();
                        }
                        else {
                            this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลนักเรียนไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                            console.log(response);
                        }
                        
                    })
                    .catch(response => {
                        this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลนักเรียนไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                        console.log(response);
                    });
            } catch (err) {
                this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลนักเรียนไม่สำเร็จเนื่องจากระบบขัดข้อง', 'danger');
                console.log(response);
            }
            this.enableElement('editModal');
        },
        processCSV(text) {
            try {
                //CONVERT CSV TO ARRAY
                let preProcess_arr = text.split('\n');

                //CONVERT TO SUB ARRAY
                let data_arr = [];
                for (data of preProcess_arr) {
                    data_arr.push(data.split(','));
                }

                //GET CLASS AND ROOM
                let classroom = data_arr[0][0];
                classroom = classroom.replace('รายชื่อนักเรียนชั้นมัธยมศึกษาปีที่ ', ''); //รายชื่อนักเรียนชั้นมัธยมศึกษาปีที่ 5 ห้อง 3 -> 5 ห้อง 3
                classroom = classroom.replace(/\s+/g, ''); //5 ห้อง 3 -> 5ห้อง3
                classroom = classroom.replace('ห้อง', '/'); //5 ห้อง 3 -> 5/3
                let splitClassroom = classroom.split('/');
                let grade = splitClassroom[0];
                let room = splitClassroom[1];

                //DELETE UNUSED LINE
                data_arr.splice('0', '5');

                //PROCESS ARRAY
                let data_obj = [];
                for (data of data_arr) {
                    //REMOVE NULL VALUE AND \r
                    _.remove(data, datas => datas.trim() == '' || datas.trim() == '\r');

                    //CLEAN WHITESPACE
                    let name = data[2];
                    data[2] = name.replace(/\s+/g, " ");

                    //CONVERT ARRAY TO OBJECT
                    let pushData = {
                        'std_id': data[1],
                        'name': data[2],
                        'class': grade,
                        'room': room,
                        'number': data[0],
                    };
                    data_obj.push(pushData);
                }
                return data_obj;
            } catch (err) {
                alert('ไม่สามารถอ่านไฟล์ csv ได้ โปรดตรวจสอบไฟล์ว่าถูกต้องตามรูปแบบหรือไม่');
                return;
            }
        },
        async addStudentData() {
            this.closeAlert();
            //READ CSV FILE
            let studentFile = document.getElementById('studentFile').files[0];
            if (studentFile == null) {
                this.triggerAlert('addModalAlert', 'กรุณาเลือกไฟล์ก่อนเพิ่มข้อมูล', 'danger');
                return;
            }
            let text = await this.readCSV(studentFile);

            //PROCESS CSV TEXT
            let data = this.processCSV(text);
            if (data == null) {
                return;
            }

            //ADD TO DB
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                await axios.post('/api/studentdata/create', data, header)
                    .then(response => {
                        if (response.data.status == 200) {
                            this.triggerAlert('addModalAlert', 'เพิ่มข้อมูลเรียบร้อยแล้ว', 'success');
                            this.loadData();
                        }
                        else {
                            this.triggerAlert('addModalAlert', response.data.message[Object.keys(response.data.message)[0]] +' โปรดลองอีกครั้ง ', 'danger');
                            console.log(response.data);
                        }
                        
                    })
                    .catch(response => {
                        this.triggerAlert('addModalAlert', 'เพิ่มข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                        console.log(response.data);
                    });

            } catch (err) {
                console.log(err);
            }
        },
        async deleteStudentData(type, data) {
            this.closeAlert();
            if (data == '' && type == 'class') {
                this.triggerAlert('deleteClassModallAlert', 'กรุณาเลือกระดับชั้นก่อนลบ', 'danger');
                return;
            }
            //ADD TO DB
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                if (type == 'student') {
                    let uri = '/api/studentdata/delete/std_id/' + this.deleteData.std_id;
                    await axios.delete(uri, header)
                        .then(response => {
                            if (response.data.status) {
                                this.triggerAlert('alertDiv', 'ลบข้อมูลเรียบร้อยแล้ว', 'success');
                                this.loadData();
                            }
                            else {
                                this.triggerAlert('alertDiv', 'ลบข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                            console.log(response.data);
                            }
                            
                        })
                        .catch(response => {
                            this.triggerAlert('alertDiv', 'ลบข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                            console.log(response.data);
                        });
                } else if (type == 'class') {
                    let uri = '/api/studentdata/delete/class/' + data;
                    await axios.delete(uri, header)
                        .then(response => {
                            this.triggerAlert('deleteClassModalAlert', 'ลบข้อมูลเรียบร้อยแล้ว', 'success');
                            this.loadData();
                        })
                        .catch(response => {
                            this.triggerAlert('deleteClassModalAlert', 'ลบข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                            console.log(response.data);
                        });
                }

            } catch (err) {
                console.log(err);
            }
        }
    },
    computed: {
        showData() {
            let data = [];
            let searchBox_filter = []

            //FILTER
            for (grade of this.selectedClass) {
                let filter1 = _.filter(this.studentData, (datas) => datas.class == grade);
                for (room of this.selectedRoom) {
                    let filter2 = _.filter(filter1, (datas) => datas.room == room);
                    data = data.concat(filter2);
                }
            }

            //SEARCH BOX
            if (this.searchBox != '') {
                if (Number.isInteger(parseInt(this.searchBox))) {
                    data = _.filter(data, datas => datas.std_id.toString().startsWith(this.searchBox));
                }
                else {
                    data = _.filter(data, datas => datas.name.includes(this.searchBox));
                }
            }

            //SORT
            data = _.orderBy(data, [this.sortBy], [this.sortBy_type]);
            return data;
        },
    },
    mounted() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        tooltipTriggerList.forEach(element => {
            new bootstrap.Popover(element, {
                content: `<p class="h6">คุณแน่ใจหรือไม่ว่าจะลบนักเรียนคนนี้</p>
                <button class="btn btn-danger w-50 me-1">ลบ</button>
                <button class="btn btn-link w-50">ไม่ลบ</button>`,
            });
        });
        this.loadData();

    },
});
vm.mount('#vue-wrap');
