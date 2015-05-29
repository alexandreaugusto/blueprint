// Pop up
function popup(pageURL, title) {
    var width = 500;
    var height = 450;
    var left = (screen.width / 2) - (width / 2);
    var top = (screen.height / 2) - (height / 2) - 30;
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
}