function confirmAction(form) {
    let confirmAction = confirm("Are you sure to execute this action?");
    if (confirmAction) {
        document.getElementById(''+form+'').submit()
    } 
}