let vm = Vue.createApp({
    data() {
        return {
            std_id: '',
            std_birth_date: null,
            std_birth_month: 1,
            std_birth_year: '',
            month: [
                {
                    text: 'มกราคม',
                    value: 1
                },
                {
                    text: 'กุมภาพันธ์',
                    value: 2
                },
                {
                    text: 'มีนาคม',
                    value: 3
                },
                {
                    text: 'เมษายน',
                    value: 4
                },
                {
                    text: 'พฤษภาคม',
                    value: 5
                },
                {
                    text: 'มิถุนายน',
                    value: 6
                },
                {
                    text: 'กรกฎาคม',
                    value: 7
                },
                {
                    text: 'สิงหาคม',
                    value: 8
                },
                {
                    text: 'กันยายน',
                    value: 9
                },
                {
                    text: 'ตุลาคม',
                    value: 10
                },
                {
                    text: 'พฤศจิกายน',
                    value: 11
                },
                {
                    text: 'ธันวาคม',
                    value: 12
                }
            ],
            isLoadingGrade: true,
            openCheckGradePage: false,
            csrfToken: document.querySelector('meta[name="csrf-token"]').content,
            username: '',
            password: '',
            authError: [],
        }
    },
    methods: {
        auth() {
            let credential = {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                },
                username: this.username,
                password: this.password
            }
            axios.post('/login', credential)
                 .then(response => {
                     if (response.data.status == 200) {
                        let redirect = response.data.redirect;
                        window.location = redirect;
                     }
                     else {
                        this.authError = response.data.message;
                        this.$forceUpdate();
                     }
                 })
                 .catch(response => {
                     console.log(response);
                 });
        },
        getGrade() {
            validate = this.validateForm();
            if (validate == true) {
                this.openCheckGradePage = true;
            }
        },
        closeGetGrade() {
            this.openCheckGradePage = false;
            this.$forceUpdate();
        },
        openLoginModal() {
            this.username = '';
            this.password = '';
            let loginModalElement = document.getElementById('loginModal');
            let loginModal = new bootstrap.Modal(loginModalElement);
            loginModal.show();
        },
        validateForm() {
            if (parseInt(this.std_id) == NaN) {
                return alert('เลขประจำตัวไม่ถูกต้อง');
            }
            else if (this.std_id.length != 5) {
                return alert('เลขประจำตัวต้องเป็น 5 หลัก');
            }

            if (this.std_birth_date == '' || this.std_birth_date == null) {
                return alert('กรุณาใส่วันให้ถูกต้อง');
            }
            else if (this.std_birth_date.toString().length != 2 || this.std_birth_date > 31 || this.std_birth_date < 1) {
                return alert('กรุณาใส่วันให้ถูกต้อง');
            }

            if (this.std_birth_year.toString().length != 4) {
                return alert('กรุณาใส่ปีให้ถูกต้อง');
            }
            return true;
        }
    },
});
vm.mount('#vue-wrap');