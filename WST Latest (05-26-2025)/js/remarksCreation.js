function createRemark(userID, remarkType) {
    let remark;
    switch(remarkType.toLowerCase()){
        case "log in":
            remark = "Logged In";
            break;
        case "log out":
            remark = "Logged Out";
            break;
        case "pre-test":
            remark = "Took Pre-Test";
            break;
        case "post-test":
            remark = "Took Post-Test";
            break;
        default:
            console.log("That function is not implemented");
            return;
    }
  $.ajax({
    type: 'POST',
    url: 'remarksCreationProcess.php',
    dataType: 'json',
    data: { 
        'userID': userID,
        'remark': remark
    },
    success: function(response) {
      console.log('Server response:', response);
    },
    error: function(xhr, status, error) {
      console.error('AJAX error:', status, error);
    }
  });
}