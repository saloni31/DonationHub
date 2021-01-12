// function  fetchStorageData() {
//     return JSON.parse(window.localStorage.getItem('user'));
// }
const userData = JSON.parse(window.localStorage.getItem('user'));

function fetchUserData() {
    return new Promise((resolve, reject) => {
        $.ajax({
            'url': 'http://127.0.0.1:8000/api/fetchData',
            'data': {userId: userData['userId'], token: userData['token']},
            success: function (data, status, xhr) {
                if (xhr.status === 200) {
                    resolve(data)

                } else {
                    reject();
                }

            },
        })
    })

}

function fetchStudentData() {
    return new Promise((resolve, reject) => {
        $.ajax({
            'url': 'http://127.0.0.1:8000/api/fetchStudentProfile',
            'data': {userId: userData['userId'], token: userData['token']},
            success: function (data, status, xhr) {
                if (xhr.status === 200) {
                    resolve(data)
                } else {
                    reject();
                }

            }

        })
    })

}

function fetchAdminData() {
    return new Promise((resolve, reject) => {
        $.ajax({
            'url': 'http://127.0.0.1:8000/api/admin',
            'data': {userId: userData['userId'], token: userData['token']},
            success: function (data, status, xhr) {
                if (xhr.status === 200) {
                    resolve(data)
                } else {
                    reject();
                }

            }

        })
    })

}

function fetchProfile() {
    return 'http://127.0.0.1:8000/api/fetchProfile/' + userData['userId'];
    // $("#userImage").attr("src",'http://127.0.0.1:8000/api/fetchProfile/'+userData['userId'])
}

checkFileSizeValidation = (file, size) => {
    if (file.size <= size) {
        return true
    } else {

        return false;
    }
}
checkFileTypeValidation = (file, type) => {

    if (type.includes(file.type)) {
        return true;
    } else {

        return false;
    }

}
generateDate=(todayDate=0)=>
{
    if(todayDate===0)
    {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        return today;
    }
    if(todayDate===1)
    {

        var today = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        return today;
    }

}
function clearText(fieldId) {
    $("#"+fieldId).text("");
}

function checkLogin() {
    if(window.localStorage.getItem('user')=== null){
        window.location.href="/"
    }
}