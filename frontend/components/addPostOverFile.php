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

            </ul>
        </div>
        <form action="../backend/add_post_backend.php" id="posts_form"" method="POST">
            <textarea id="post_description" placeholder="What's on your mind" name="user_post" id=""></textarea>
            <button id="create_post_btn" class="dark_type_button" type="submit">create post</button>
        </form>
    </div>
</div>
<script type="module">
    import {ValidateUserData} from '../frontend/js/Validation.js';
    var textArea = document.getElementById('post_description');
    var submit_button = document.getElementById('create_post_btn');
    var posts_form = document.getElementById('posts_form');
    let errors = [];
    submit_button.addEventListener('click', function(event){
        let errorList = document.getElementById('errorList');
        errorList.innerHTML = '';
        event.preventDefault();
        errors = [];
        let area_text_values = textArea.value;
        if(area_text_values.length == 0 || area_text_values.length < 5){
            errors.push("Post cannot be empty and at least 5 chars");
        }
        if(area_text_values.length > 2500){
            errors.push("Post cannot be more than 2500 chars");
        }
        if(errors.length > 0 ){
            errors.forEach(error => {
                let li = document.createElement('li');  // Create <li>
                li.textContent = error;                 // Set text
                li.classList.add('error-item');         // Optional: Add class
                errorList.appendChild(li);    
                          // Attach to <ul>
            });
        }
        else{
            posts_form.submit();
        }
    });

    textArea.addEventListener("input", function(){
        errorList.innerHTML = '';
    })
</script>
