/** 
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: home.js
    Page Description: To add verification for adding thread.
    Contributed by Xin Guo
*/

let threadErrorMsg = "Thread content should be non-empty.";
let threadInput = document.querySelector("#thread");
let threadError = document.createElement('p');
threadError.setAttribute("class", "warning");

function validateThread() {
    if (threadInput.value !== '') {
        threadError.remove();
        return true;
    } else {
        document.querySelector("#thread").insertAdjacentElement("afterend", threadError);
        threadError.textContent = threadErrorMsg;
        return false;
    }
}

function validate() {
    let validation = [];

    if (!validateThread()) validation.push(false);

    if (validation.length > 0) {
        return false;
    } else {
        return true;
    }
}
