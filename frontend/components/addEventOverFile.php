<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
<link rel="stylesheet" href="../frontend/components/components_css/addEventsOverFile.css">
<div class="mainOverFileEvent">
    <div class="insideMainEvent">

        <div class="uppeer_add_event_section">
            <h3>FirePage</h3>
            <span class="material-symbols-outlined round_button" id="event_close_btn">
                close
            </span>
        </div>
        <ul id="errorList">
            <li class="events_error error_item">
                <p id = "error_message">error</p>
                <span class="material-symbols-outlined">
                    warning
                </span>
            </li>
        </ul>
        <?php
        if(isset($_SESSION['event_error'])){
            echo "<p>{$_SESSION['event_error']}</p>";
            unset($_SESSION['event_error']);
        }
        ?>
        <form action="../backend/add_event_backend.php" id="events_form" method="POST">
            <span>
                <input id="event_name" name="event_name" type="text" placeholder="Enter event name">
                <input id="event_date" name="event_date" type="date">
            </span>
            <textarea id="event_description" placeholder="Describe the event..." name="Event_description" id=""></textarea>
            <button type="submit" id="submit_event_btn" class="dark_type_button">create event</button>
        </form>
    </div>
    <script type = "module">
        import {ValidateUserData} from '../frontend/js/Validation.js';
        var selector = new ValidateUserData();
        var event_name = document.querySelector("#event_name");
        var event_date = document.querySelector("#event_date");
        var event_description = document.querySelector("#event_description");
        var submit_event_btn = document.querySelector("#submit_event_btn");
        var error_message = document.querySelector("#error_message");
        var events_error = document.querySelector(".events_error");
        submit_event_btn.addEventListener("click",(e)=>{
            e.preventDefault();
            if(selector.ValidateNames(event_name.value, error_message)){
                if(selector.ValidatePostsContent(event_description.value, error_message)){
                    if(selector.ValidateDate(event_date.value, error_message)){
                        events_form.submit();
                        return;
                    }
                    events_error.style.display = "flex";
                }
                events_error.style.display = "flex";
            }
            events_error.style.display = "flex";
        })
        event_description.addEventListener("input",()=>{
            events_error.style.display = "none";
    })
    event_name.addEventListener("input",()=>{
        events_error.style.display = "none";
    })
    </script>
</div>