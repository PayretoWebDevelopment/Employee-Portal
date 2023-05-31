    // timeout before a callback is called

    let timeout;

    // traversing the DOM and getting the input and span using their IDs

    let passwordAd = document.getElementById('PassEntryAd')
    let strengthBadgeAd = document.getElementById('StrengthDispAd')

    // The strong and weak password Regex pattern checker

    let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

    function StrengthChecker(PasswordParameter) {
        // We then change the badge's color and text based on the password strength

        if (strongPassword.test(PasswordParameter)) {
            strengthBadgeAd.style.backgroundColor = "green"
            strengthBadgeAd.textContent = 'Strong'
        } else if (mediumPassword.test(PasswordParameter)) {
            strengthBadgeAd.style.backgroundColor = 'blue'
            strengthBadgeAd.textContent = 'Medium'
        } else {
            strengthBadgeAd.style.backgroundColor = 'red'
            strengthBadgeAd.textContent = 'Weak'
        }
    }

    // Adding an input event listener when a user types to the password input 

    passwordAd.addEventListener("input", () => {

        //The badge is hidden by default, so we show it

        strengthBadgeAd.style.display = 'block'
        clearTimeout(timeout);

        //We then call the StrengChecker function as a callback then pass the typed password to it

        timeout = setTimeout(() => StrengthChecker(passwordAd.value), 500);

        //Incase a user clears the text, the badge is hidden again

        if (passwordAd.value.length !== 0) {
            strengthBadgeAd.style.display != 'block'
        } else {
            strengthBadgeAd.style.display = 'none'
        }
    });