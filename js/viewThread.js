/** 
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: viewThread.js
    Page Description: To confirm to delete the thread.
    Contributed by Di Wu
*/

// even handler to delete the thread
document.querySelector("#delete_thread").onclick = function(event) {
    if (!confirm("Warning! Are You Sure to Delete This Thread? You will Lose This Thread Permanently!")) {
        event.preventDefault();
    }
}

// reference: "w3schools" [Online]. Available: https://www.w3schools.com/jsref/event_preventdefault.asp. [Accessed 10 November 2024].
