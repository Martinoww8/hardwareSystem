//Function for username validation

function isUsernameValid(username){
    let userRegEx = /^[A-Za-z0-9\-\_\.]{8,}$/;
    let result = userRegEx.test(username);
    return result;
}

//is password valid

function isPasswordValid(password){
    let passRegEx = /[\w\W]{8,}/;
    return passRegEx.test(password);
}