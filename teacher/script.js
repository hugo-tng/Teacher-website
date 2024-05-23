function showError(msg) {
    let error = document.getElementsByClassName('errorMessage')[0];
    if (msg == null || msg == undefined) {
        if (!error.classList.contains('d-none')) {
            error.classList.add('d-none');
        }
    } else {
        error.classList.remove('d-none');
        error.innerHTML = msg;
    }
}

function validate(type) {
    if (type === "info") {
        let id = document.getElementById('tcID').value.trim();
        let name = document.getElementById('tcName').value.trim();
        let contact = document.getElementById('tcContact').value.trim();
        let intro = document.getElementById('tcIntro').value.trim();
        let pos = document.getElementById('tcPos').value.trim();
        if (id == "") {
            showError('Please enter teacher\'s ID');
            return false;
        }
        if (name == "") {
            showError('Please enter teacher\'s name');
            return false;
        }
        if (contact == "") {
            showError('Please enter teacher\'s contact');
            return false;
        }
        if (intro == "") {
            showError('Please enter teacher\'s introduction');
            return false;
        }
        if (pos == "") {
            showError('Please enter teacher\'s ID');
            return false;
        }

        // if (id.length != 10) {
        //     showError('Teacher\'s ID must have 10 character');
        //     return false;
        // }
        showError(null);
        return true;
    } else if (type === "major") {
        let id = document.getElementById("mjID").value.trim();
        let name = document.getElementById("mjName").value.trim();

        if (id == "") {
            showError('Please enter Major\'s ID');
            return false;
        }
        if (name == "") {
            showError('Please enter Major\'s name');
            return false;
        }

        // if (id.length != 10) {
        //     showError('Major\'s ID must have 10 character');
        //     return false;
        // }

        showError(null);
        return true;
    } else if (type === "research") {
        let id = document.getElementById("rsID").value.trim();
        let name = document.getElementById("rsName").value.trim();
        // let author = document.getElementById("rsAu").value.trim();

        if (id == "") {
            showError('Please enter your research\'s ID');
            return false;
        }

        if (name == "") {
            showError('Please enter your research\'s name');
            return false;
        }

        if (id.length != 10) {
            showError('Research\'s ID must have 10 character');
            return false;
        }
        if (author == "") {
            showError('Please enter your research\'s author');
            return false;
        }
        showError(null);
        return true;
    } else if (type === "news") {
        let title = document.getElementById("ntt").value.trim();
        let content = document.getElementById("nContent").value.trim();
        let major = document.getElementById("nMajor").value.trim();
        if (title == "") {
            showError('Please enter News\'s tilte');
            return false;
        }
        if (content == "") {
            showError('Please enter News\'s content');
            return false;
        }
        if (major == "") {
            showError('Please enter major');
            // console.log("a");
            return false;
        }
        showError(null);
        return true;
    } else if (type === "material") {
        
    }
}