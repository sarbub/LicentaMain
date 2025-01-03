<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
<link rel="stylesheet" href="../frontend/components/components_css/addPostOverFile.css">
<link rel="stylesheet" href="../frontend/css/classes.css">
<div class="mainOverFilePost">
    <div class="insideMainPost">  
        <div class="uppeer_add_post_section">
            <h3>FirePage</h3>
            <span class="material-symbols-outlined round_button" id="post_close_btn">
                close
            </span>
        </div>
        <div class="errorDiv">
            <ul id="errorList">
                <li class="post_error error_item">
                    <p id = "post_error_message">error</p>
                    <span class="material-symbols-outlined" style = "border:2px oslid blue">
                        warning
                    </span>
                </li>
            </ul>
        </div>
        <form action="../backend/add_post_backend.php" id="posts_form"" method="POST">
            <textarea id="post_description" placeholder="What's on your mind" name="user_post" id=""></textarea>
            <button id="create_post_btn" class="dark_type_button" type="submit">create post</button>
        </form>
    </div>
</div>
<script type="module">
    // selector
    import {ValidateUserData} from '../frontend/js/Validation.js';
    var selector = new ValidateUserData();
    var form = document.querySelector("#posts_form");
    var post_description = document.querySelector("#post_description");
    var create_post_btn = document.querySelector("#create_post_btn");
    var post_error_message = document.querySelector("#post_error_message");
    var post_error = document.querySelector(".post_error");

    create_post_btn.addEventListener("click",(e)=>{
        e.preventDefault();
        if(selector.ValidatePostsContent(post_description.value, post_error_message)){
            form.submit();
        }
        post_error.style.display = "flex";
    })
    post_description.addEventListener("input",()=>{
        post_error.style.display = "none";
    })
</script>
