function chooseContentType() {
    // get content value
    var content = document.getElementById("choose_content_type").value;

    // show photos upload form
    if(content == "photos") {
        $("#upload_photos").show(); // show photos upload form
        $("#upload_youtube_link").hide(); // hide youtube embedded link upload form
    }

    // show youtube embedded link upload form
    if(content == 'youtube_link') {
        $("#upload_youtube_link").show(); // show youtube embedded link upload form
        $("#upload_photos").hide(); // hide photos upload form
    }
}