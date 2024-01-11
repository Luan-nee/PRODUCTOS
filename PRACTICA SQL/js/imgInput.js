function verElement(){
    const input = document.getElementById('img-producto');
    const preImg = document.getElementById('preVisual');
    
    if (input.files.length > 0) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            preImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        preImg.src = '#';
    }
}
