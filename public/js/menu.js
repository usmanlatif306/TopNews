$(document).ready(function() {});
$("#paymers").click(function() {
    $("#paymersMenu").toggleClass("collapse");
});
$("#manage").click(function() {
    $("#manageMenu").toggleClass("collapse");
});
$("#reports").click(function() {
    $("#reportsMenu").toggleClass("collapse");
});
$("#users").click(function() {
    $("#usersMenu").toggleClass("collapse");
});
$(".navbar-btn").click(function() {
    $("#left-sidebar").toggleClass("show-bar");
});
$("#dropdown-basic").click(function() {
    $("#userDropdown").removeClass("d-none");
});
$(".main-content").click(function() {
    $("#userDropdown").addClass("d-none");
});

$("#requestForReport").click(function() {
    $("#requestForReportMenu").removeClass("d-none");
});
