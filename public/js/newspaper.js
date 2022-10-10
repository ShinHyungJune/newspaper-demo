let form = {
    khan_id: "",
    url: "",
    count_text: "",
    category: "",
    title: "",
    description: "",
    img_url: ""
}

$(document).ready(function(){
    let contents = $(".art_body .content_text");

    form.title = $("#article_title").text();
    form.description = "";

    contents.each(function(index, item){
        form.description = form.description + " " + $(item).text();
    });

    form.category = $(".fx_topbar .gnb li a").attr("title");
    form.count_text = form.description.length;
    form.url = window.location.href;
    form.img_url = $(".art_photo_wrap img").attr("src");

});



function intersect(khan_id){
    form.khan_id = khan_id;

    let option = {
        root: null,
        rootMargin:"0px",
        threshold: 0.3
    };

    let io = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if(entry.isIntersecting){
                axios.post("http://localhost/api/readHistories", form)
                    .then(response => {
                        alert(response.data.message);
                    });
            }
        });
    }, option);

    document.querySelectorAll('.share-fn-wrap').forEach((wrapper) => io.observe(wrapper));
}