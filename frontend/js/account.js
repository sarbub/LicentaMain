class accountFunctionalities {
  constructor() {
      this.home = null;
      this.gallery = null;
      this.news = null;
      this.demands = null;
      this.navigation = null;
      this.showPostsEvents = null;

      this.homeDiv = null;
      this.gallery = null;
      this.header = null;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const showPostEventsBtns = document.querySelector("#add_elements");
  const add_post_event = document.querySelector(".add_post_event");

  const post_open_btn = document.querySelector("#posts_active");
  const demand_open_btn = document.querySelector("#demands_active");

  const add_post_show_btn = document.querySelector("#add_post_show_btn");
  const add_event_show_btn = document.querySelector("#add_event_show_btn");
  const mainOverFileEvent = document.querySelector(".mainOverFileEvent");
  const mainOverFilePost = document.querySelector(".mainOverFilePost");
  const demands = document.querySelector(".demands");
  const userPosts = document.querySelector(".userPosts");

  const types_of_accounts = document.querySelector(".types_of_accounts");
  const myStatusStar = document.querySelector("#myStatusStar");


  showPostEventsBtns.addEventListener("click", () => {
      const displayStatus = window.getComputedStyle(add_post_event).display;
      add_post_event.style.display = displayStatus === "none" ? "flex" : "none";
  });

  demand_open_btn.addEventListener("click", () => {
      demands.style.display = "flex";
      userPosts.style.display = "none";
      post_open_btn.classList.remove("active");
      demand_open_btn.classList.add("active");
  });

  post_open_btn.addEventListener("click", () => {
      demands.style.display = "none";
      userPosts.style.display = "flex";
      post_open_btn.classList.add("active");
      demand_open_btn.classList.remove("active");
  });


  add_event_show_btn.addEventListener("click", () => {
      const mainOverFileEventDisplayStatus = window.getComputedStyle(mainOverFileEvent).display;
      mainOverFileEvent.style.display = mainOverFileEventDisplayStatus === "none" ? "flex" : "none";
  });

  add_post_show_btn.addEventListener("click", () => {
      const mainOverFilePostDisplayStatus = window.getComputedStyle(mainOverFilePost).display;
      mainOverFilePost.style.display = mainOverFilePostDisplayStatus === "none" ? "flex" : "none";
  });

  myStatusStar.addEventListener("click", () => {
      const mainOverFilePostDisplayStatus = window.getComputedStyle(types_of_accounts).display;
      types_of_accounts.style.display = mainOverFilePostDisplayStatus === "none" ? "flex" : "none";
  });

//   let accept_btn = document.querySelectorAll(".accept_btn");
  $(document).ready(function() {
    $(".demands").on("click", ".accept_btn", function() {
        var userId = $(this).data('id');

        $.ajax({
            url: "../backend/accept_demand_backend.php",
            type: "POST",
            data: {
                user_id: userId
            },
            success: function(response) {
                // Reload the demands div using AJAX
                $(".demands").html(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });
});

$(document).ready(function() {
    $(".demands").on("click", ".decline_btn", function() {
        var userId = $(this).data('id');

        $.ajax({
            url: "../backend/accept_demand_backend.php",
            type: "POST",
            data: {
                user_id: userId
            },
            success: function(response) {
                // Reload the demands div using AJAX
                $(".demands").html(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });
});
      document.addEventListener("click", (e) => {
        if (e.target.matches(".my_open_close_icon") || e.target.matches(".show_close_btn") || e.target.matches(".first_div")) {
            // Find the closest .main_demands_div to the clicked button
            const demandsDiv = e.target.closest(".main_demands_div").querySelector(".hide_show_demands_div");
            // Toggle the 'show' class on the found div
            demandsDiv.classList.toggle("show");
        }
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches("#post_close_btn")) {
            console.log("the button was clicked");
            const div = document.querySelector(".mainOverFilePost");
            div.style.display = "none";
        }
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches("#event_close_btn")) {
            console.log("the button was clicked");
            const div = document.querySelector(".mainOverFileEvent");
            div.style.display = "none";
        }
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches("#edit_profile_close_btn")) {
            console.log("the button was clicked");
            const div = document.querySelector(".mainOverFileEditProfile");
            div.style.display = "none";
        }
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches("#edit_profile_form_btn")) {
            console.log("the button was clicked");
            const div = document.querySelector(".mainOverFileEditProfile");
            div.style.display = "flex";
        }
    });


    // scroll efect

  // ... other code ...

// scroll effect
const mainCenterProfileBar = document.querySelector(".main_center_profile_bar");
const mainCenter = document.querySelector(".main_center");

mainCenter.addEventListener('scroll', () => {
    if (mainCenter.scrollTop > 300) {  // Changed threshold to 10
        mainCenterProfileBar.style.height = "70px";

    }
});

mainCenter.addEventListener('scroll', () => {
    if (mainCenter.scrollTop < 300) {  // Changed threshold to 10
        mainCenterProfileBar.style.height = "0px";
    }
});



    


  });


