const tomboCari = document.querySelector('.cari');
const keyword = document.querySelector('.keyword');

keyword.addEventListener('keyup', function(){
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function (){
        
    // }
    fetch('ajac/ajax_cari.php?keyqord='+keyword.value)
    .then((response))
})