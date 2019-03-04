// console.log("hello from app.js");

var archivesBtn = document.getElementById("front-page-btn");
var archivesContainer = document.getElementById("front-page-container");


var ourRequest = new XMLHttpRequest();
console.log(ourRequest);
ourRequest.open('GET', magicalData.siteURL + '/wp-json/wp/v2/posts/?filter[posts_per_page]=100');
ourRequest.onload = function() {
if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var data = JSON.parse(ourRequest.responseText);
    console.log(data);
    createHTML(data);
} else {
    console.log("We connected to the server, but it returned an error.");
}
};
ourRequest.onerror = function() {
    console.log("Connection error");
};

ourRequest.send();

if (archivesBtn){
    archivesBtn.addEventListener("click", function(){
        console.log('button got clicked!');
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', magicalData.siteURL + '/wp-json/wp/v2/posts/?filter[posts_per_page]=100');
        // ourRequest.open('GET', 'http://localhost/project5-quotes-on-dev/wordpress/wp-json/wp/v2/posts?categories=5');
        ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var data = JSON.parse(ourRequest.responseText);
            console.log(data);
            createHTML(data);
            // archivesBtn.remove();
        } else {
            console.log("We connected to the server, but it returned an error.");
        }
    };
    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();
    });
}


function createHTML(postsData) {
    var ourHTMLString="";
    const i = Math.floor(Math.random()*postsData.length);
    console.log(i);
    // for (i=0; i < postsData.length; i++){
        ourHTMLString += postsData[i].content.rendered;
        ourHTMLString += '<h5>' + "-" + postsData[i].title.rendered + '</h5>';
    // }
    archivesContainer.innerHTML = ourHTMLString;
}




//Admin add post AJAX
var quickAddButton = document.querySelector("#quick-add-button");

if (quickAddButton) {
    quickAddButton.addEventListener("click", function(){
        // console.log('pre-first var passed');
        var ourPostData = {
            "title": document.querySelector('.admin-submit-quote [name="title"]').value,
            "content": document.querySelector('.admin-submit-quote [name="quote-content"]').value,
            "_qod_quote_source": document.querySelector('.admin-submit-quote [name="source-content"]').value,
            "_qod_quote_source_url": document.querySelector('.admin-submit-quote [name="source-url"]').value,
            "post_status": "publish"
        }

        var createPost = new XMLHttpRequest();
        createPost.open("POST", magicalData.siteURL + "/wp-json/wp/v2/posts");
        createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
        console.log(magicalData.siteURL);
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        console.log(ourPostData);
        createPost.send(JSON.stringify(ourPostData));
        console.log(ourPostData);
        createPost.onreadystatechange = function() {
            //ready state 4 is for when posting is in complete stage
            if(createPost.readyState == 4) {
                //wp will return a status pf 201 if posting is successful
                if(createPost.status ==201) {
                    document.querySelector('.admin-submit-quote [name="title"]').value = "";
                    document.querySelector('.admin-submit-quote [name="quote-content"]').value = "";
                    document.querySelector('.admin-submit-quote [name="source-content"]').value = "";
                    document.querySelector('.admin-submit-quote [name="source-url"]').value = "";

                } else {
                    alert('Error-you must fill out the form before clickin!')
                }
            }
        }
    });
}