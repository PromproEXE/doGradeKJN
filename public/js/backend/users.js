document.addEventListener("DOMContentLoaded", function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (element) {
        return new bootstrap.Popover(element);
    });
});
const vm = Vue.createApp({
    data() {
        return {
            csrfToken: document.querySelector('meta[name="csrf-token"]').content,
            isLoading: true,
            username: '',
            password: '',
            user_list: [],
            editModalData: {
                id: '',
                name: '',
                password: ''
            },
            addModalData: {
                name: '',
                email: '',
                username: '',
                can_dograde: 1,
                can_manage_user: 0,
                password: '',
            },
            deleteModalData: {},
            addModalDataError: {},
            editModalDataError: {},
        }
    },
    methods: {
        readCSV: readCSV,
        enableElement: enableElement,
        disableElement: disableElement,
        async loadData() {
            let res = await axios('/api/users/');
            this.user_list = res.data;
            this.isLoading = false;
        },
        triggerAlert:triggerAlert,
        closeAlert:closeAlert,
        toastAlert(placeholder, message, type) {
            let alertPlaceholder = document.getElementById(placeholder);

            function alertToast(message, type) {
                let text_color;
                if (type == 'danger') {
                    text_color = 'white'
                }
                else {
                    text_color = 'dark'
                }
                let wrapper = document.createElement('div');
                wrapper.innerHTML = `
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-`+ type +`">
                            <strong class="me-auto text-`+ text_color +`">แจ้งเตือน</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">` + message + `</div>
                    </div>
                </div>
                `;
                alertPlaceholder.append(wrapper);
            }

            alertToast(message, type);
            var toastElement = document.querySelector('.toast');
            var toastItem = new bootstrap.Toast(toastElement);
            toastItem.show();
        },
        async updateData(id, type, element_id) {
            this.closeAlert();
            this.editModalDataError = {};
            //CHECK TYPE NOT NULL
            if (type == null) {
                type = 'normal'
            }

            //DISABLE ELEMENT
            if (type == 'modal') {
                this.disableElement(element_id);
            }

            //FIND INDEX OF UPDATE DATA
            let index = _.findIndex(this.user_list, (data) => data.id == id);

            //PREPARE DATA TO UPDATE
            let uri = 'api/users/update/' + id;
            let data = this.user_list[index];
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };

            //UPDATE
            try {
                if (type == 'modal') {
                    await axios.put(uri, data, header)
                        .then(response => {
                            if (response.data.status == 'forbidden') {
                                this.editModalDataError = response.data.message;
                            }
                            if (response.data.status == 200) {
                                this.triggerAlert('editModalAlert', 'อัปเดทข้อมูลเรียบร้อยแล้ว', 'success');
                            }
                            console.log(response);
                        })
                        .catch(response => {
                            console.log(response);
                        });

                    //ENABLE ELEMENT
                    this.enableElement(element_id);
                } else {
                    axios.put(uri, data, header)
                        .then(response => {
                            console.log(response);
                        })
                        .catch(response => {
                            console.log(response);
                        });
                }
            } catch (err) {
                this.triggerAlert('editModalAlert', 'เกิดข้อผิดพลาดในการอัปเดทข้อมูล', 'danger');
                console.log(err);
            }

        },
        async addUser() {
            this.closeAlert();
            this.disableElement('addModal');
            this.addModalDataError = {};
            let uri = '/api/users/create';
            let data = this.addModalData;
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };

            try {
                await axios.post(uri, data, header)
                    .then(response => {
                        if (response.data.status == 'forbidden') {
                            this.addModalDataError = response.data.message;
                        }
                        if (response.data.status == 200) {
                            this.addModalData = {
                                name: '',
                                email: '',
                                username: '',
                                can_dograde: 1,
                                can_manage_user: 0,
                                password: '',
                            };
                            this.triggerAlert('addModalAlert', 'เพิ่มผู้ใช้เรียบร้อยแล้ว', 'success');
                            this.isLoading = true;
                            this.loadData();
                        }
                        console.log(response);
                    })
            } catch (err) {
                this.triggerAlert('addModalAlert', 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล', 'danger');
                console.log(err);
            }

            this.enableElement('addModal');

            
        },
        openEditModal(data) {
            //PREPARE DATA FOR EDITMODAL
            this.editModalData = data;

            //OPEN MODAL
            this.closeAlert();
            let editModalElement = document.getElementById('editModal');
            let editModal = new bootstrap.Modal(editModalElement);
            editModal.show();
        },
        openAddModal() {
            //PREPARE DATA FOR EDITMODAL
            this.addModalData = {
                name: '',
                email: '',
                username: '',
                can_dograde: 1,
                can_manage_user: 0,
                password: '',
            };

            //OPEN MODAL
            this.closeAlert();
            let addModalElement = document.getElementById('addModal');
            let addModal = new bootstrap.Modal(addModalElement);
            addModal.show();
        },
        openDeleteModal(data) {
            //PREPARE DATA
            this.deleteModalData = data;

            //OPEN MODAL
            let deleteModalElement = document.getElementById('deleteModal');
            let deleteModal = new bootstrap.Modal(deleteModalElement);
            deleteModal.show();
        },
        async deleteData(user_id) {

            let uri = '/api/users/delete/' + user_id;
            let header = {
                'X-CSRF-TOKEN': this.csrfToken
            };
            try {
                axios.delete(uri, header)
                    .then(response => {
                        if (response.data.status == 'forbidden') {
                            this.toastAlert('toastAlert', 'ไม่สามารถลบผู้ใช้ได้ โปรดรีเฟรชและลองอีกครั้ง', 'danger');
                            console.log(response);
                        }
                        if (response.data.status == 200) {
                            this.isLoading = true;
                            this.loadData();
                            this.toastAlert('toastAlert', 'ลบผู้ใช้เรียบร้อยแล้ว', 'success');
                        }

                    })
            } catch (err) {
                this.toastAlert('toastAlert', 'ไม่สามารถลบผู้ใช้ได้ โปรดรีเฟรชและลองอีกครั้ง', 'danger');
                console.log(err);
            }
        }
    },
    async mounted() {
        this.loadData();
    },
})

vm.mount('#vue-wrap');
