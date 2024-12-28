<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
<link rel="stylesheet" href="../frontend/components/components_css/addPostOverFile.css">
<div class="mainOverFilePost">
    <div class="insideMainPost">
        <span class="material-symbols-outlined" id="post_close_btn">
            close
        </span>
        <p id="errors"></p>
        <form action="../backend/add_post_backend.php" method="POST">
            <textarea id="post_description" placeholder="What's on your mind" name="user_post" id=""></textarea>
            <button id="create_post_btn" type="submit">create post</button>
        </form>
    </div>
</div>
<script type="module">
    import {ValidateUserData} from '../frontend/js/Validation.js';
    const submit_button = document.getElementById('create_post_btn');
    submit_button.addEventListener("click",(event)=>{
        // event.preventDefault();
        console.log("clicked");
        
    })

</script>