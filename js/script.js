/** 
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: script.js
    Page Description: To register user.
    Contributed by Xin Guo
*/


// define the default message.
let defaultMSg="";


/* This block sets up the prompt message and error handling for email input validation. */
//define an error message for email.
let emailErrorMsg="Email address should be non-empty with the format xyx@xyz.xyz.";
//DOM Selection statement to select the element by id using querySelector("#email")
let emailInput=document.querySelector("#email");
//DOM manipulation statement to create a new <p> element 
let emailError=document.createElement('p');
//DOM Manipulation statement to set the class attribute. 
emailError.setAttribute("class","warning");
//Element.append() method inserts a set of Node objects or strings 
//after the last child of the Element,has no return value, can append several nodes and strings.
//https://developer.mozilla.org/en-US/docs/Web/API/Element/append
document.querySelectorAll(".textfield")[0].append(emailError);
// Validate the email input and update the error message if it doesn't match the required format.
function validateEmail(){
    let email = emailInput.value; 
    let regexp=/\S+@\S+\.\S+/; 
    if(regexp.test(email)){ 
        emailError.textContent = "";
    }
    else {
        emailError.textContent= emailErrorMsg;}
    return emailError.textContent;
    
}
//Add an event listener for the "blur" event to trigger validateEmail.
//element.addEventListener(type, listener, options)
//"blur" event fires when an element loses focus
//https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
emailInput.addEventListener("blur",validateEmail);




let nameErrorMsg="Username should be non-empty,and within 30 characters long.";
let nameInput=document.querySelector("#login");
let nameError=document.createElement('p');
nameError.setAttribute("class","warning");

document.querySelectorAll(".textfield")[1].append(nameError);
function validateName(){
    let name = nameInput.value; 
    let regexp=/^.{1,30}$/; 
    if(regexp.test(name)){ 
        nameError.textContent = defaultMSg;}
    else {
        nameError.textContent = nameErrorMsg;}
    return nameError.textContent;      
}
nameInput.value = nameInput.value.toLowerCase();
nameInput.addEventListener("blur",validateName);



let passwdErrorMsg="Password should be at least 8 characters:1 uppercase, 1 lowercase.";
let passwdInput=document.querySelector("#pass");
let passwdError=document.createElement('p');
passwdError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[2].append(passwdError);
function validatePasswd(){
    let passwd = passwdInput.value; 
    let regexp = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(regexp.test(passwd)){ 
        passwdError.textContent = defaultMSg;}
    else {
        passwdError.textContent = passwdErrorMsg;}
    return passwdErrorMsg;
    
}
passwdInput.addEventListener("blur",validatePasswd);





let retypErrorMsg="Please retype password.";
let retypInput=document.querySelector("#pass2");
let retypError=document.createElement('p');
retypError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[3].append(retypError);

function validateRetyp() { 
    if (retypInput.value == defaultMSg) {
        retypError.textContent = retypErrorMsg;
    } else if (retypInput.value === passwdInput.value) { 
        retypError.textContent = defaultMSg;
    } else {
        retypError.textContent = retypErrorMsg;
    }
    return retypError.textContent;
}
retypInput.addEventListener("blur",validateRetyp);



let termsErrorMsg="Please accept the terms and conditions.";
let termInput=document.querySelector("#terms");
let termError=document.createElement('p');
termError.setAttribute("class","warning terms");
document.querySelectorAll(".checkbox")[0].append(termError);

function validateTerms(){
    if(termInput.checked)
        termError.textContent=defaultMSg;
    else
        termError.textContent=termsErrorMsg;
    return termError.textContent;
}
termInput.addEventListener("change",validateTerms);

/**
 * This block of code define the behavior of submit mentioned in html
    onsubmit="return validate()
    When user click submit, the broswer will validate all the parts as needed.
    When all the validation are passed, meaning all the error message is empty, 
    the valid value is true. And then set the login value to lowercase.

*/

//event handler for submit event
function validate(){
    let valid = false;//global validation 
    validateEmail();
    validateName();
    validatePasswd();
    validateRetyp();
    validateTerms();  
    nameInput.value=nameInput.value.toLowerCase();

    let totalLength = emailError.textContent.length 
    + nameError.textContent.length + termError.textContent.length
    + passwdError.textContent.length + retypError.textContent.length;

    if  (totalLength===0){valid = true;}
    return valid;

    

};


/*Event listener to reset text content of all error message paragraphs when the form is reset.*/
function resertFormError() {
    document.querySelectorAll(".warning").forEach(element => {
    element.textContent = defaultMSg;
    });
}
//Attach the reset event to the form, calling resertFormError to clear error messages.
document.querySelector("form").addEventListener("reset", resertFormError);

