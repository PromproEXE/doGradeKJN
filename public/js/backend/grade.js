const vm = Vue.createApp({
    data() {
        return {
            studentData: [],
            subjectData: [],
            isLoading: true,
            selectedClass: '',
            selectedSubject: '',
            rawData: [],
        }
    },
    methods: {
        async loadData() {
            this.isLoading = true;

            //SUBJECT DATA
            let subject = await axios('/api/subjectlist/');
            this.subjectData = [...subject.data];

            this.isLoading = false;
        },
        async openFile(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
            
                reader.onload = res => {
                  resolve(res.target.result);
                };
                reader.onerror = err => reject(err);
            
                reader.readAsText(file);
            });
        },
        processCSV(text) {
             //CLEAN DATA
             let preProcessText = text.split('\n');
             preProcessText.splice('0', '3');
             preProcessText.splice(preProcessText.length - 2, '2');
 
             //STRING TO ARRAY
             let data_arr = [];
             for (data of preProcessText) {
                 pushData = data.split(',');
                 //CHECK NO STUDENT DATA
                 if (pushData[1] == '') {
                     continue;
                 }
 
                 //CLEAN DATA
                 _.remove(pushData, (datas) => datas == '\r' || datas == ''); //REMOVE \r

                 //REMOVE DUPLICATE DATA
                 pushData = _.uniq(pushData);
                 
                 //NORMALIZE DATA LENGTH
                 for (let i = pushData.length; i != 9; i++) {
                     pushData.push('');
                 }

                 pushData = {
                     name: pushData[1],
                     grade: {
                         subject_id: '',
                         subject_name: selectedClass,
                         keepScore: pushData[2],
                         midTermScore: pushData[3],
                         mi
                     }
                 }

                 //PUSH
                 data_arr.push(pushData);
             }
             return data_arr;
        },
        async uploadGrade() {
            //CSV TO STRING
            try {
                let selectedGradeFile = document.getElementById('gradeFile').files[0];
                const rawText = await this.openFile(selectedGradeFile);

                let data = [...this.processCSV(rawText)];
            }
            catch(err) {
                this.triggerAlert('alertDiv', 'ไม่สามารถประมวลผลข้อมูลได้ โปรดตรวจสอบว่าไฟล์มีรูปแบบที่ถูกต้อง', 'danger')
                console.log(err)
            }
            
            //UPDATE
            try {
                let uri = '/api/grade/update/';
            }
            catch(err) {

            }
        },
        clearFile() {
            document.getElementById('gradeFile').value = '';
        }
    },
    computed: {
        classSubjectData() {
            let data = _.filter(this.subjectData, datas => datas.class == this.selectedClass);

            return data;
        }
    },
    mounted() {
        this.loadData();
    },
});

vm.mount('#vue-wrap');