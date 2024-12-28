
console.log("this is the footer")

document.querySelector("#callButton").addEventListener("click", function() {
    const phoneNumber = this.getAttribute("data-phone-number");
    window.location.href = `tel:${phoneNumber}`;
});
