

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$("#imageUpload").change(function() {
    readURL(this);
});


$('.radio').on('click',function(){
    // $(this).siblings().removeClass('radio_active')
    $(this).toggleClass('radio_active')
    $('.variable').slideToggle();

})
