export class MultiStepForm {
  constructor(tab, prevBtn, nextBtn) {
    this.currentTab = 0; // Track the current tab index
    this.tab = tab;
    this.prevBtn = prevBtn;
    this.nextBtn = nextBtn;
    this.displayTabs(); // Initial display of the first tab
  }

  displayTabs() {
    // Hide all tabs, then show only the current tab
    for (let i = 0; i < this.tab.length; i++) {
      this.tab[i].style.display = "none";
    }
    this.tab[this.currentTab].style.display = "flex";
    if(this.tab[this.currentTab] === 0){
      this.tab[this.currentTab].classList.add("first_tab_design");
    }

    // Control button visibility
    this.prevBtn.style.display = this.currentTab === 0 ? "none" : "inline";
    this.nextBtn.innerHTML = this.currentTab === this.tab.length - 1 ? "Submit" : "Next";

    // Update the step indicator
    this.fixStepIndicator();
  }

  nextPrev(step) {
    // Hide the current tab and move to the next or previous one
    this.tab[this.currentTab].style.display = "none";
    this.currentTab += step;

    // Check if we've reached the end and submit if so
    if (this.currentTab >= this.tab.length) {
      document.getElementById("request_place_form").submit();
      return;
    }
    // Show the updated tab
    this.displayTabs();
  }

  fixStepIndicator() {
    // Clear "active" class from all steps
    const steps = document.getElementsByClassName("step");
    for (let i = 0; i < steps.length; i++) {
      steps[i].className = steps[i].className.replace(" active", "");
    }
    // Add "active" class to the current step
    steps[this.currentTab].className += " active";
  }
}
