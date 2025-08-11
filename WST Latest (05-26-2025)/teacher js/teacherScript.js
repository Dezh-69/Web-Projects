"use strict";

console.log("Hello");

function loadManageStudents() {
  $.ajax({
    url: `manageStudents.php`,
  }).done((response) => {
    $(".main-content-div").html(response);
    $("nav ul li").css("backgroundColor", "#f5f5f5");
    $(".manageStudent-link").css("backgroundColor", "#a2e3dc");
    if (
      !document.querySelector('script[src="../teacher js/manageStudents.js"]')
    ) {
      const script = document.createElement("script");
      script.src = "../teacher js/manageStudents.js";
      script.onload = () => {
        setUp();
      };
      document.body.appendChild(script);
    } else {
      setUp();
    }
  });
}

$(document).ready(function () {
  $(document).on("click", ".manageStudent-link", function () {
    loadManageStudents();
  });
});

$(document).ready(function () {
  $(document).on("click", ".classAnalytics-link", function () {
    $.ajax({
      url: "classAnalytics.php",
    }).done((response) => {
      $(".main-content-div").html(response);
      $("nav ul li").css("backgroundColor", "#f5f5f5");
      $(".classAnalytics-link").css("backgroundColor", "#a2e3dc");
    });
  });
});

function applyFilter(event) {
  event.preventDefault();
  const form = event.target;
  const formData = new FormData(form);
  $.ajax({
    url: `../teacherSide/fetchAnalytics.php`,
    method: "POST",
    data: formData,
    dataType: "json",
    processData: false,
    contentType: false,
  }).done((response) => {
    console.log(response);
    alert("oh yeah");
  });

  console.log("HElloo");
  return false;
}
