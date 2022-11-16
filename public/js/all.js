async function readCSV(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = res => {
            resolve(res.target.result);
        };
        reader.onerror = err => reject(err);

        reader.readAsText(file);
    });
}
function enableElement(element_id) {
    let nodes1 = document.getElementById(element_id).getElementsByTagName('*');
    for (let i = 0; i < nodes1.length; i++) {
        nodes1[i].disabled = false;
    }
}
function disableElement(element_id) {
    let nodes1 = document.getElementById(element_id).getElementsByTagName('*');
    for (let i = 0; i < nodes1.length; i++) {
        nodes1[i].disabled = true;
    }
}
function triggerAlert(placeholder, message, type) {
    let alertPlaceholder = document.getElementById(placeholder);

    function alert(message, type) {
        let wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }

    alert(message, type);
}
function closeAlert() {
    try {
        let alertNode = document.querySelector('.alert');
        let alert = new bootstrap.Alert(alertNode);
        alert.close();
    } catch {}
}