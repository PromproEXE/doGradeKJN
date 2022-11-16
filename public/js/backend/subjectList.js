const app = Vue.createApp({
    data() {
        return {
            isLoading: false,
            header: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
            data: [],
            selectedClass: [1, 2, 3, 4, 5, 6],
            searchBox: '',
            sortBy: 'subject_id',
            sortBy_type: 'asc',
            addData: {
                subject_id: '',
                class: '',
                subject_name: '',
                teach_by: '',
            },
            editData : {
                subject_id: '',
                class: '',
                name: '',
                teach_by: '',
            },
            selectedDelete: {
                subject_id: '',
                subject_name: '',
            }
        }
    },
    methods: {
        closeAlert,
        triggerAlert,
        disableElement,
        enableElement,
        async loadData() {
            this.isLoading = true;
            let res = await axios.get('/api/subjectlist')
            this.data = [...res.data];

            this.isLoading = false;
        },
        openAddSubjectModal() {
            this.addData = {
                subject_id: '',
                class: '',
                subject_name: '',
                teach_by: '',
            }
            this.closeAlert();

            let addModalElement = document.getElementById('addModal');
            let addModal = new bootstrap.Modal(addModalElement);
            addModal.show();
        },
        openEditSubjectModal(data) {
            this.closeAlert();
            this.editData = {...data};

            let editModalElement = document.getElementById('editModal');
            let editModal = new bootstrap.Modal(editModalElement);
            editModal.show();
        },
        openDeleteSubjectModal(data) {
            this.closeAlert();
            this.selectedDelete = data;

            let deleteModalElement = document.getElementById('deleteModal');
            let deleteModal = new bootstrap.Modal(deleteModalElement);
            deleteModal.show();
        },
        async addSubjectData() {
            this.closeAlert();
            this.disableElement('addModal');

                if (this.addData.subject_id == '') {
                    this.triggerAlert('addModalAlert', 'กรุณาใส่<span class="fw-bold text-decoration-underline">รหัสวิชา</span>ก่อนกดบันทึก', 'danger');
                    this.enableElement('addModal');
                    return;
                }
                if (this.addData.class == '') {
                    this.triggerAlert('addModalAlert', 'กรุณาเลือก<span class="fw-bold text-decoration-underline">ระดับชั้น</span>ก่อนกดบันทึก', 'danger');
                    this.enableElement('addModal');
                    return;
                }
                if (this.addData.subject_name == '') {
                    this.triggerAlert('addModalAlert', 'กรุณาใส่<span class="fw-bold text-decoration-underline">ชื่อวิชา</span>ก่อนกดบันทึก', 'danger');
                    this.enableElement('addModal');
                    return;
                }
                    
                if (this.addData.teach_by == '') {
                    this.triggerAlert('addModalAlert', 'กรุณาใส่<span class="fw-bold text-decoration-underline">อาจารย์ผู้สอน</span>ก่อนกดบันทึก', 'danger');
                    this.enableElement('addModal');
                    return;
                }
                else {
                    try {
                        let uri = '/api/subjectlist/create'
                        await axios.post(uri, this.addData, this.header)
                                    .then(response => {
                                        if (response.data.status == 200) {
                                            this.triggerAlert('addModalAlert', 'เพิ่มข้อมูลวิชาเรียบร้อยแล้ว', 'success');
                                            this.loadData();
                                        }
                                        else {
                                            this.triggerAlert('addModalAlert', 'ไม่สามารถเพิ่มข้อมูลวิชาได้', 'danger');
                                            console.log(response);
                                        }
                                    })
                                    .catch(response => {
                                        this.triggerAlert('addModalAlert', 'ไม่สามารถเพิ่มข้อมูลวิชาได้', 'danger');
                                        console.log(response);
                                    });
                    }
                    catch (err) {
                        this.triggerAlert('addModalAlert', 'ไม่สามารถเพิ่มข้อมูลวิชาได้', 'danger');
                        console.log(err);
                    }
                    this.enableElement('addModal');
                }
            
        },
        async editSubjectUpdate() {
            this.closeAlert();
            this.disableElement('editModal');

            try {
                let uri = '/api/subjectlist/update/' + this.editData.id;

                await axios.put(uri, this.editData, this.header)
                            .then (response => {
                                if (response.data.status == 200) {
                                    this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลเรียบร้อยแล้ว', 'success');
                                    this.loadData();
                                }
                                else {
                                    this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                                    console.log(response.data);
                                }
                            })
                            .catch(response => {
                                this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                                console.log(response.data);
                            });
            }
            catch (err) {
                this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                console.log(err);
            }

            this.enableElement('editModal');
        },
        async deleteSubject() {
            this.disableElement('deleteModal');
            this.closeAlert();

            try {
                let uri = 'api/subjectlist/delete/' + this.selectedDelete.id;
                await axios.delete(uri, this.header)
                            .then(response => {
                                if (response.data.status == 200) {
                                    this.triggerAlert('alertDiv', 'ลบวิชา <span class="fw-bold">' + this.selectedDelete.subject_id + ' - ' + this.selectedDelete.subject_name + '</span> เรียบร้อยแล้ว', 'success');
                                    this.loadData();
                                }
                                else {
                                    this.triggerAlert('alertDiv', 'ลบวิชาไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                                    console.log(response);
                                }
                            })
                            .catch(response => {
                                this.triggerAlert('alertDiv', 'ลบวิชาไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                                console.log(response);
                            });
            }
            catch(err) {
                this.triggerAlert('alertDiv', 'ลบวิชาไม่สำเร็จ โปรดลองอีกครั้ง', 'danger');
                console.log(err);
            }

            this.enableElement('deleteModal');
        },
        async duplicateData(data) {
            this.closeAlert();
            
            try {
                let uri = '/api/subjectlist/create';
                await axios.post(uri, data, this.header)
                            .then(response => {
                                if (response.data.status == 200) {
                                    this.triggerAlert('alertDiv', 'ทำซ้ำเรียบร้อยแล้ว', 'success');
                                    this.loadData();
                                }
                                else {
                                    this.triggerAlert('alertDiv', 'ไม่สามาถทำซ้ำได้ โปรดลองอีกครั้ง', 'danger');
                                    console.log(response);
                                }
                            })
                            .catch(response => {
                                this.triggerAlert('alertDiv', 'ไม่สามาถทำซ้ำได้ โปรดลองอีกครั้ง', 'danger');
                                console.log(response);
                            });
            }
            catch(err) {
                this.triggerAlert('alertDiv', 'ไม่สามาถทำซ้ำได้ โปรดลองอีกครั้ง', 'danger');
                console.log(err);
            }
        }
        
    },
    computed: {
        showData() {
            let data = [];

            //FILTER
            for (grade of this.selectedClass) {
                let filtered = _.filter(this.data, datas => datas.class == grade);
                data = data.concat(filtered);
            }

            //SEACH BOX
            if (this.searchBox != '') {
                if (Number.isInteger(parseInt(this.searchBox[1])) || Number.isInteger(parseInt(this.searchBox[2]))) {
                    data = _.filter(data, datas => datas.subject_id.includes(this.searchBox));
                }
                else {
                    data = _.filter(data, datas => datas.subject_name.includes(this.searchBox));
                }
            }

            //ORDER DATA
            data = _.orderBy(data, [this.sortBy], [this.sortBy_type]);

            //RETURN DATA
            return data;
        }
    },
    async mounted() {
        this.loadData();
    },
});
app.mount('#vue-wrap');