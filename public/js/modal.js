let modal = document.querySelector(".modal");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

function updateForm(id){
    //Enable click functions of modal button for it to pop up
    document.querySelector('.trigger').click();
    
    $("#post_title").val(post['title'+id]);
    $("#post_body").val(post['body'+id]);
    $("#id").val(id);
    $("#post_form").attr("action",post['url'+id]);
    $("#post_form").attr("method",'GET');
    $("#add_post").attr("value",'Update Post');
    $("form_heading").html('Edit Post');
}

function refreshForm(url){
    $("#post_title").val('');
    $("#post_body").val('');
    $("#id").val('');
    $("#post_form").attr("action",url);
    $("#post_form").attr("method",'POST');
    $("#add_post").attr("value",'Add Post');
    $("form_heading").html('Create New Post');
}

window.addEventListener("click", windowOnClick);


$(document).ready(function(){
  $(".trigger").click(function(){
    toggleModal()
  });

  $(".close-button").click(function(){
    toggleModal()
  });
});