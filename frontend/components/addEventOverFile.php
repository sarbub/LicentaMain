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
        var form = document.querySelector("#events_form");
        var submit_event_btn = document.querySelector("#submit_event_btn");
        let errors = [];
        submit_event_btn.addEventListener("click",(e)=>{
            e.preventDefault();
            let event_name = document.querySelector("#event_name").value;
            let event_date = document.querySelector("#event_date").value;
            let event_description = document.querySelector("#event_description").value;
            // event name validation
            if(!selector.ValidateNames(event_name, errors)){
                errors.forEach((error)=>{
                    console.log(error);
                })
            }
        })
    </script>
</div>